package main;

/**
 * <b>La Classe Ballot permet de créer des voix qui soient aléatoires ou non.</b><br> 
 * <p>C'est une classe mère représentant les voix. Elle est là mère de Voix et VoixAleatoire<br>
 * Cette classe est définie par:
 *<ul>
 * 	<li>L'ID du votant représenté par la voix.</li>
 * 	<li>Le nombre d'alternatives du vote.</li>
 * 	<li>Le rang des alternatives.</li>
 * </ul>
 * </p><br>
 * @author julien
 * @see VoixChoisie
 * @see VoixAleatoire
 * @see Condorcet
 */

public class Voix {
	
	/**
	 * L'ID du votant représenté par la voix. Cet ID n'est pas modifiable.
	 */
	protected int idVotant;
	
	/**
	 * Le nombre d'alternatives du vote. Ce nombre n'est pas modifiable.
	 */
	protected int nbAlternatives;
	
	/**
	 * Classement des alternatives. Ce classement n'est pas modifiable après son initialisation par les classes filles.<br>
	 * rangAlternatives[i] donne le rang de l'alternative i selon le classement du votant.<br>
	 */
	protected int[] rangAlternatives;
	
	/**
	 * Constructeur Ballot.
	 * <p>
	 * 	A la construction d'un objet Ballot, l'idVotant, nbAlternatives et rangAltenratives sont fixées.<br>
	 * </p><br>
	 * @param idVotant 
	 * 				L'ID du votant.
	 * @param nbAlternatives 
	 * 				Le nombre d'alternatives du vote.
	 */
	
	public Voix (int idVotant, int nbAlternatives) {
		this.idVotant = idVotant;
		this.nbAlternatives = nbAlternatives;
		this.rangAlternatives = new int[nbAlternatives];
	}
	
	/**
	 * Renvoie le rang de l'alternative passée en paramètre.<br>
 	 * @param idAlternative ID de l'alternative.
 	 * @return Renvoie le rang de l'alternative, sous la forme d'un entier.
 	 * @see VoixAleatoire#rangAlternatives
	 */
	public int rangAlternative(int idAlternative) {
		return rangAlternatives[idAlternative];
	}
}