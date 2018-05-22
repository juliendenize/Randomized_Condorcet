package test;

import static org.junit.Assert.*;
import main.Voix;
import main.VoixAleatoirePonderee;
import main.VoixChoisie;

import org.junit.Test;

/**
 * Teste la classe {@link main.VoixAleatoirePonderee}.<br>
 * @author julien
 * @see main.VoixAleatoirePonderee
 */
public class VoixAleatoirePondereeTest {
	
	VoixAleatoirePonderee voix;
	
	/**
	 * Teste le constructeur {@link main.VoixAleatoirePonderee#VoixAleatoirePonderee(int, int, Voix[], int[])} en vérifiant que les probabilités
	 * qu'une voix soit choisie suivent bien la loi de probabilité donnée par le tableau de pourcentageParVoix en affichant le nombre de fois que
	 * chaque voix a été choisie <br>.
	 * @see main.VoixAleatoirePonderee#VoixAleatoirePonderee(int, int, Voix[], int[])
	 */
	@Test
	public void testVoixAleatoirePonderee() {
		
		VoixChoisie voix1 = new VoixChoisie(1, 3); VoixChoisie voix2 = new VoixChoisie(2, 3); VoixChoisie voix3 = new VoixChoisie(3, 3);
		voix1.ajouterUnChoix(0, 1); voix1.ajouterUnChoix(1, 2); voix1.ajouterUnChoix(2, 3);
		voix2.ajouterUnChoix(0, 2); voix2.ajouterUnChoix(1, 3); voix2.ajouterUnChoix(2, 1);
		voix3.ajouterUnChoix(0, 3); voix3.ajouterUnChoix(1, 1); voix3.ajouterUnChoix(2, 2);
		
		Voix[] tableauVoix = {voix1, voix2, voix3};
		int[] pourcentageParVoix = {70, 20, 10};
		int[] nbFoisVoixChoisie = new int[3];
		boolean voixPasTrouvee = true;
		boolean voixEgale = true;
		int nbVoixGenerees = 10000000;
		
		for(int i = 0; i < nbVoixGenerees; i++) {
			voix = new VoixAleatoirePonderee(1, 3, tableauVoix, pourcentageParVoix);
			voixPasTrouvee = true;
			for(int k = 0; k < tableauVoix.length && voixPasTrouvee; k++) {
				voixEgale = true;
				for (int j = 0; j < 3 && voixEgale; j++) {
					if (voix.retournerRangAlternative(j) != tableauVoix[k].retournerRangAlternative(j)) {
						voixEgale = false;
					}
				}
				if (voixEgale) {
					nbFoisVoixChoisie[k] += 1;
					voixPasTrouvee = false;
				}
			}
		}
		
		int compteur = 0;
		for(int i = 0; i < nbFoisVoixChoisie.length; i++) {
			compteur += nbFoisVoixChoisie[i];
		}
		
		assertEquals(nbVoixGenerees, compteur);
		
		for(int i = 0; i < nbFoisVoixChoisie.length; i++) {
			System.out.println("Voix " + Integer.toString(i+1) + " : " + Integer.toString(nbFoisVoixChoisie[i]));
		}
	}

}
