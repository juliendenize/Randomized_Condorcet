package test;

import static org.junit.Assert.*;

import main.VoixChoisie;

import org.junit.Test;

/**
 * Teste la classe VoixChoisie.
 * @author julien
 * @see VoixChoisie
 */
public class VoixChoisieTest {
	
	VoixChoisie voix = new VoixChoisie(1, 4);
	
	@Test
	public void testAjouterUnChoix() {
		voix.ajouterUnChoix(1,3);
		assertEquals(3, voix.retournerRangAlternative(1));
	}

	@Test
	public void testToString() {
		String test = "Voix du votant " + 1 + " :";
		for(int i = 0; i < 4; i++) {
			test += " " + (i+1) + " rang " + voix.retournerRangAlternative(i) + " ;"; 
		}
		assertEquals(test, voix.toString());
	}

}
