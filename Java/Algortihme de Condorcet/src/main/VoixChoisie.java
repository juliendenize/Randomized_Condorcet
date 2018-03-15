package main;
/**
 * <p><b>La classe Voix représente la voix d'un votant qui a classé les alternatives.</b><br>
 * Elle est une classe fille de Voix et est définie par:
 * <ul>
 * 	<li>L'ID du votant représenté par la voix.</li>
 * 	<li>Le nombre d'alternatives du vote.</li>
 * 	<li>Le rang des alternatives.</li>
 * </ul>
 * </p><br>
 * @author julien
 * @see Voix
 */
public class VoixChoisie extends Voix {
		
	/**
	 * Constructeur Voix.
	 * <p>
	 * 	A la construction d'un objet Voix, l'idVotant, nbAlternatives et rangAltenratives sont fixées par le constructeur de la classe mère.<br>
	 * 	rangAlternatives contiendra les bonnes valeurs après lecture de tous les choix de tous les votants à partir de la base de donnée.
	 * </p><br>
	 * @param idVotant 
	 * 				L'ID du votant.
	 * @param nbAlternatives 
	 * 				Le nombre d'alternatives du vote.
	 * @see Voix#Voix(int, int)
	 * @see VoixChoisie#addChoix(int, int)
	 */
 	public VoixChoisie(int idVotant, int nbAlternatives) {
 		super(idVotant, nbAlternatives);
	}
 	
 	/**
 	 * Classe l'alternative selon son rang.<br>
 	 * @param idAlternative 
 	 * 				ID de l'alternative
 	 * @param rang 
 	 * 				Rang de l'alternative
 	 * @see VoixChoisie#rangAlternatives
 	 */
 	public void addChoix (int idAlternative, int rang) {
 		rangAlternatives[idAlternative] = rang;
 	}

 	/**
 	 * Comportement d'un objet Voix sous la forme d'une chaine de caractère.
 	 * Renvoie l'ID du votant et le classement des alternatives. <br>
 	 * @return Le classement des alternatives et l'ID du votant, sous la forme d'une chaîne de caractères.
 	 * @see VoixChoisie
 	 * @see VoixChoisie#idVotant
 	 * @see VoixChoisie#rangAlternatives
 	 */
 	public String toString(){
 		String str = "Voix du votant " + Integer.toString(idVotant) + " :";
 		for (int i = 0; i < nbAlternatives; i++) {
 			str += " " + (i+1) + " rang " + rangAlternatives[i] + " ;"; 
 		}
 		return str;
 	}
 	
}
