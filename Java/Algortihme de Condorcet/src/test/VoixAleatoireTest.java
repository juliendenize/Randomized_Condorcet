package test;

import static org.junit.Assert.*;

import main.VoixAleatoire;

import org.junit.Test;

/**
 * Teste la classe {@link main.VoixAleatoire}.
 * @author julien
 * @see main.VoixAleatoire
 */
public class VoixAleatoireTest {
	
	/**
	 * Voix testée.<br>
	 * @see main.VoixAleatoire
	 */
	VoixAleatoire voix = new VoixAleatoire(1, 4);
	
	/**
	 * Teste la méthode {@link main.Voix#toString()} en comparant la chaîne attendu avec le toString renvoyée par la voix.<br>
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