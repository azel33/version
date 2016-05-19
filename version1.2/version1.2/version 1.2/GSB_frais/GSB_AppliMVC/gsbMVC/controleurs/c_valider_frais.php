<?php
include("vues/v_sommaire_comptable.php");
$action = $_REQUEST['action'];
$idComptable = $_SESSION['idSalarie'];
	switch($action) {
	
		case 'selectionnerVisiteur' :
			unset($_SESSION['Mois']);
			$lesNomsVisiteurs =$pdo->getNomVisiteurs();
			include("vues/v_liste_visiteurs.php");
			break;
	
		// Selectionne le mois en fonction des fiches de frais disponibles d'un visiteur
		case 'selectionnerMois' :
			unset($_SESSION['Mois']);
			$lesNomsVisiteurs =$pdo->getNomVisiteurs();
			if (isset($_POST['nomVisiteur']) AND isset($_POST['prenomVisiteur'])){
				$idVisiteur = $pdo->getIdVisiteur($_POST['nomVisiteur'],$_POST['prenomVisiteur']);
				$_SESSION['nomVisiteur'] = $_POST['nomVisiteur'];
				$_SESSION['prenomVisiteur'] = $_POST['prenomVisiteur'];
				foreach ($idVisiteur as $unIdVisiteur){
					$_SESSION['idVisiteur'] = $unIdVisiteur['id'];
				}
			}
			$lesMois=$pdo->getLesMoisDisponibles($_SESSION['idVisiteur']);
			// Afin de sélectionner par défaut le dernier mois dans la zone de liste
			// on demande toutes les clés, et on prend la première,
			// les mois étant triés décroissants
			$lesCles = array_keys( $lesMois );
			$moisASelectionner = $lesCles[0];
			include("vues/v_liste_mois_visiteurs.php");
			// Récupération de(s) fiche(s) dispo pour un visiteur
			if (isset($_POST['lstMois'])) {
				$_SESSION['Mois']= $_POST['lstMois'];
			}
			break;
			
			// Actualise les frais au forfait selon les commandes faites par le comptable 
		case 'actualiserFraisForfait' :
			$lesNomsVisiteurs =$pdo->getNomVisiteurs();
			$lesMois=$pdo->getLesMoisDisponibles($_SESSION['idVisiteur']);
			$lesCles = array_keys( $lesMois );
			$moisASelectionner = $lesCles[0];
			include("vues/v_liste_mois_visiteurs.php");
			
			// Reçoit les valeurs mises à jours des frais forfaitisés
			$lesFrais = $_POST['lesFrais'];
			
			if (lesQteFraisValides($lesFrais)) {
				$pdo->majFraisForfait($_SESSION['idVisiteur'], $_SESSION['Mois'], $lesFrais);
				$msg = "La modification des frais au forfait a bien Ã©tÃ© prise en compte";
				ajouterMessage($msg);
				include("vues/v_message.php");
			
				} else {
					ajouterErreur("Les valeurs des frais doivent Ãªtre numÃ©riques");
					include("vues/v_erreurs.php");
				}
			
				break;
			
				// Un pour actualiser les frais hors forfait :
		case 'actualiserFraisHorsForfait' :
				// Le code
				break;
	
	
	
	}
	
	// Récupération de(s) fiche(s) dispo pour un visiteur
	if (isset($_SESSION['idVisiteur']) && isset($_SESSION['Mois'])) {
		$lesFraisForfait     = $pdo->getLesFraisForfait($_SESSION['idVisiteur'], $_SESSION['Mois']);
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idVisiteur'], $_SESSION['Mois']);
		include("vues/v_listeFraisForfaitComptable.php");
		include ("vues/v_listeFraisHorsForfaitComptable.php");
	}
?>