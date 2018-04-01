package test;

import static org.junit.Assert.*;

import main.VoixAleatoire;

import org.junit.Test;

/**
 * Teste la classe VoixAleatoireTest.
 * @author julien
 * @see VoixAleatoireTest
 *
 */
public class VoixAleatoireTest {
	
	VoixAleatoire voix = new VoixAleatoire(1, 4);
	
	@Test
	public void testToString() {
		String test = "Voix du votant " + 1 + " :";
		for(int i = 0; i < 4; i++) {
			test += " " + (i+1) + " rang " + voix.retournerRangAlternative(i) + " ;"; 
		}
		assertEquals(test, voix.toString());
	}

}