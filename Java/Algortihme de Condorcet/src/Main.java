
public class Main {
	
	static public void main (String[] args) {
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
		Condorcet vote = new Condorcet(nbAlternatives);
		
		for (int i = 0; i < choix.length; i++) {
			if (idVotant != choix[i][0]) {
				vote.addVoix(voix);
				System.out.println(voix);
				idVotant=choix[i][0];
				voix = new Voix(idVotant, nbAlternatives);
			}
			voix.addChoix(choix[i][1] - 1, choix[i][2]);
		}
		System.out.println(voix);
		vote.addVoix(voix);	
		vote.parcoursVoix();
		vote.lectureCompteur();
		
		
	}
	
}
