
public class VoixAleatoire {
	private int idVotant;
	private int nbAlternatives;
	private int[] rangAlternatives;
	
	public VoixAleatoire(int idVotant, int nbAlternatives) {
		this.idVotant = idVotant;
		this.nbAlternatives = nbAlternatives;
		generationRang();
	}
	
	public void generationRang() {
		this.rangAlternatives = new int[nbAlternatives];
		int nbAleatoire;
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
	
	public String toString() {
	 	String str = "Voix du votant " + Integer.toString(idVotant) + " :";
	 	for (int i = 0; i < nbAlternatives; i++) {
	 		str += " " + (i+1) + " rang " + rangAlternatives[i] + " ;"; 
	 	}
	 	return str;
	}
}
