import java.util.*;

/**
 * <b>La classe Condorcet représente une élection.</b>
 * <p>Elle est définie par:
 * <ul>
 * 	<li>Le nombre d'alternatives du vote.</li>
 * 	<li>Toutes les voix d'une élection.</li>
 * 	<li>Le compteur des matchs entre toutes les alternatives</li>
 * 	<li>Le gagnant de l'élection ou le "vainqueur de Condorcet"</li>
 * </ul>
 * </p><br>
 * @author julien
 */
public class Condorcet {
	
	/**
	 * Le nombre d'alternatives du vote. Ce nombre n'est pas modifiable.
	 */
	private int nbAlternatives;
	
	/**
	 * Toutes les voix d'une élection. Les voix s'ajoutent une à une dans cette liste chainée.<br>
	 * @see Voix
	 * @see Condorcet#addVoix(Voix)
	 */
	private LinkedList<Voix> toutesLesVoix;
	
	/**
	 * <b>Compte les résultats des matchs entre toutes les alternatives.</b><br>
	 * compteur[j][i] contient le nombre de fois que i est mieux classée que j.<br>
	 * Ce compteur est modifié lors du parcours de toutes les voix.<br>
	 * @see Condorcet#parcoursVoix()
	 */
	private int[][] compteur;
	
	/**
	 * Contient l'id du vainqueur de Condorcet. Ce nombre est modifié lorsque le vainqueur est trouvé.<br>
	 * @see (à remplir lorsque la méthode pour trouver le vainqueur est présente)
	 */
	private int vainqueur;
	
	/**
	 * <b>Constructeur Condorcet</b>
	 * <p>A la construction d'un objet Condorcet, le nombre d'alternative est fixé.<br>
	 * Compteur est initialisé par un tableau nul à deux dimensions de taille nbAlternatives au carré.<br>
	 * Vainqueur est initialisé à zéro et toutesLesVoix par une liste chainée vide.<br>
	 * @param nbAlternatives 
	 * 				Le nombre d'alternatives
	 * @see Condorcet
	 * @see Condorcet#compteur
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#toutesLesVoix
	 * @see Condorcet#vainqueur
	 */
	public Condorcet(int nbAlternatives) {
		this.nbAlternatives = nbAlternatives;
		this.compteur = new int[nbAlternatives][nbAlternatives];
		this.vainqueur = 0;
		this.toutesLesVoix = new LinkedList<Voix>();
	}
	
	/**
	 * Ajoute une voix à toutesLesVoix.<br>
	 * @param voix 
	 * 			Une instance de Voix
	 * @see Voix
	 * @see Condorcet#toutesLesVoix
	 */
	public void addVoix(Voix voix) {
		this.toutesLesVoix.add(voix);
	}
	
	/**
	 * <b>Remplit le tableau compteur</b> en regardant pour chaque voix comment sont classées les alternatives pour matcher les candidats. <br>
	 * La méthode parcourt les voix. <br>
	 * Elle parcourt pour chaque voix le tableau classement en <b>comparant pour chaque alternative i son rang par rapport aux alternatives j</b> avec j > i. <br>
	 * Lorsque que le <b>rang de i est supérieur au rang de j elle incrémente compteur[j][i] de 1</b>. <br>
	 * Si le rang de i ou de j est égale à 0, elle ne fait rien car cela signifie que l'<b>alternative de rang 0 n'a pas été classée par le votant</b>.<br>
	 * @see Condorcet#toutesLesVoix
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#compteur
	 * @see Voix#rangAlternative(int)
	 */
	public void parcoursVoix() {
		for (Voix cur: toutesLesVoix) {
			for (int i = 0; i < nbAlternatives - 1; i++) {
				if (cur.rangAlternative(i) != 0) {
					for (int j = i+1; j < nbAlternatives; j++) {
						if (cur.rangAlternative(j) != 0) {
							if (cur.rangAlternative(i) > cur.rangAlternative(j)) compteur[j][i] += 1;
							else compteur[i][j] +=1;
						}
					}
				}
			}
		}
	}
	
	/**
	 * Lit le tableau compteur.<br>
	 * @see Condorcet#compteur
	 */
	public void lectureCompteur() {
		for (int i = 0; i < nbAlternatives; i++) {
			for (int j = 0; j < nbAlternatives; j++) {
				System.out.print(Integer.toString(compteur[i][j]) + " ");
			}
			System.out.print("\n");
		}
	}
	
	/**
	 * Comportement d'un objet Condorcet sous la forme d'une chaine de caractère.<br>
	 * Retourne le vainqueur de l'élection et le nombre d'alternatives.<br>
	 * @return Le vainqueur de l'élection et le nombre d'alternatives, sous la forme d'une chaine de caractères.
	 * @see Condorcet
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#vainqueur
	 */
	public String toString() {
		return "Election avec " + Integer.toString(nbAlternatives) + " alternatives et le gagnant est " + Integer.toString(vainqueur);
	}

}
