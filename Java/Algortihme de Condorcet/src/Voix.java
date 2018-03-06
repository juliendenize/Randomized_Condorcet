/**
 * <p><b>La classe Voix représente la voix d'un votant qui a classé les alternatives.</b><br>
 * Elle est définie par:
 * <ul>
 * 	<li>L'ID du votant représenté par la voix.</li>
 * 	<li>Le nombre d'alternatives du vote.</li>
 * 	<li>Le rang des alternatives.</li>
 * </ul>
 * </p><br>
 * @author julien
 */
public class Voix {
	
	/**
	 * L'ID du votant représenté par la voix. Cet ID n'est pas modifiable.
	 */
	private int idVotant;
	
	/**
	 * Le nombre d'alternatives du vote. Ce nombre n'est pas modifiable.
	 */
	private int nbAlternatives;
	
	/**
	 * Classement des alternatives. Ce classement est modifiable.<br>
	 * rangAlternatives[i] donne le rang de l'alternative i selon le classement du votant.<br>
	 * @see Voix#rangAlternative
	 */
	private int[] rangAlternatives;
	
	/**
	 * Constructeur Voix.
	 * <p>
	 * 	A la construction d'un objet Voix, l'idVotant et nbAlternatives sont fixées.<br>
	 * 	rangAlternatives est initialisée par un tableau, de taille nbAlternatives, nul.
	 * </p><br>
	 * @param idVotant 
	 * 				L'ID du votant.
	 * @param nbAlternatives 
	 * 				Le nombre d'alternatives du vote.
	 * @see Voix#idVotant
	 * @see Voix#nbAlternatives
	 * @see Voix#rangAlternatives
	 */
 	public Voix(int idVotant, int nbAlternatives) {
 		this.idVotant = idVotant;
 		this.nbAlternatives = nbAlternatives;
		this.rangAlternatives = new int[nbAlternatives];
	}
 	
 	/**
 	 * Classe l'alternative selon son rang.<br>
 	 * @param idAlternative 
 	 * 				ID de l'alternative
 	 * @param rang 
 	 * 				Rang de l'alternative
 	 * @see Voix#rangAlternatives
 	 */
 	public void addChoix (int idAlternative, int rang) {
 		rangAlternatives[idAlternative] = rang;
 	}
 	
 	/**
 	 * Renvoie le rang de l'alternative passée en paramètre.<br>
 	 * @param idAlternative ID de l'alternative.
 	 * @return Renvoie le rang de l'alternative, sous la forme d'un entier.
 	 * @see Voix#rangAlternatives
 	 */
 	public int rangAlternative(int idAlternative) {
 		return rangAlternatives[idAlternative];
 	}
 	
 	/**
 	 * Comportement d'un objet Voix sous la forme d'une chaine de caractère.
 	 * Renvoie l'ID du votant et le classement des alternatives. <br>
 	 * @return Le classement des alternatives et l'ID du votant, sous la forme d'une chaîne de caractères.
 	 * @see Voix
 	 * @see Voix#idVotant
 	 * @see Voix#rangAlternatives
 	 */
 	public String toString(){
 		String str = "Voix du votant " + Integer.toString(idVotant) + " :";
 		for (int i = 0; i < nbAlternatives; i++) {
 			str += " " + (i+1) + " rang " + rangAlternatives[i] + " ;"; 
 		}
 		return str;
 	}
 	
}
