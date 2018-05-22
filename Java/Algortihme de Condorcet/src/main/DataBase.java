package main;

import java.sql.*;
/**
 * <b>La classe Database permet de communiquer avec la base de données.</b>
 * <p>Elle est définie par:
 * <ul>
 * 	<li>L'URL de la base de données.</li>
 * 	<li>L'identifiant de l'utilisateur de la base de données.</li>
 * 	<li>Son mot de passe</li>
 * 	<li>Un objet conection permettant de connecter la base de données à l'algorithme java</li>
 *  <li>Un objet Statement permettant d'exécuter une requête sql</li>
 * </ul>
 * <br>
 * @author Rémi
 */

public class DataBase {



	/**
	 * adresse de la base de donnée
	 */
	private String url;
	
	/**
	 * identifiant de l'utilisateur de la base de données
	 */
	private String login;
	
	/**
	 * mot de passe de l'utilisateur permettant d'accéder à la base de données
	 */
	private String password;
	
	/**
	 * Objet connection permettant de connecter la base de données à l'algorithme java
	 */
	private Connection connection;
	
	/**
	 * Objet statement permettant d'exécuter une requête sql
	 */
	private Statement statement;
	
/**
 * <b>Constructeur de Database</b>
 * <p>A la construction de la base de données, on fixe l'url, le login, le mot de passe afin de connecter l'algorithme avec la base de données du serveur</p>
 * @see #url
 * @see #login
 * @see #password
 * @param url L'url de connexion
 * @param login Le login de connexion
 * @param password Le mot de passe de connexion
 */
	public DataBase(String url, String login, String password) {
		this.url = url;
		this.login = login;
		this.password = login;
	}
/**
 * <b>Etablit la connection avec la base de données</b> affiche 'DB connected le cas échéant<br>
 * @throws Exception renvoie une erreur si elle n'arrive pas à se connecter à la base de données
 * @see #connection
 */
	public void connectDB() throws Exception {
		Class.forName( "com.mysql.jdbc.Driver" );
		connection = DriverManager.getConnection(url, login, password);
		System.out.println("DB connected");
		statement = connection.createStatement();
	}

	
/**
 * <b>Rompt la connection avec la base de données</b>
 * @throws Exception renvoie une erreur si la connexion à la base de données échoue.
 * @see #connection
 */
	public void deconectDB() throws Exception {
		connection.close();
	}
/**
* <b>Exécute une requête sql</b> <br>
* revoie le statement qui contient le resultat
* @throws Exception renvoie une erreur si la connexion à la base de données échoue.
* @see #statement
* @param sql La requête sql à exécuter
* @return Le résultat de la requête
*/	
	public ResultSet executeQuery(String sql) throws Exception {
		return statement.executeQuery(sql);
	}
/**
* <b>Renvoie le nombre d'alternatives du vote</b>
* @throws Exception renvoie une erreur si la connexion à la base de données échoue.
* @see #executeQuery(String)
* @param idVote L'id du vote
* @return Le nombre d'alternatives
*/	
	public int getNbAlternatives(int idVote) throws Exception {
		String sql = "SELECT nbAlternatives FROM Votes WHERE id = " + idVote;
		System.out.println(sql);
		ResultSet result = executeQuery(sql);
		result.next();
		int n = result.getInt("nbAlternatives");
		System.out.println("nombre d'alternatives : " + n);
		return n;
	}
	
	/**
	* <b>Renvoie le type du vote (privé ou public)</b>
	* @throws Exception renvoie une erreur si la connexion à la base de données échoue.
	* @see #executeQuery(String)
	* @param idVote l'id du vote
	* @return Le type de vote
	*/	
	public String getType(int idVote) throws Exception {
		String sql = "SELECT Type FROM Votes WHERE id = " + idVote;
		System.out.println(sql);
		ResultSet result = executeQuery(sql);
		result.next();
		String s = result.getString("Type");
		System.out.println("type : " + s);
		return s;
	}
	
	/**
	* <b>Implémente une voix pour un identifiant de vote et d'utilisateur avec des choix</b><br>
	* <p>La méthode parcourt les choix associés à l'identifiant de vote donné en paramètre et les ajoute à une voix pour un même utilisateur<br>
	* Les différentes voix sont ensuite ajoutées à la liste chainée de l'ensemble des voix : toutesLesVoix</p>
	* @throws Exception renvoie une erreur si la connexion à la base de données échoue.
	* @see #executeQuery(String)
	* @see Condorcet#ajouterUneVoix
	* @see VoixChoisie#ajouterUnChoix(int, int)
	* @see VoixChoisie#ajouterUnChoix
	* @see Condorcet
	* @param typeDeChoix Le type de choix
	* @param typeId Le type d'id
	* @param idVote L'id du vote
	* @param nbAlternatives Le nombre d'alternatives
	* @param condorcet L'élection
	*/
	public void extraireVoix(String typeDeChoix, String typeId, int idVote, int nbAlternatives, Condorcet condorcet) throws Exception {
		String sql = "SELECT " + typeId+ ", idAlternative,rang FROM " + typeDeChoix + " WHERE idVote = " + idVote + " ORDER BY "+ typeId;
		ResultSet result = executeQuery(sql);
		System.out.println(sql);
		if (result.next()==true) {
			int idVotant = result.getInt(typeId);
			VoixChoisie voice = new VoixChoisie(idVotant, nbAlternatives);
			voice.ajouterUnChoix(result.getInt("idAlternative")-1, result.getInt("rang"));
			
			while (result.next()) {
				if (idVotant == result.getInt(typeId)) {
					voice.ajouterUnChoix(result.getInt("idAlternative")-1, result.getInt("rang"));
				}
				else {	
					condorcet.ajouterUneVoix(voice);
					idVotant = result.getInt(typeId);
					voice = new VoixChoisie(idVotant, nbAlternatives);
					voice.ajouterUnChoix(result.getInt("idAlternative")-1, result.getInt("rang"));
				}
			}
			condorcet.ajouterUneVoix(voice);
		}
	}
	
	/**
	* <b>Implémente une voix pour un identifiant de vote et d'utilisateur avec des choix</b>
	* @throws Exception renvoie une erreur si la connexion à la base de données échoue.
	* @see #extraireVoix(String, String, int, int, Condorcet)
	* @see Condorcet
	* @param idVote L'id du vote
	* @param condorcet L'élection
	*/	
	public void remplirToutesLesVoix(int idVote, Condorcet condorcet) throws Exception {
		int nbAlternatives = getNbAlternatives(idVote);
		extraireVoix("ChoixPrives", "idInscrit", idVote, nbAlternatives, condorcet);
		extraireVoix("ChoixPublics", "idVotant", idVote, nbAlternatives, condorcet);
	}
	
	/**
	* <b>Rentre le gagnant dans la base de données</b><br>
	* @throws Exception renvoie une erreur si la connexion à la base de données échoue.
	* @see	#statement
	* @param idwinner L'id du vainqueur
	* @param idVote L'id du vote
	*/
	public void saveWinner(int idwinner, int idVote) throws Exception {
		System.out.println();
		String sql = "INSERT INTO Resultats VALUES (" + idVote + ", " + idwinner + ")";
		System.out.println(sql);
		statement.executeUpdate(sql);
	}
}
