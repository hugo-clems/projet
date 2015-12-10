<?php
	function afficherRecherche($rezRech) {
		if ($rezRech == -1) {
			echo '<div>&nbsp&nbsp&nbspAucun résultat.</div>';
		} else {
			for ($i=0; $i < sizeof($rezRech); $i++) {

			   echo '
			   <a id="lien_contrat" href="contrat.php?c='.$rezRech[$i][0].'"><div class="contrat">
				 <header>
				  '.$rezRech[$i][3].'
				  </header>
				  <p id="theme"><b>Thème :</b> '.$rezRech[$i][4].'</p>
				  <p id="pers"><b>Proposeur :</b> '.$rezRech[$i][2].' '.$rezRech[$i][1].'</p>
				  <p id="comp"><b>Requis :</b> '.$rezRech[$i][6].'</p>
				  <p id="remu"><b>Rémunération :</b> '.number_format($rezRech[$i][5], 2, ',', ' ').' €</p>
			  </div></a>';
			}
		}
	}
?>