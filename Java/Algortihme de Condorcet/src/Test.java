/**
 * <p><b>La classe Test permet d'effectuer des tests sans avoir à modifier beaucoup de code dans le main.</b>
 * Elle ne contient que des méthodes.</p>
 * <br>
 * @author julien
 */
public class Test {
	
	/**
	 * Teste la classe VoixAleatoire en créant plusieurs instances et en les affichant.<br>
	 * @see VoixAleatoire
	 * @see VoixAleatoire#toString()
	 */
	public void testVoixAleatoire() {
		int nbVotes = 1;
		int nbAlternatives = 5;
		VoixAleatoire voix;
		for(int i = 0; i < nbVotes; i++) {
			voix = new VoixAleatoire(i, nbAlternatives);
			System.out.println(voix);
		}
	}
	
	/**
	 * <b>Teste la classe Condorcet et Voix.</b><br>
	 * La méthode contient un tableau choix représentant chaque choix sous la forme: le votant, l'alternative et le rang.<br>
	 * Elle construit pour chaque votant une voix et on l'ajoute à une instance de Condorcet.<br>
	 * Elle lit le tableau compteur de l'instance de Condorcet qui si tout va bien affiche ce qui suit:<br>
	 *  0 2 3 2 3<br>
	 *  4 0 3 5 6<br>
	 *  3 3 0 5 5<br>
	 *  5 2 3 0 5<br>
	 *  4 2 3 4 0<br>
	 *  @see Condorcet
	 *  @see Voix
	 *  @see Voix#addChoix(int, int)
	 *  @see Condorcet#addVoix(Voix)
	 *  @see Condorcet#lectureCompteur()
	 */
	public void testCondorcet() {
		int nbAlternatives = 5;
		int[][] choix =
			{ 
			  {1, 1, 1}, {1, 2, 2}, {1, 3, 3}, {1, 4, 4}, {1, 5, 5},
			  
			  {2, 1, 3}, {2, 2, 2}, {2, 3, 5}, {2, 4, 1}, {2, 5, 4},
			  
			  {3, 1, 0}, {3, 2, 0}, {3, 3, 3}, {3, 4, 1}, {3, 5, 2},
			  
			  {4, 1, 4}, {4, 2, 0}, {4, 3, 1}, {4, 4, 2}, {4, 5, 3},
			  
			  {5, 1, 5}, {5, 2, 3}, {5, 3, 1}, {5, 4, 2}, {5, 5, 4},
			  
			  {6, 1, 0}, {6, 2, 1}, {6, 3, 0}, {6, 4, 0}, {6, 5, 2},
			  
			  {7, 1, 4}, {7, 2, 1}, {7, 3, 0}, {7, 4, 3}, {7, 5, 2},
			  
			  {8, 1, 1}, {8, 2, 2}, {8, 3, 5}, {8, 4, 4}, {8, 5, 3},
			  
			  {9, 1, 0}, {9, 2, 3}, {9, 3, 1}, {9, 4, 4}, {9, 5, 2},
			  
			  {10, 1, 5}, {10, 2, 3}, {10, 3, 1}, {10, 4, 4}, {10, 5, 2},
			};
		int idVotant = choix[0][0];
		
		Voix voix = new Voix(idVotant, nbAlternatives);
		Condorcet election = new Condorcet(nbAlternatives);
		
		for (int i = 0; i < choix.length; i++) {
			if (idVotant != choix[i][0]) {
				election.addVoix(voix);
				System.out.println(voix);
				idVotant=choix[i][0];
				voix = new Voix(idVotant, nbAlternatives);
			}
			voix.addChoix(choix[i][1] - 1, choix[i][2]); // les alternatives sont comptées à partir de 1 d'où le -1 pour remplir le tableau classement de voix
		}
		System.out.println(voix);
		election.addVoix(voix);	
		election.parcoursVoix();
		election.lectureCompteur();
	}
}
