
public class Voix {
	private int idVotant;
	private int nbAlternatives;
	private int[] classement;
 	public Voix(int nbAlternatives) {
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
 		return "Voix du votant" + Integer.toString(idVotant);
 	}
}
