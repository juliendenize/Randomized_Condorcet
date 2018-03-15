package main;
import java.util.LinkedList;

/**
 * <b>La classe Condorcet représente une élection.</b>
 * <p>Elle est définie par:
 * <ul>
 * 	<li>Le nombre d'alternatives du vote.</li>
 * 	<li>Toutes les voix d'une élection.</li>
 * 	<li>Le compteur des matchs entre toutes les alternatives</li>
 * 	<li>Le gagnant de l'élection ou le "vainqueur de Condorcet"</li>
 * 	<li>Le graphe des victoires des alternatives</li>
 * </ul>
 * </p><br>
 * @author julien
 */
public class Condorcet {
	
	/**
	 * Le nombre d'alternatives du vote. Ce nombre n'est pas modifiable.
	 */
	private int nbAlternatives;
	
	/**
	 * Toutes les voix d'une élection. Les voix s'ajoutent une à une dans cette liste chainée.<br>
	 * @see Voix
	 * @see Condorcet#addVoix(Voix)
	 */
	private LinkedList<Voix> toutesLesVoix;
	
	/**
	 * <b>Compte les résultats des matchs entre toutes les alternatives.</b><br>
	 * compteurMatchs[j][i] contient le nombre de fois que i est mieux classée que j.<br>
	 * Ce compteur est modifié lors du parcours de toutes les voix.<br>
	 * @see Condorcet#parcoursVoix()
	 */
	private int[][] compteurMatchs;
	
	/**
	 * Contient l'id du vainqueur de Condorcet. Ce nombre est modifié lorsque le vainqueur est trouvé.<br>
	 * @see (à remplir lorsque la méthode pour trouver le vainqueur est présente)
	 */
	private int vainqueur;
	
	/**
	 * Contient les victoires des alternatives sur les autres. <br>
	 * @see Graphe
	 */
	Graphe grapheAlternatives;
	
	/**
	 * <b>Constructeur Condorcet</b>
	 * <p>A la construction d'un objet Condorcet, le nombre d'alternative est fixé.<br>
	 * compteurMatchs est initialisé par un tableau nul à deux dimensions de taille nbAlternatives au carré.<br>
	 * vainqueur est initialisé à zéro, le graphe à null et toutesLesVoix par une liste chainée vide.<br>
	 * @param nbAlternatives 
	 * 				Le nombre d'alternatives
	 * @see Condorcet
	 * @see Condorcet#compteurMatchs
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#toutesLesVoix
	 * @see Condorcet#vainqueur
	 */
	public Condorcet(int nbAlternatives) {
		this.nbAlternatives = nbAlternatives;
		this.compteurMatchs = new int[nbAlternatives][nbAlternatives];
		this.vainqueur = 0;
		this.toutesLesVoix = new LinkedList<Voix>();
		this.grapheAlternatives = null;
	}
	
	/**
	 * Ajoute une voix à toutesLesVoix.<br>
	 * @param voix 
	 * 			Une instance de Voix
	 * @see Voix
	 * @see Condorcet#toutesLesVoix
	 */
	public void addVoix(Voix voix) {
		this.toutesLesVoix.add(voix);
	}
	
	/**
	 * <b>Remplit le tableau compteur</b> en regardant pour chaque voix comment sont classées les alternatives pour matcher les candidats. <br>
	 * La méthode parcourt les voix. <br>
	 * Elle parcourt pour chaque voix le tableau classement en <b>comparant pour chaque alternative i son rang par rapport aux alternatives j</b> avec j > i. <br>
	 * Lorsque que le <b>rang de i est supérieur au rang de j elle incrémente compteur[j][i] de 1</b>. <br>
	 * Si le rang de i ou de j est égale à 0, elle ne fait rien car cela signifie que l'<b>alternative de rang 0 n'a pas été classée par le votant</b>.<br>
	 * @see Condorcet#toutesLesVoix
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#compteurMatchs
	 * @see Voix#rangAlternative(int)
	 */
	public void parcoursVoix() {
		for (Voix cur: toutesLesVoix) {
			for (int i = 0; i < nbAlternatives - 1; i++) {
				if (cur.rangAlternative(i) != 0) {
					for (int j = i+1; j < nbAlternatives; j++) {
						if (cur.rangAlternative(j) != 0) {
							if (cur.rangAlternative(i) > cur.rangAlternative(j)) compteurMatchs[j][i] += 1;
							else compteurMatchs[i][j] +=1;
						}
					}
				}
			}
		}
	}
	
	/**
	 * Lit le tableau compteurMatchs.<br>
	 * @see Condorcet#compteurMatchs
	 */
	public void lectureCompteur() {
		for (int i = 0; i < nbAlternatives; i++) {
			for (int j = 0; j < nbAlternatives; j++) {
				System.out.print(Integer.toString(compteurMatchs[i][j]) + " ");
			}
			System.out.print("\n");
		}
	}
	
	/**
	 * Renvoie le tableau compteur<br>
	 * @return renvoie le tableau compteur sous la forme d'un tableau d'entiers à deux dimensions.
	 */
	public int[][] renvoiCompteur() {
		return compteurMatchs;
	}
	
	/**
	 * Dans le cas où un cycle est présent dans le graphe des victoires, <b>le vainqueur est choisie selon une probabilité.</b>
	 * La probabilité pour une alternative i d'être choisie est le nombre de matchs qu'elle a gagné sur le nombre de matchs gagnés totaux.
	 * La méthode choisie un nombre aléatoire entre 1 et le nombre de matchs gagnés au total.
	 * ELle somme le nombre de match gagnés pour chaque alternative jusqu'à arriver au nombre aléatoire ce qui désigne l'alternative gagnante.<br>
	 * @param nbMatchsGagnes
	 * 					
	 */
	private void vainqueurRandomise(int[] nbMatchsGagnes) {
		int matchsParcourus = 0;
		boolean vainqueurTrouve = false;
		int nbAleatoire = 1 + (int)Math.random() * (nbMatchsGagnes[nbAlternatives]);
		for(int i = 0; i < nbAlternatives && !vainqueurTrouve; i++) {
			matchsParcourus += nbMatchsGagnes[i];
			if (matchsParcourus <= nbAleatoire){
				vainqueur = i;
				vainqueurTrouve = false;
			}
		}
	}
	
	/**
	 * Dans le cas où un cycle n'est pas présent dans le graphe des victoires, <b>le vainqueur est celui qui a gagné le plus de matchs.</b><br>
	 * La méthode trouve ce vainqueur si il en existe un unique sinon elle choisie uniformément parmis les alternatives qui ont gagné le plus de matchs.<br>
	 * @param nbMatchsGagnes
	 */
	private void vainqueurMatchs(int[] nbMatchsGagnes) {
		int indiceMax = 0;
		int maxMatchs = 0;
		int compteurVainqueurs = 0;
		for (int i = 0; i < nbAlternatives; i++) { // Calcul le nombre de matchs gagnés qu'ont les vainqueurs.
			if (maxMatchs < nbMatchsGagnes[i]) {
				maxMatchs = nbMatchsGagnes[i];
				indiceMax = i;
			}
		}
		for (int i = 0; i < nbAlternatives; i ++) { // Compte le nombre de vainqueurs.
			if (maxMatchs == nbMatchsGagnes[i]) compteurVainqueurs += 1;
		}
		if (compteurVainqueurs == 1) vainqueur = indiceMax; //Si il y a un vainqueur c'est le bon.
		else { // Loi de proba uniforme pour désigner le vainqueur parmis la liste de ceux en tête.
			boolean vainqueurTrouve = false;
			int nbAleatoire = 1 + (int)(Math.random() * compteurVainqueurs);
			compteurVainqueurs = 0;
			for (int i = 0; i < nbAlternatives && !vainqueurTrouve; i++) {
				if(maxMatchs == nbMatchsGagnes[i]) {
					compteurVainqueurs += 1;
					if (compteurVainqueurs == nbAleatoire) {
						vainqueur = i;
						vainqueurTrouve = true;
					}
				}
			}
		}
	}
	
	/**
	 * <b>Renvoie le vainqueur de l'élection représentant par l'instance de Condorcet.</b>
	 * La méthode regarde d'abord s'il y a un vainqueur de condorcet et si oui le retourne.<br>
	 * Sinon elle teste s'il y a un cycle dans le graphe des matchs, si oui le vainqueur est désigné par {@link Condorcet#vainqueurRandomise(int[])} et sinon par
	 * {@link Condorcet#vainqueurMatchs(int[])}.<br>
	 * @return <b>Renvoie le vainqueur de l'élection sous la forme d'un entier.</b> Le +1 est dû au fait que les alternatives sont classées de 1 à nbAlternatives.
	 */
	public int election() {
		parcoursVoix();
		grapheAlternatives = new Graphe(nbAlternatives, compteurMatchs);
		vainqueur = grapheAlternatives.vainqueurGraphe();
		if (vainqueur == -1) { //Si il n'y a pas de vainqueur de Condorcet
			int[] nbMatchsGagnes = grapheAlternatives.compteurMatchGagnés();
			if (grapheAlternatives.contientCycle()) vainqueurRandomise(nbMatchsGagnes);
			else vainqueurMatchs(nbMatchsGagnes);
		}
		return vainqueur + 1;
	}
	
	/**
	 * Comportement d'un objet Condorcet sous la forme d'une chaine de caractère.<br>
	 * Retourne le vainqueur de l'élection et le nombre d'alternatives.<br>
	 * @return Le vainqueur de l'élection et le nombre d'alternatives, sous la forme d'une chaine de caractères.
	 * @see Condorcet
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#vainqueur
	 */
	public String toString() {
		return "Election avec " + Integer.toString(nbAlternatives) + " alternatives et le gagnant est " + Integer.toString(vainqueur);
	}
	
}