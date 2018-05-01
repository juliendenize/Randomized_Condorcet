package test;

import static org.junit.Assert.*;

import main.VictoireParMatchs;

import org.junit.Test;

/**
 * Teste la classe {@link main.VictoireParMatchs}.
 * @author julien
 * @see main.VictoireParMatchs
 */
public class VictoireParMatchsTest {
	
	/**
	 * Tableau pour initialiser test1.
	 * @see VictoireParMatchsTest#test1
	 */
	int[] nbMatchsGagnes1 = {3, 1, 1, 5};
	
	/**
	 * Tableau pour initialiser test2.
	 * @see VictoireParMatchsTest#test2
	 */
	int[] nbMatchsGagnes2= {0, 1, 2, 3};
	
	/**
	 * Tableau pour initialiser test2.
	 * @see VictoireParMatchsTest#test2
	 */
	int[] nbMatchsGagnes3 = {0, 1, 1, 3};
	
	/**
	 * Tableau pour initialiser test2.
	 * @see VictoireParMatchsTest#test2
	 */
	int[] nbMatchsGagnes4 = {0, 1, 0, 1 , 1, 0, 3};
	
	/**
	 * Victoire où l'alternative 0 a gagné plus de matchs que toutes les autres.<br>
	 * @see main.VictoireParMatchs
	 */
	VictoireParMatchs test1 = new VictoireParMatchs(nbMatchsGagnes1);
	
	/**
	 * Victoire où l'alternative 2 a gagné plus de matchs que toutes les autres.<br>
	 * @see main.VictoireParMatchs
	 */
	VictoireParMatchs test2 = new VictoireParMatchs(nbMatchsGagnes2); 
	
	/**
	 * Victoire où les alternatives 1 et 2 ont gagné le même nombre de matchs.<br>
	 * @see main.VictoireParMatchs
	 */
	VictoireParMatchs test3;
	
	/**
	 * Victoire où les alternatives 1, 3 et 4 ont gagné le même nombre de matchs.
	 */
	VictoireParMatchs test4; 
	
	/**
	 * Lit le tableau donné en paramètre. 
	 * @param tableau
	 * 				Tableau d'entiers.
	 */
	public static void lireTableau (int[] tableau) {
		for (int i = 0; i < tableau.length; i++) {
			System.out.print(tableau[i] + " ");
		}
		System.out.println();
	}
	
	/**
	 * Teste la méthode {@link main.VictoireParMatchs#retournerVainqueur()} en vérifiant que les alternatives gagnantes sont bien celles attendus. Dans le cas où les
	 * vainqueurs sont désignés par une loi de probabilité uniforme on compte sur 1000 élections combien de fois ils ont gagnés pour vérifier que la loi est uniforme.<br>
	 * @see main.VictoireParMatchs#retournerVainqueur()
	 */
	@Test
	public void testRetournerVainqueur() {
		assertEquals(test1.retournerVainqueur(), 0);
		assertEquals(test2.retournerVainqueur(), 2);
		
		int[] nbDeVictoireParAlternatives = new int[3];
		int vainqueur;
		for (int i = 0; i < 1000; i++) {
			test3 = new VictoireParMatchs(nbMatchsGagnes3);
			vainqueur = test3.retournerVainqueur();
			if (vainqueur > 2 || vainqueur < 1) { // Le vainqueur doit être soit 1 ou 2.
				fail("Vainqueur en dehors de la plage autorisée");
			}
			else {
				nbDeVictoireParAlternatives[vainqueur] += 1;
			}
		}
		lireTableau(nbDeVictoireParAlternatives); //Permet de vérifier si on obtient bien une loi uniforme.
		
		int[] nbDeVictoireParAlternatives2 = new int[5];
		for (int i = 0; i < 1000; i++) {
			test4 = new VictoireParMatchs(nbMatchsGagnes4);
			vainqueur = test4.retournerVainqueur();
			if (vainqueur == 1 || vainqueur == 3 || vainqueur == 4) { //Le vainqueur doit être soit 1 soit 3 soit 4.
				nbDeVictoireParAlternatives2[vainqueur] += 1;
			}
			else {
				fail("Vainqueur en dehors de la plage autorisée");
			}
		}
		lireTableau(nbDeVictoireParAlternatives2); //Permet de vérifier si on obtient bien une loi uniforme.
	}

}