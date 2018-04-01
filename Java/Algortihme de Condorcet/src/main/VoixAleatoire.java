package main;
/**
 * <p><b>La classe VoixAleatoire représente la voix généré aléatoirement avec un idVotant pour la rendre unique.</b><br>
 * Elle est une classe fille de Voix et est définie par:
 * <ul>
 * 	<li>L'ID du votant représenté par la voix.</li>
 * 	<li>Le nombre d'alternatives du vote.</li>
 * 	<li>Le rang des alternatives.</li>
 * </ul>
 * </p><br>
 * @author julien
 */
public class VoixAleatoire extends Voix {
		
	/**
	 * Constructeur VoixAleatoire.
	 * <p>
	 * 	A la construction d'un objet Voix, l'idVotant et nbAlternatives sont fixées par le constructeur de ballot.<br>
	 * 	La génération de rangAlternatives est dans la méthode {@link VoixAleatoire#genererRang()}.
	 * </p><br>
	 * @param idVotant 
	 * 				L'ID du votant.
	 * @param nbAlternatives 
	 * 				Le nombre d'alternatives du vote.
	 * @see Voix#Voix(int, int)
	 * @see VoixAleatoire#genererRang()
	 */
	public VoixAleatoire(int idVotant, int nbAlternatives) {
		super(idVotant, nbAlternatives);
		genererRang();
	}
	
	/**
	 * <b>Génère le rang de chaque alternative pour remplir le tableau rangAlternative.</b><br>
	 * La méthode créé un tableau pioche de taille (nbAlternatives + 1) avec pioche[i] = i.<br>
	 * Le tableau pioche permet de stocker les rangs qui n'ont pas encore été tirés.<br>
	 * Boucle for (pioche[0] = nbAlternatives; pioche[0] > 0; i++):
	 * <ul>
	 * 	<li>Génère un nombre aléatoire compris dans l'intervalle [0, pioche[0]].</li>
	 * 	<li>On remplit rangAlternatives[pioche[0]-1] suivant le nbAleatoire:
	 * 			<p><b>si nbAleatoire = 0: 0</b>  et on perd donc le rang représenté par pioche[pioche[0]].<br>
	 * 			<b>	si nbAleatoire = pioche[0]: pioche[nbAleatoire]</b>.<br>
	 * 			<b>	sinon: pioche[nbAleatoire] et pioche[nbAleatoire] = pioche[pioche[0]]</b> afin de garder le rang qui n'a pas été tiré.<br></p>
	 * 		Dans le cas où nbAleatoire = 0 comme on décrémente ensuite pioche[0] on perd le rang représenté par pioche[pioche[0]]</li>
	 * 	</li>
	 * </ul>
	 * <br>
	 *  A la fin de la méthode le classement est bien réalisé même si les nombres ne sont pas nécessairement consécutifs ils sont uniques et cela n'entraine donc pas de problèmes.<br>
	 *  @see VoixAleatoire#rangAlternatives
	 *  @see Condorcet#parcourirLesVoix()
	 */
	public void genererRang() {
		int nbAleatoire = 0;
		int[] pioche = new int[nbAlternatives + 1];
		
		for (int i = 1; i < nbAlternatives + 1; i++) {
			pioche[i] = i;
		}
		
		for (pioche[0] = nbAlternatives; pioche[0] > 0; pioche[0]--) {
			nbAleatoire = (int)(Math.random() * (pioche[0] + 1));
			if (nbAleatoire == 0) {
				rangAlternatives[pioche[0] - 1] = 0;
			}
			else if (nbAleatoire == pioche[0]){
				rangAlternatives[pioche[0] - 1] = pioche[nbAleatoire];
			}
			else {
				rangAlternatives[pioche[0] - 1] = pioche[nbAleatoire];
				pioche[nbAleatoire] = pioche[pioche[0]];
			}
		}
	}
}
