package main;

import main.Condorcet;

/**
 * <p>Dans le cas où un cycle n'est pas présent dans le graphe des victoires, <b>le vainqueur est celui qui a gagné le plus de matchs.</b><br>
 * La Classe trouve ce vainqueur si il en existe un unique <b>sinon elle choisit uniformément parmis les alternatives qui ont gagné le plus de matchs.<br>.</b><br>
 * Elle est définie par:
 * <ul>
 * 	<li>Le vainqueur ou le vainqueur choisi.</li>
 * 	<li>Le nombre maximum de matchs gagnés par les alternatives.</li>
 * 	<li>Le nombre de matchs gagnés pour chaque alternative.</li>
 * 	<li>Le nombre de vainqueurs potentiels.</li>
 * 	<li>Le nombre d'alternatives.</li>
 * </ul>
 * </p><br>
 * @author julien
 *
 */
public class VictoireParMatchs {
	
	/**
	 * Entier représentant le vainqueur ou le vainqueur choisi. Non modifiable.
	 */
	private int vainqueur;
	
	/**
	 * Entier contenant le nombre maximum de match gagnés par les alternatives. Non modifiable.
	 */
	private int maxMatchsGagnes;
	
	/**
	 * Tableau d'entier contenant le nombre de matchs gagnés pour chaque alternatives. Non modifiable.
	 */
	private int[] nbMatchsGagnes;
	
	/**
	 * Entier contenant le nombre de vainqueurs potentiels. Non modifiable.
	 */
	private int nbVainqueurs;
	
	/**
	 * Entier contenant le nombre d'alternatives. Non modifiable.
	 */
	private int nbAlternatives;
	
	/**
	 * Constructeur de la Classe VictoireParMatchs.<br>
	 * @param nbMatchsGagnes
	 * 			Tableau d'entier contenant pour chaque alternatives le nombre de matchs gagnés.
	 * @see VictoireParMatchs#compterNbVainqueur()
	 * @see VictoireParMatchs#designerUnVainqueurParLoiUniforme(int[], int, int)
	 * @see Condorcet#retournerMaximumMatchsGagnes(int[])
	 */
	public VictoireParMatchs(int[] nbMatchsGagnes) {
		this.vainqueur = 0;
		this.maxMatchsGagnes = 0;
		this.nbMatchsGagnes = nbMatchsGagnes;
		this.nbAlternatives = nbMatchsGagnes.length - 1;
		trouverMaximumMatchsGagnes();
		compterNbVainqueur();
		if (nbVainqueurs > 1) {
			designerUnVainqueurParLoiUniforme();
		}
	}
	
	/**
	 * Calcul le nombre maximum de match qu'une alternative a gagné.<br>
	 * Renvoie ce nombre maximum.<br>
	 * @return le nombre maximum de match gagné sous la forme d'un entier.
	 */
	private void trouverMaximumMatchsGagnes() {
		for (int i = 0; i < nbAlternatives; i++) {
			if (maxMatchsGagnes < nbMatchsGagnes[i]) {
				maxMatchsGagnes = nbMatchsGagnes[i];
			}
		}
	}
	
	/**
	 * Loi de proba uniforme pour désigner le vainqueur parmis la liste des alternatives en tête (même nombre de matchs gagnés).<br>
	 * On parcourt le tableau nbMatchsGagnes pour trouver le vainqueur selectionne par un nombre aleatoire allant de 1 au nombre de vainqueurs.<br> 			
	 */
	private void designerUnVainqueurParLoiUniforme() {
		boolean vainqueurTrouve = false;
		int nbAleatoire = Condorcet.donnerNbAleatoire(1, nbVainqueurs);
		int nbVainqueursParcourus = 0;
		for (int i = 0; i < nbAlternatives && !vainqueurTrouve; i++) {
			if(maxMatchsGagnes == nbMatchsGagnes[i]) {
				nbVainqueursParcourus += 1;
				if (nbVainqueursParcourus == nbAleatoire) {
					vainqueur = i;
					vainqueurTrouve = true;
				}
			}
		}
	}
	
	/**
	 * Compte le nombre d'alternatives ayant gagné le plus de matchs. <br>
	 * @return le nombre d'alternatives ayant gagné le plus de match sous la forme d'un entier.
	 */
	private void compterNbVainqueur() {
		nbVainqueurs = 0;
		for (int i = 0; i < nbAlternatives; i ++) { // Compte le nombre de vainqueurs.
			if (maxMatchsGagnes == nbMatchsGagnes[i]){
				nbVainqueurs += 1;
				vainqueur = i; //Si il y a un seul vainqueur, cela permet de le récupérer directement.
			}
		}
	}
	
	/**
	 * Renvoie le vainqueur désigné par l'objet.
	 * @return le vainqueur sous la forme d'un entier.
	 */
	public int retournerVainqueur() {
		return vainqueur;
	}
}
