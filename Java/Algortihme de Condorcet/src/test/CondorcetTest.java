package test;

import static org.junit.Assert.*;

import main.Condorcet;
import main.VoixChoisie;

import org.junit.Before;
import org.junit.Test;

/**
 * Teste la classe {@link main.Condorcet}.<br> 
 * @author julien
 * @see main.Condorcet
 */
public class CondorcetTest {
	
	/**
	 * Représente une élection où un vainqueur de Condorcet existe.<br>
	 * @see main.Condorcet
	 */
	Condorcet electionAvecVainqueurDeCondorcet = new Condorcet(3);
	
	/**
	 * Représente une élection où il n'y a pas de vainqueur de Condorcet et où les victoires forment un cycle de vainqueurs.<br>
	 * @see main.Condorcet
	 */
	Condorcet electionAvecCycle = new Condorcet(3);
	
	/**
	 * Représente une élection où il n'y a pas de vainqueur de Condorcet mais où il y a une alternative qui gagne plus que toutes les autres.<br>
	 * @see main.Condorcet
	 */
	Condorcet electionUnVainqueurParMatch = new Condorcet(3);
	
	/**
	 * Représente une élection où il n'y a pas de vainqueur de Condorcet sans cycle mais avec plusieurs vainqueurs en tête.<br>
	 * @see main.Condorcet
	 */
	Condorcet electionPlusieursVainqueursParMatch = new Condorcet(3);
	
	public static void lireTableau(int[] tableau) {
		for (int i = 0; i < tableau.length; i++) {
			System.out.print(tableau[i] + " ");
		}
		System.out.println();
	}
	
	/**
	 * Prépare chaque élection en ajoutant des voix pour tester différents cas de figure:
	 * <ul>
	 * 	<li>Vainqueur de Condorcet.</li>
	 * 	<li>Cycle présent donc désignation par loi pondérée par les matchs.</li>
	 * 	<li>Vainqueur par nombre maximum de matchs gagnés.</li>
	 * 	<li>Vainqueur désigné par les alternatives en tête (même nombre de matchs maximums gagnés).</li>
	 * </ul>
	 * @throws Exception s'il y a une erreur renvoie une exception
	 * @see main.VoixChoisie
	 * @see main.VoixChoisie#ajouterUnChoix(int, int)
	 */
	@Before
	public void setUp() throws Exception {
		VoixChoisie v1 = new VoixChoisie(1, 3); VoixChoisie v2 = new VoixChoisie(2, 3); VoixChoisie v3 = new VoixChoisie(3, 3); VoixChoisie v4 = new VoixChoisie(4, 3); VoixChoisie v5 = new VoixChoisie(5, 3); VoixChoisie v6 = new VoixChoisie(6, 3); 
		
		v1.ajouterUnChoix(0, 2); v1.ajouterUnChoix(1, 1); v1.ajouterUnChoix(2, 3);
		v2.ajouterUnChoix(0, 1); v2.ajouterUnChoix(1, 0); v2.ajouterUnChoix(2, 3);
		v3.ajouterUnChoix(0, 2); v3.ajouterUnChoix(1, 1); v3.ajouterUnChoix(2, 3);
		v4.ajouterUnChoix(0, 3); v4.ajouterUnChoix(1, 1); v4.ajouterUnChoix(2, 2);
		v5.ajouterUnChoix(0, 0); v5.ajouterUnChoix(1, 1); v5.ajouterUnChoix(2, 3);
		electionAvecVainqueurDeCondorcet.ajouterUneVoix(v1); electionAvecVainqueurDeCondorcet.ajouterUneVoix(v2); electionAvecVainqueurDeCondorcet.ajouterUneVoix(v3); electionAvecVainqueurDeCondorcet.ajouterUneVoix(v4); electionAvecVainqueurDeCondorcet.ajouterUneVoix(v5); 
		
		v1 = new VoixChoisie(1, 3); v2 = new VoixChoisie(2, 3); v3 = new VoixChoisie(3, 3);
		v1.ajouterUnChoix(0, 1); v1.ajouterUnChoix(1, 3); v1.ajouterUnChoix(2, 2);
		v2.ajouterUnChoix(0, 2); v2.ajouterUnChoix(1, 1); v2.ajouterUnChoix(2, 3);
		v3.ajouterUnChoix(0, 3); v3.ajouterUnChoix(1, 2); v3.ajouterUnChoix(2, 1);
		electionAvecCycle.ajouterUneVoix(v1); electionAvecCycle.ajouterUneVoix(v2); electionAvecCycle.ajouterUneVoix(v3); 
		
		v1 = new VoixChoisie(1, 3); v2 = new VoixChoisie(2, 3); v3 = new VoixChoisie(3, 3); v4 = new VoixChoisie(4, 3); v5 = new VoixChoisie(5, 3);
		v1.ajouterUnChoix(0, 2); v1.ajouterUnChoix(1, 1); v1.ajouterUnChoix(2, 3);
		v2.ajouterUnChoix(0, 2); v2.ajouterUnChoix(1, 1); v2.ajouterUnChoix(2, 3);
		v3.ajouterUnChoix(0, 1); v3.ajouterUnChoix(1, 2); v3.ajouterUnChoix(2, 0);
		v4.ajouterUnChoix(0, 1); v4.ajouterUnChoix(1, 2); v4.ajouterUnChoix(2, 0);
		v5.ajouterUnChoix(0, 2); v5.ajouterUnChoix(1, 0); v5.ajouterUnChoix(2, 1);
		v6.ajouterUnChoix(0, 2); v6.ajouterUnChoix(1, 0); v6.ajouterUnChoix(2, 1);
		electionUnVainqueurParMatch.ajouterUneVoix(v1); electionUnVainqueurParMatch.ajouterUneVoix(v2); electionUnVainqueurParMatch.ajouterUneVoix(v3); electionUnVainqueurParMatch.ajouterUneVoix(v4); electionUnVainqueurParMatch.ajouterUneVoix(v5); electionUnVainqueurParMatch.ajouterUneVoix(v6);
		
		v1 = new VoixChoisie(1, 3); v2 = new VoixChoisie(2, 3); v3 = new VoixChoisie(3, 3); v4 = new VoixChoisie(4, 3); v5 = new VoixChoisie(5, 3);
		v1.ajouterUnChoix(0, 2); v1.ajouterUnChoix(1, 1); v1.ajouterUnChoix(2, 3);
		v2.ajouterUnChoix(0, 2); v2.ajouterUnChoix(1, 1); v2.ajouterUnChoix(2, 3);
		v3.ajouterUnChoix(0, 1); v3.ajouterUnChoix(1, 2); v3.ajouterUnChoix(2, 3);
		v4.ajouterUnChoix(0, 1); v4.ajouterUnChoix(1, 2); v4.ajouterUnChoix(2, 3);
		v5.ajouterUnChoix(0, 2); v5.ajouterUnChoix(1, 0); v5.ajouterUnChoix(2, 1);
		electionPlusieursVainqueursParMatch.ajouterUneVoix(v1); electionPlusieursVainqueursParMatch.ajouterUneVoix(v2); electionPlusieursVainqueursParMatch.ajouterUneVoix(v3); electionPlusieursVainqueursParMatch.ajouterUneVoix(v4); electionPlusieursVainqueursParMatch.ajouterUneVoix(v5);

	}
	
	/**Teste la méthode {@link main.Condorcet#retournerCompteur()} en comparant pour chaque élection le nombre de matchs gagnés par alternative comptabilisés par
	 * l'algorithme et celui attendu.<br>
	 * @see main.Condorcet#retournerCompteur()
	 */
	@Test
	public void testRetournerCompteur() {
		electionAvecVainqueurDeCondorcet.elireLeVainqueur();
		int[][] attendu = {{0,0,3},
						   {3,0,4},
						   {1,0,0}};
		assertArrayEquals(attendu, electionAvecVainqueurDeCondorcet.retournerCompteur());
		
		electionAvecCycle.elireLeVainqueur();
		int[][] attendu2 = {{0,1,2},
						  {2,0,1},
						  {1,2,0}};
		assertArrayEquals(attendu2, electionAvecCycle.retournerCompteur());
		
		electionUnVainqueurParMatch.elireLeVainqueur();
		int[][] attendu3 = {{0,2,2},
	            		    {2,0,2},
	            		    {2,0,0}};
		assertArrayEquals(attendu3, electionUnVainqueurParMatch.retournerCompteur());
		
		
		electionPlusieursVainqueursParMatch.elireLeVainqueur();
		int[][] attendu4 = {{0,2,4},
				            {2,0,4},
				   	        {1,0,0}};
		assertArrayEquals(attendu4, electionPlusieursVainqueursParMatch.retournerCompteur());
	}
	
	/**
	 * Teste la méthode {@link main.Condorcet#donnerNbAleatoire(int, int)} en testant plusieurs centaines de fois si le nombre aléatoire est bien dans la plage demandée
	 * en faisant également varier cette plage de données d'un petit écart à un grand.<br>
	 * @see main.Condorcet#donnerNbAleatoire(int, int)
	 */
	@Test
	public void testDonnerNbAleatoire() {
		int nb = 0;
		for (int i = 0; i < 100; i++) {
			for (int j = 0; j < i; j++) {
				nb = Condorcet.donnerNbAleatoire(j, i);
				if (!(nb <= i || nb >=j)) {
					fail("Nombre dans la mauvaise plage de données.");
				}
			}
		}
	}
	
	/**
	 * Teste la méthode {@link main.Condorcet#elireLeVainqueur()}. Comme chaque élection est différente, tous les cas de figure sont testés. Concernant les élections
	 * où le vainqueur est élu par une loi de probabilité on teste 1000 fois l'algorithme en comptant combien de fois chaque alternative est élue pour savoir si les
	 * probabilités sont bien respectées.<br>
	 * @see main.Condorcet#elireLeVainqueur()
	 */
	@Test
	public void testElireLeVainqueur() {
		assertEquals(2, electionAvecVainqueurDeCondorcet.elireLeVainqueur());
		
		int[] nbDeVictoireParAlternatives = new int[3];
		int vainqueur;
		for (int i = 0; i < 1000; i++) {
			vainqueur = electionAvecCycle.elireLeVainqueur();
			if (vainqueur > 3 || vainqueur < 1) { // Le vainqueur doit être soit 1, 2 ou 3 avec une probabilité uniforme.
				fail("Vainqueur en dehors de la plage autorisée pour vainqueur cycle");
			}
			else {
				nbDeVictoireParAlternatives[vainqueur - 1] += 1;
			}
		}
		System.out.println("Nombre de victoires par alternatives:");
		lireTableau(nbDeVictoireParAlternatives);
		
		assertEquals(2, electionUnVainqueurParMatch.elireLeVainqueur());
		
		nbDeVictoireParAlternatives = new int[3];
		for (int i = 0; i < 1000; i++) {
			vainqueur = electionPlusieursVainqueursParMatch.elireLeVainqueur();
			if (vainqueur != 1 && vainqueur != 2) { // Le vainqueur doit être soit 1 soit 2 avec une probabilité uniforme.
				fail("Vainqueur en dehors de la plage autorisée pour plusieurs vainqueurs sans cycle");
			}
			else {
				nbDeVictoireParAlternatives[vainqueur - 1] += 1;
			}
		}
		System.out.println("Nombre de victoires par alternatives:");
		lireTableau(nbDeVictoireParAlternatives);
		
	}

	/**
	 * Teste la méthode {@link main.Condorcet#toString()}. Elle compare pour une élection connue la chaîne de caractères attendue et ce que l'élection renvoie.<br>
	 * @see main.Condorcet#toString()
	 */
	@Test
	public void testToString() {
		electionAvecVainqueurDeCondorcet.elireLeVainqueur();
		String attendu = "Election avec " + 3 + " alternatives et le gagnant est " + 2;
		assertEquals(attendu, electionAvecVainqueurDeCondorcet.toString());
	}

}