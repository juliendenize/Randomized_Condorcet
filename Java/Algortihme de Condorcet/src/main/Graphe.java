package main;
import java.util.Stack;

/**
 * <p><b>La classe Graphe représente le graphe orienté engendré par les résultats des matchs d'une instance de Condorcet.</b><br>
 * Elle est définie par:
 * <ul>
 * 	<li>Le nombre de noeuds du graphe.</li>
 * 	<li>La matrice d'adjacence du graphe.</li>
 * 	<li>
 * </ul>
 * <br>
 * @author julien
 * @see test.GrapheTest
 */
public class Graphe {
	
	/**
	 * Nombre de noeuds du graphe. Ce nombre n'est pas modifiable.
	 */
	private int nbNoeuds;
	
	/**
	 * Représente la matrice d'adjacence du graphe orienté: si matrice[0][1] = 1 alors 1 pointe vers 0.<br>
	 * Cette matrice n'est pas modifiable.
	 */
	private int[][] matrice;
	
	/**
	 * Constructeur de Graphe
	 * @param nbAlternatives
	 * 					Le nombre d'Alternatives de l'élection que le graphe doit résoudre
	 * @param compteur
	 * 					Le compteur des résultats des matchs sur toutes les voix de l'élection
	 * @see Condorcet
	 */
	public Graphe(int nbAlternatives, int[][] compteur) {
		this.nbNoeuds = nbAlternatives;
		genererMatrice(compteur);
	}
	
	/**
	 * <b>Génère la matrice.</b><br>
	 * La méthode compare si pour chaque alternative i et j avec i != j, i a gagné plus de matchs par rapport à j.
	 * Lorsque c'est le cas on met un dans la matrice dans la case matrice[j][i].
	 * Si ils ont gagné autant de matchs on laisse à zéro.<br>
	 * @param compteur
	 * 				Le compteur de matchs passé au constructeur.
	 * @see Graphe#Graphe(int, int[][])
	 */
	private void genererMatrice(int [][] compteur) {
		this.matrice = new int[nbNoeuds][nbNoeuds];
		for (int i = 0; i < nbNoeuds; i++) {
			for (int j = i + 1; j < nbNoeuds; j++) {
				if(compteur[i][j] > compteur[j][i]) {
					matrice[i][j] = 1;
				}
				else if (compteur[i][j] < compteur[j][i]) {
					matrice[j][i] = 1;
				}
			}
		}
	}
	
	/**
	 * Retourne la matrice.<br>
	 * @see Graphe#matrice
	 * @see test.GrapheTest#testRetournerMatrice()
	 * @return La matrice du graphe sous forme d'un tableau à deux dimensions.
	 */
	public int[][] retournerMatrice() {
		return matrice;
	}
	
	/**
	 * <b>Renvoie le vainqueur de Condorcet si il existe.</b><br>
	 * Si un candidat i bat tous les autres candidats j alors i est le vainqueur de Condorcet.<br>
	 * @return Renvoie le vainqueur de Condorcet si il existe sous la forme d'un entier. Si il n'existe pas renvoie 0.
	 * @see test.GrapheTest#testRetournerVainqueurGraphe()
	 */
	public int retournerVainqueurGraphe() {
		int vainqueur = -1;
		boolean vainqueurTrouve = false;
		for (int i = 0; i < nbNoeuds && vainqueurTrouve == false; i++) {
			vainqueurTrouve = true;
			for(int j = 0; j < nbNoeuds; j++) {
				if (j != i) {
					if (matrice[i][j] == 0){
						vainqueurTrouve = false;
					}
				}
			}
			if (vainqueurTrouve == true){
				vainqueur = i;
			}
		}
		return vainqueur;
	}
	
	/**
	 * <b>Teste si le graphe contient un cycle en appliquant un parcours en profondeur pour chaque noeud.</b><br>
	 * 	Si on arrive à retourner sur le noeud de départ il y a un cycle.  
	 * @return Renvoie si il y a cycle sous forme de booléen, true si oui, false sinon.
	 * @see test.GrapheTest#testContientCycle()
	 */
	public boolean contientCycle() {
		boolean[] noeudsVisite = null;
		int noeudActuel = 0;
		Stack<Integer> noeudsVoisins = null;
		for(int i = 0; i < nbNoeuds; i++) {
			noeudsVisite = new boolean[nbNoeuds];
			noeudsVoisins = new Stack<Integer>();
			noeudsVoisins.push(i);
			while(!noeudsVoisins.empty()) {
				noeudActuel = noeudsVoisins.pop();
				noeudsVisite[noeudActuel] = true;
				for (int j = 0; j < nbNoeuds; j++) {
					if (matrice[noeudActuel][j] == 1) {
						if (noeudsVisite[j] == false) noeudsVoisins.push(j);
						else if (j == i) return true;
					}
				}
			}
		}
		return false;
	}
	
	/**
	 * Compte le nombre de matchs gagnés pour chaque alternative et le nombre total de victoires. <br> 
	 * @return Renvoie un tableau d'entiers contenant les matchs gagnés pour chaque alternative et le nombre total de matchs gagnés.
	 * @see test.GrapheTest#testCompterNbMatchsGagnes()
	 */
	public int[] compterNbMatchsGagnes() {
		int[] nbVictoires = new int[nbNoeuds + 1];
		for(int i = 0; i < nbNoeuds; i ++) {
			for(int j = 0; j < nbNoeuds; j++) {
				if (matrice[i][j] == 1) {
					nbVictoires[i] += 1;
					nbVictoires[nbNoeuds] += 1; 
				}
			}
		}
		return nbVictoires;
	}
	
	/**
	 * Retourne le nombre de noeuds du graphe et le vainqueur sous forme de chaîne de caractères.
	 * @return 
	 * 			Chaîne de caractères donnant nombre de noeuds et vainqueur.
	 * @see test.GrapheTest#testToString()
	 */
	public String toString() {
		String str = "Il y a " + Integer.toString(nbNoeuds) + " noeuds et le vainqueur du graphe est " + Integer.toString(retournerVainqueurGraphe()) + ".";
		return str;
	}
}
