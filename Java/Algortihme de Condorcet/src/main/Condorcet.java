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
 * @see test.CondorcetTest
 */
public class Condorcet {
	
	/**
	 * Le nombre d'alternatives du vote. Ce nombre n'est pas modifiable.
	 */
	private int nbAlternatives;
	
	/**
	 * Toutes les voix d'une élection. Les voix s'ajoutent une à une dans cette liste chainée.<br>
	 * @see Voix
	 * @see Condorcet#ajouterUneVoix(Voix)
	 */
	private LinkedList<Voix> toutesLesVoix;
	
	/**
	 * <b>Compte les résultats des matchs entre toutes les alternatives.</b><br>
	 * compteurMatchs[j][i] contient le nombre de fois que i est mieux classée que j.<br>
	 * Ce compteur est modifié lors du parcours de toutes les voix.<br>
	 * @see Condorcet#parcourirLesVoix()
	 */
	private int[][] compteurMatchs;
	
	/**
	 * Contient l'id du vainqueur de Condorcet. Ce nombre est modifié lorsque le vainqueur est trouvé.<br>
	 * @see Condorcet#elireLeVainqueur()
	 */
	private int vainqueur;
	
	/**
	 * Contient les victoires des alternatives sur les autres. <br>
	 * @see Graphe
	 */
	public Graphe grapheAlternatives;
	
	/**
	 * <b>Constructeur Condorcet</b>
	 * <p>A la construction d'un objet Condorcet, le nombre d'alternatives est fixé.<br>
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
	public void ajouterUneVoix(Voix voix) {
		this.toutesLesVoix.add(voix);
	}
	
	/**
	 * <b>Remplit le tableau compteur</b> en regardant pour chaque voix comment sont classées les alternatives pour matcher les candidats. <br>
	 * La méthode parcourt les voix. <br>
	 * Elle parcourt pour chaque voix le tableau classement en <b>comparant pour chaque alternative i son rang par rapport aux alternatives j</b> avec j > i. <br>
	 * Lorsque que le <b>rang de i est supérieur au rang de j elle incrémente compteur[j][i] de 1</b>. <br>
	 * Si le rang de i ou de j est égal à 0, elle ne fait rien car cela signifie que l'<b>alternative de rang 0 n'a pas été classée par le votant</b>.<br>
	 * @see Condorcet#toutesLesVoix
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#compteurMatchs
	 * @see Voix#retournerRangAlternative(int)
	 */
	private void parcourirLesVoix() {
		for (Voix cur: toutesLesVoix) {
			for (int i = 0; i < nbAlternatives - 1; i++) {
				if (cur.retournerRangAlternative(i) != 0) {
					for (int j = i+1; j < nbAlternatives; j++) {
						if (cur.retournerRangAlternative(j) != 0) {
							if (cur.retournerRangAlternative(i) > cur.retournerRangAlternative(j)) compteurMatchs[j][i] += 1;
							else compteurMatchs[i][j] +=1;
						}
					}
				}
			}
		}
	}

	/**
	 * Renvoie le tableau compteur<br>
	 * @return renvoie le tableau compteur sous la forme d'un tableau d'entiers à deux dimensions.
	 * @see test.CondorcetTest#testRetournerCompteur()
	 */
	public int[][] retournerCompteur() {
		return compteurMatchs;
	}
	
	/**
	 * Renvoie un nombre aléatoire.<br>
	 * @param nbMinimum
	 * 			Borne inférieure du nombre à renvoyer.
	 * @param nbMaximum
	 * 			Borne supérieure du nombre.
	 * @return Renvoie le nombre aléatoire sous forme d'entier.
	 * @see test.CondorcetTest#testDonnerNbAleatoire()
	 */
	public static int donnerNbAleatoire(int nbMinimum, int nbMaximum) {
		return nbMinimum + (int)(Math.random() * (nbMaximum - nbMinimum + 1));
	}
	
	/**
	 * Dans le cas où un cycle est présent dans le graphe des victoires, <b>le vainqueur est choisi selon une probabilité.</b>
	 * La probabilité pour une alternative i d'être choisie est le nombre de matchs qu'elle a gagné sur le nombre de matchs gagnés totaux.
	 * La méthode choisit un nombre aléatoire entre 1 et le nombre de matchs gagnés au total.
	 * ELle somme le nombre de matchs gagnés pour chaque alternative jusqu'à arriver au nombre aléatoire ce qui désigne l'alternative gagnante.<br>
	 * @param nbMatchsGagnes
	 * 					
	 */
	private void designerVainqueurRandomise(int[] nbMatchsGagnes) {
		int matchsParcourus = 0;
		boolean vainqueurTrouve = false;
		int nbAleatoire = donnerNbAleatoire(1, nbMatchsGagnes[nbAlternatives]);
		for(int i = 0; i < nbAlternatives && !vainqueurTrouve; i++) {
			matchsParcourus += nbMatchsGagnes[i];
			if (matchsParcourus <= nbAleatoire){
				vainqueur = i;
				vainqueurTrouve = false;
			}
		}
	}

	/**
	 * <b>Renvoie le vainqueur de l'élection représenté par l'instance de Condorcet.</b>
	 * La méthode regarde d'abord s'il y a un vainqueur de Condorcet et si oui le retourne.<br>
	 * Sinon elle teste s'il y a un cycle dans le graphe des matchs, si oui le vainqueur est désigné par {@link Condorcet#designerVainqueurRandomise(int[])} et sinon par
	 * {@link VictoireParMatchs}.<br>
	 * @return <b>Renvoie le vainqueur de l'élection sous la forme d'un entier.</b> Le +1 est dû au fait que les alternatives sont classées de 1 à nbAlternatives.
	 * @see VictoireParMatchs
	 * @see Graphe#retournerVainqueurGraphe()
	 * @see Condorcet#designerVainqueurRandomise(int[])
	 * @see test.CondorcetTest#testElireLeVainqueur()
	 */
	public int elireLeVainqueur() {
		this.parcourirLesVoix();
		grapheAlternatives = new Graphe(nbAlternatives, compteurMatchs);
		vainqueur = grapheAlternatives.retournerVainqueurGraphe();
		if (vainqueur == -1) { //Si il n'y a pas de vainqueur de Condorcet
			int[] nbMatchsGagnes = grapheAlternatives.compterNbMatchsGagnes();
			if (grapheAlternatives.contientCycle()) designerVainqueurRandomise(nbMatchsGagnes);
			else { // S'il n'y a pas de cycle.
				VictoireParMatchs vpm = new VictoireParMatchs(nbMatchsGagnes);
				vainqueur = vpm.retournerVainqueur();
			}
		}
		return vainqueur + 1;
	}
	
	/**
	 * Comportement d'un objet Condorcet sous la forme d'une chaine de caractères.<br>
	 * Retourne le vainqueur de l'élection et le nombre d'alternatives.<br>
	 * @return Le vainqueur de l'élection et le nombre d'alternatives, sous la forme d'une chaine de caractères.
	 * @see Condorcet
	 * @see Condorcet#nbAlternatives
	 * @see Condorcet#vainqueur
	 * @see test.CondorcetTest#testToString()
	 */
	public String toString() {
		return "Election avec " + Integer.toString(nbAlternatives) + " alternatives et le gagnant est " + Integer.toString(vainqueur + 1);
	}
	
}
