package main;
import main.Condorcet;

/**
 * <p><b>La classe VoixAleatoirePonderee représente une voix générée aléatoirement par sélection d'une voix parmis plusieurs par pourcentage
 * avec un idVotant pour la rendre unique.</b><br>
 * Elle est une classe fille de Voix et est définie par:
 * <ul>
 * 	<li>L'ID du votant représenté par la voix.</li>
 * 	<li>Le nombre d'alternatives du vote.</li>
 * 	<li>Le rang des alternatives.</li>
 * </ul>
 * </p><br>
 * @author julien
 * @see test.VoixAleatoirePondereeTest
 */

public class VoixAleatoirePonderee extends Voix {
	
	/**
	 * Constructeur de VoixAleatoirePonderee.<br>
	 * Id votant, nbAlternatives fixés par le constructeur de la classe mère {@link Voix#Voix(int, int)}.<br>
	 * @param idVotant
	 * 				L'ID du votant.
	 * @param nbAlternatives
	 * 				Le nombre d'alternatives du vote.
	 * @param tableauVoix
	 * 				Tableau contenant les voix suceptibles d'être sélectionnées.
	 * @param pourcentageParVoix
	 * 				Le tableau d'entier de pondération. La voix i a tableauPonderation[i] pourcents de chance d'être sélectionné.
	 * @see Voix#Voix(int, int)
	 * @see test.VoixAleatoirePondereeTest#testVoixAleatoirePonderee()
	 */
	public VoixAleatoirePonderee(int idVotant, int nbAlternatives, Voix[] tableauVoix, int[] pourcentageParVoix) {
		super(idVotant, nbAlternatives);
		genererVoix(tableauVoix, pourcentageParVoix);
	}
	
	/**
	 * Choisit une voix de tableauVoix selon pourcentageVoix.<br>
	 * @see test.VoixAleatoirePondereeTest#testVoixAleatoirePonderee()
	 */
	private void genererVoix(Voix[] tableauVoix, int[] pourcentageParVoix){
		int nbAleatoire = Condorcet.donnerNbAleatoire(1, 100);
		int pourcentagesParcourus = 0;
		boolean voixPasChoisie = true;
		for(int i = 0; i < tableauVoix.length && voixPasChoisie; i++) {
			pourcentagesParcourus += pourcentageParVoix[i];
			if (nbAleatoire <= pourcentagesParcourus) {
				for(int j = 0; j < nbAlternatives; j++) {
					this.rangAlternatives[j] = tableauVoix[i].retournerRangAlternative(j);
					voixPasChoisie = false;
				}
			}
		}
	}
	
}
