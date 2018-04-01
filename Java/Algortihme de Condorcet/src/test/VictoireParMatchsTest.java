package test;

import static org.junit.Assert.*;

import main.VictoireParMatchs;

import org.junit.Test;

/**
 * Teste la classe VictoireParMatchs
 * @author julien
 * @see VictoireParMatchs
 */
public class VictoireParMatchsTest {

	int[] nbMatchsGagnes1 = {3, 1, 1, 5};
	int[] nbMatchsGagnes2= {0, 1, 2, 3};
	int[] nbMatchsGagnes3 = {1, 1, 1, 3};
	int[] nbMatchsGagnes4 = {0, 1, 0, 1 , 1, 0, 4};
	VictoireParMatchs test1 = new VictoireParMatchs(nbMatchsGagnes1); 
	VictoireParMatchs test2 = new VictoireParMatchs(nbMatchsGagnes2); 
	VictoireParMatchs test3;
	VictoireParMatchs test4; 
	
	
	public static void lireTableau (int[] tableau) {
		for (int i = 0; i < tableau.length; i++) {
			System.out.print(tableau[i] + " ");
		}
		System.out.println();
	}
	
	@Test
	public void testRetournerVainqueur() {
		assertEquals(test1.retournerVainqueur(), 0);
		assertEquals(test2.retournerVainqueur(), 2);
		
		int[] nbDeVictoireParAlternatives = new int[3];
		int vainqueur;
		for (int i = 0; i < 1000; i++) {
			test3 = new VictoireParMatchs(nbMatchsGagnes3);
			vainqueur = test3.retournerVainqueur();
			if (vainqueur > 2 || vainqueur < 0) { // Le vainqueur doit être soit 0, 1 ou 2.
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
