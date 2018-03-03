
public class Voix {
	private int idVotant;
	private int nbAlternatives;
	private int[] classement; // classement[0] donne le rang de l'alternative 1 (les alternatives sont numérotées à partir de 1)
	
 	public Voix(int idVotant, int nbAlternatives) {
 		this.idVotant = idVotant;
 		this.nbAlternatives = nbAlternatives;
		this.classement = new int[nbAlternatives];
	}
 	
 	public void addChoix (int idAlternative, int rang) {
 		classement[idAlternative] = rang;
 	}
 	
 	public int rangAlternative(int idAlternative) {
 		return classement[idAlternative];
 	}
 	
 	public String toString(){
 		String str = "Voix du votant " + Integer.toString(idVotant) + " :";
 		for (int i = 0; i < nbAlternatives; i++) {
 			str += " " + (i+1) + " rang " + classement[i] + " ;"; 
 		}
 		return str;
 	}
 	
}
