package test;

import static org.junit.Assert.*;

import main.Graphe;

import org.junit.Test;

/**
 * Teste la classe Graphe.<br>
 * @author julien
 * @see Graphe
 */
public class GrapheTest {

	int[][] matrice =  {{0, 2, 1}, {3, 0, 1}, {2, 1, 0}};
	int[][] matrice2 = {{0, 2, 1}, {3, 0, 1}, {2, 3, 0}};
	int[][] matrice3 = {{0, 0, 1}, {1, 0, 0}, {0, 1, 0}};
	int[][] matrice4 = {{0, 0, 1, 0, 0}, {1, 0, 0, 0, 0}, {0, 1, 0, 0, 0}, {0, 0, 0, 0, 1}, {0, 0, 0, 0, 0}}; 
	Graphe graphe = new Graphe(3, matrice);
	Graphe graphe2 = new Graphe(3, matrice2);
	Graphe graphe3 = new Graphe(3, matrice3);
	Graphe graphe4 = new Graphe(5, matrice4);
	
	
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

	@Test
	public void testRetournerVainqueurGraphe() {
		assertEquals(-1, graphe.retournerVainqueurGraphe());
		assertEquals(2, graphe2.retournerVainqueurGraphe());
		assertEquals(-1, graphe3.retournerVainqueurGraphe());
		assertEquals(-1, graphe4.retournerVainqueurGraphe());
	}

	@Test
	public void testContientCycle() {
		assertEquals(false, graphe.contientCycle());
		assertEquals(false, graphe2.contientCycle());
		assertEquals(true,graphe3.contientCycle());
		assertEquals(true, graphe4.contientCycle());
	}

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

}