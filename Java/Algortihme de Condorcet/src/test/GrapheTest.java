package test;

import static org.junit.Assert.*;

import main.Graphe;

import org.junit.Test;

/**
 * Teste la classe {@link main.Graphe}.<br>
 * @author julien
 * @see main.Graphe
 */
public class GrapheTest {
	
	/**
	 * Matrice pour initialiser graphe.<br>
	 * @see GrapheTest#graphe
	 */
	int[][] matrice =  {{0, 2, 1}, {3, 0, 1}, {2, 1, 0}};
	
	/**
	 * Matrice pour initialiser graphe2.<br>
	 * @see GrapheTest#graphe2
	 */
	int[][] matrice2 = {{0, 2, 1}, {3, 0, 1}, {2, 3, 0}};
	
	/**
	 * Matrice pour initialiser graphe3.<br>
	 * @see GrapheTest#graphe3
	 */
	int[][] matrice3 = {{0, 0, 1}, {1, 0, 0}, {0, 1, 0}};
	
	/**
	 * Matrice pour initialiser graphe4.<br>
	 * @see GrapheTest#graphe4
	 */
	int[][] matrice4 = {{0, 0, 1, 0, 0}, {1, 0, 0, 0, 0}, {0, 1, 0, 0, 0}, {0, 0, 0, 0, 1}, {0, 0, 0, 0, 0}}; 
	
	/**
	 * Graphe sans cycle et sans vainqueur de Condorcet.<br>
	 * @see main.Graphe
	 */
	Graphe graphe = new Graphe(3, matrice);
	
	/**
	 * Graphe sans cycle et avec vainqueur de Condorcet.<br>
	 * @see main.Graphe
	 */
	Graphe graphe2 = new Graphe(3, matrice2);
	
	/**
	 * Graphe avec cycle englobant tous les noeuds du graphe.<br>
	 * @see main.Graphe
	 */
	Graphe graphe3 = new Graphe(3, matrice3);
	
	/**
	 * Graphe avec cycle de support n'englobant pas tous les noeuds du graphe.<br>
	 * @see main.Graphe
	 */
	Graphe graphe4 = new Graphe(5, matrice4);
	
	/**
	 * Teste la méthode {@link main.Graphe#retournerMatrice()} en vérifiant pour chaque graphe testé si sa matrice est bien celle attendue.<br>
	 * @see main.Graphe#retournerMatrice()
	 * @see main.Graphe
	 */
	@Test
	public void testRetournerMatrice() {
		int[][] attendu = {{0, 0, 0}, {1, 0, 0}, {1, 0, 0}};
		int[][] attendu2 = {{0, 0, 0}, {1, 0, 0}, {1, 1, 0}};
		int[][] attendu3 = {{0, 0, 1}, {1, 0, 0}, {0, 1, 0}};
		int[][] attendu4 = {{0, 0, 1, 0, 0}, {1, 0, 0, 0, 0}, {0, 1, 0, 0, 0}, {0, 0, 0, 0, 1}, {0, 0, 0, 0, 0}};
		assertArrayEquals(attendu, graphe.retournerMatrice());
		assertArrayEquals(attendu2, graphe2.retournerMatrice());
		assertArrayEquals(attendu3, graphe3.retournerMatrice());
		assertArrayEquals(attendu4, graphe4.retournerMatrice());
		
	}
	
	/**
	 * Teste la méthode {@link main.Graphe#retournerVainqueurGraphe()} en vérifiant que cette méthode renvoie un vainqueur uniquement s'il existe un vainqueur de Condorcet
	 * en testant chaque graphe et sinon renvoie -1.<br>
	 * @see main.Graphe#retournerVainqueurGraphe()
	 */
	@Test
	public void testRetournerVainqueurGraphe() {
		assertEquals(-1, graphe.retournerVainqueurGraphe());
		assertEquals(2, graphe2.retournerVainqueurGraphe());
		assertEquals(-1, graphe3.retournerVainqueurGraphe());
		assertEquals(-1, graphe4.retournerVainqueurGraphe());
	}

	/**
	 * Teste la méthode {@link main.Graphe#contientCycle()} en vérifiant qu'elle renvoie true pour les graphes testés contenant un cycle et false sinon.<br>
	 * @see main.Graphe#contientCycle()
	 */
	@Test
	public void testContientCycle() {
		assertEquals(false, graphe.contientCycle());
		assertEquals(false, graphe2.contientCycle());
		assertEquals(true,graphe3.contientCycle());
		assertEquals(true, graphe4.contientCycle());
	}

	/**
	 * Teste la méthode {@link main.Graphe#compterNbMatchGagnés()} en vérifiant qu'elle compte bien le nombre de matchs gagnés par chaque alternative pour chaque
	 * graphe testé.<br>
	 * @see main.Graphe#compterNbMatchGagnés()
	 */
	@Test
	public void testCompterNbMatchGagnés() {
		int[] graphe1MatchsGagnes = {0, 1, 1, 2};
		int[] graphe2MatchsGagnes = {0, 1, 2, 3};
		int[] graphe3MatchsGagnes = {1, 1, 1, 3};
		int[] graphe4MatchsGagnes = {1, 1, 1 , 1, 0, 4};
		assertArrayEquals(graphe1MatchsGagnes, graphe.compterNbMatchGagnés());
		assertArrayEquals(graphe2MatchsGagnes, graphe2.compterNbMatchGagnés());
		assertArrayEquals(graphe3MatchsGagnes, graphe3.compterNbMatchGagnés());
		assertArrayEquals(graphe4MatchsGagnes, graphe4.compterNbMatchGagnés());
	}
	
	/**
	 * Teste la méthode {@link main.Graphe#toString()} en vérifiant qu'elle renvoie bien la chaîne de caractère représentant le graphe testé.<br>
	 * @see main.Graphe#toString()
	 */
	@Test
	public void testToString() {
		String str = "Il y a 3 noeuds et le vainqueur du graphe est -1.";
		assertEquals(str, graphe.toString());
	}
}