package test;

import static org.junit.Assert.*;

import main.VoixChoisie;

import org.junit.Test;

/**
 * Teste la classe {@link main.VoixChoisie}.<br>
 * @author julien
 * @see main.VoixChoisie
 */
public class VoixChoisieTest {
	
	VoixChoisie voix = new VoixChoisie(1, 4);
	
	/**
	 * Teste la méthode {@link main.VoixChoisie#ajouterUnChoix(int, int)} en comparant le rang attendu d'une alternative dont on a ajouté le choix et ce que renvoie 
	 * la voix pour le rang de cette alternative.<br>
	 * @see main.VoixChoisie#ajouterUnChoix(int, int)
	 */
	@Test
	public void testAjouterUnChoix() {
		voix.ajouterUnChoix(1,3);
		assertEquals(3, voix.retournerRangAlternative(1));
	}

	/**
	 * Teste la méthode {@link main.Voix#toString()} en comparant la chaîne attendue avec le toString renvoyé par la voix.<br>
	 * @see main.Voix#toString()
	 */
	@Test
	public void testToString() {
		String test = "Voix du votant " + 1 + " :";
		for(int i = 0; i < 4; i++) {
			test += " " + (i+1) + " rang " + voix.retournerRangAlternative(i) + " ;"; 
		}
		assertEquals(test, voix.toString());
	}

}

