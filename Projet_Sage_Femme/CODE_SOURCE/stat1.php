<?php
//Connexion à la base de données

//L'utilisateur root

$userbd    = 'root';

//Pas de mot passe

$mdpbd     = '';

$connection = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', $userbd, $mdpbd);	

	//La liste des villes
	
	$ville = $_POST['donnee'];
	
	//Déclarer un tableau vide
	
	$nb=array();
	
	//Parcourir la liste des villes	
	
    for($i=0;$i<count($ville);$i++)
	{ 
		$requete='SELECT count(*) as x from cabinets where ville = "'.$ville[$i].'"' ;	
				
		foreach($connection->query($requete) as $row)
		{ 
			$nb[]=$row["x"];
							
		}
							
	}

/*               ********************************************************************************
				 *                                                                              *
				 *                                  HISTOGRAMME                                 *
				 *                                                                              *
				 ********************************************************************************
				 
*/

//Si on clique sur le button Hist --> on execute le code dedans
if(isset($_POST['sub']))
{
		
		//Inclure la bibliothéque jpgraph.php	
		
		require_once ('jpgraph/src/jpgraph.php');

		//Inclure la bibliothéque jpgraph_bar.php	
		
		require_once ('jpgraph/src/jpgraph_bar.php');

		// Create the graph. These two calls are always required
		
		$graph = new Graph(1000,500,'auto');

		$graph->SetScale("textlin");

		// set major and minor tick positions manually
		
		$graph->SetBox(false);
		
		//Couleur des axes
		
		$graph->ygrid->SetColor('black');

		$graph->ygrid->SetFill(false);
		
		$graph->xaxis->SetTickLabels($ville);

		$graph->yaxis->HideLine(false);

		$graph->yaxis->HideTicks(false,false);

		// Create the bar plots
		$b1plot = new BarPlot($nb);

		// ...and add it to the graPH
		$graph->Add($b1plot);

		$b1plot->SetColor("black");

		$b1plot->SetFillGradient("black","red",GRAD_LEFT_REFLECTION);
		
		$b1plot->SetWidth(50);
		
		//Le titre d'histogramme
		
		$graph->title->Set("NOMBRE DE CABINETS EN FONCTION DES VILLES ");

		// Display the graph
		$graph->Stroke();
							
}

/*               ********************************************************************************
				 *                                                                              *
				 *                                     COURBE                                   *
				 *                                                                              *
				 ********************************************************************************
				 
*/

//Si on clique sur le button courbe

if(isset($_POST['sub1']))
{
	// Inclure la bibliothéque jpgraph.php
	
	require_once ('jpgraph/src/jpgraph.php');
	
    // Inclure la bibliothéque jpgraph_line.php
	
	require_once ('jpgraph/src/jpgraph_line.php');

	// Setup the graph
	$graph = new Graph(1000,500,'auto');

	$graph->SetScale("textlin");

	$theme_class=new UniversalTheme;

	$graph->SetTheme($theme_class);

	$graph->img->SetAntiAliasing(false);

	$graph->title->Set('Nombre de Cabinets par ville');

	$graph->SetBox(false);

	$graph->img->SetAntiAliasing();

	$graph->yaxis->HideZeroLabel();

	$graph->yaxis->HideLine(false);

	$graph->yaxis->HideTicks(false,false);

	$graph->xgrid->Show();

	$graph->xgrid->SetLineStyle("solid");

	$graph->xaxis->SetTickLabels($ville);

	$graph->xgrid->SetColor('#E3E3E3');

	// Create the first line
	$p1 = new LinePlot($nb);

	$graph->Add($p1);

	$p1->SetColor("#6495ED");

	$graph->legend->SetFrameWeight(1);

	// Output line
	$graph->Stroke();
}


/*               ********************************************************************************
				 *                                                                              *
				 *                                     CAMEMBERT                                *
				 *                                                                              *
				 ********************************************************************************
				 
*/

//Si on clique sur le button Camembert

if(isset($_POST['sub2']))
{
	//Inclure la bibliothéque jpgraph.php
	
	require_once ('jpgraph/src/jpgraph.php');

	//Inclure la bibliothéque jpgraph_pie.php

	require_once ('jpgraph/src/jpgraph_pie.php');

	//Inclure la bibliothéque jpgraph_pie3d.php

	require_once ('jpgraph/src/jpgraph_pie3d.php');

	// Some data
	
	$graph = new PieGraph(1000,500);

	// Ajouter une ombre au conteneur
	$graph->SetShadow();

	// Donner un titre
	$graph->title->Set("Nombre de Cabinets par villes");

	// Quelle police et quel style pour le titre
	// Prototype: function SetFont($aFamily,$aStyle=FS_NORMAL,$aSize=10)
	// 1. famille
	// 2. style
	// 3. taille
	$graph->title->SetFont(FF_GEORGIA,FS_BOLD, 20);

	// Créer un camembert 
	$pie = new PiePlot3D($nb);

	// Quelle partie se détache du reste
	$pie->ExplodeSlice(2);

	// Spécifier des couleurs personnalisées... #FF0000 ok
	$pie->SetSliceColors(array('red', 'blue', 'green'));

	// Légendes qui accompagnent le graphique, ici chaque année avec sa couleur
	$pie->SetLegends($ville);
	// Position du graphique (0.5=centré)
	$pie->SetCenter(0.5,0.4);

	// Type de valeur 
	$pie->SetValueType(PIE_VALUE_ABS);

	// Personnalisation des étiquettes pour chaque partie
	$pie->value->SetFormat('%d Cabinets');

	// Personnaliser la police et couleur des étiquettes
	$pie->value->SetFont(FF_ARIAL,FS_NORMAL, 12);

	$pie->value->SetColor('black');

	// ajouter le graphique PIE3D au conteneur 
	$graph->Add($pie);

	// Provoquer l'affichage
	$graph->Stroke();

}

?>