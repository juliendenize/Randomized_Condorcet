import java.util.*;

public class Condorcet {
	private int nbAlternatives;
	private LinkedList<Voix> toutesLesVoix;
	private int[][] compteur;
	private int gagnant;
	public Condorcet(int nbAlternatives) {
		this.nbAlternatives = nbAlternatives;
		this.compteur = new int[nbAlternatives][nbAlternatives];
		this.gagnant = 0;
		this.toutesLesVoix = new LinkedList<Voix>();
	}
	public void addVoix(Voix voix) {
		this.toutesLesVoix.add(voix);
	}
	public void parcoursVoix() {
		for (Voix cur: toutesLesVoix) {
			for (int i = 0; i < nbAlternatives; i++) {
				if (cur.rangAlternative(i) != 0) {
					for (int j = i+1; j < nbAlternatives; j++) {
						if (cur.rangAlternative(j) != 0) {
							compteur[i][j] += 1;
						}
					}
				}
			}
		}
	}
	public String toString() {
		return "Election avec " + Integer.toString(nbAlternatives) + " alternatives et le gagnat est " + Integer.toString(gagnant);
	}

}
