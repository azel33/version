<div id="contenu">
<table class="listeLegere">
  	   <caption>Descriptif des �l�ments hors forfait
       </caption>
             <tr>
                <th class="date">Date</th>
				<th class="libelle">Libell�</th>  
                <th class="montant">Montant</th>  
                <th class="action">&nbsp;</th>              
             </tr>
          
    <?php    
	    foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
		{
			$libelle = $unFraisHorsForfait['libelle'];
			$date = $unFraisHorsForfait['date'];
			$montant=$unFraisHorsForfait['montant'];
			$id = $unFraisHorsForfait['id'];
	?>		
            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td><a href="index.php?uc=validerFrais&action=actualiserFraisHorsForfait&idFrais=<?php echo $id ?>" 
				onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer</a></td>
             </tr>
	<?php		 
          
          }
	?>	  
                                          
    </table>
</div>
     