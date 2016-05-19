<div id="contenu">
      <h2>Selectionner un visiteur et un mois</h2>
      <h3>Visiteurs a selectionner </h3>
      <div class="corpsForm">
	  <form method="post" action="index.php?uc=validerFrais&action=selectionnerMois">
	  
	  <!-- Listes des noms des visiteurs --> 
	  <p>
      	<select name="nomVisiteur" id="nomVisiteur">
	  		<?php 
	  			foreach ($lesNomsVisiteurs as $Visiteur)
	  			{
	  				$nomVisiteur = $Visiteur['nom'] ;
	  				$prenomVisiteur = $Visiteur['prenom']
	  		?>
	  		<option value="<?php echo $nomVisiteur ?>"><?php echo $nomVisiteur ?></option>
	  		<?php 
	  			}
	  		if (isset($_SESSION['nomVisiteur'])){
	  		?>
	  		<option selected value="<?php echo $_SESSION['nomVisiteur'] ?>"><?php echo $_SESSION['nomVisiteur'] ?> </option>
	  		<?php
	  		}
	  		?>
	   </select>
	   
	    <!-- Liste des pr�noms des visiteurs --> 
	   <label for="prenomVisiteur">Nom et Prenom du visiteur :</label>
      	<select name="prenomVisiteur" id="prenomVisiteur">
      	    <?php 
	  			foreach ($lesNomsVisiteurs as $Visiteur)
	  			{
	  				$nomVisiteur = $Visiteur['nom'] ;
	  				$prenomVisiteur = $Visiteur['prenom']
	  		?>
	  			<option value="<?php echo $prenomVisiteur ?>"><?php echo $prenomVisiteur ?></option>
	  		<?php 
	  			}
	  			if (isset($_SESSION['prenomVisiteur'])){
	  		?>
	  		<option selected value="<?php echo $_SESSION['prenomVisiteur'] ?>"><?php echo $_SESSION['prenomVisiteur'] ?> </option>
			<?php
	  			}
	  		?>
	    </select> 
	  </p>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
      </form>
      <p>
      
      <!-- Liste des mois pour lesquels un visiteur a une fiche de frais --> 
	  <form method="post" action="index.php?uc=validerFrais&action=selectionnerMois">
        <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstMois">
            <?php
			foreach ($lesMois as $unMois)
			{
			    $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
            
        </select>
      </p>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
     </form>
    </div>
</div>


