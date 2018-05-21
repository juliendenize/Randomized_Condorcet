package main;

import main.DataBase;

/**
 * Classe de démarrage de l'application.<br>
 * @author julien
 *
 */
public class Main {
	/**
	 * Méthode statique et est chargée en mémoire au démarrage de l'appli.<br>
	 * @param args
	 */
	public static void main(String[] var) throws Exception{
		int idVote = Integer.parseInt(var[3]);
		DataBase db = new DataBase(var[0], var[1], var[2]);
		db.connectDB();
		int n = db.getNbAlternatives(idVote);
		Condorcet election = new Condorcet(n);
		db.remplirToutesLesVoix(idVote, election);
		db.saveWinner(election.elireLeVainqueur(), idVote);
		System.out.println(election.toString());
		db.deconectDB();
	}
		
}
