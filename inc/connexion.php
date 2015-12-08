<?php
require "bd/bdd.php";

/**
 * Traitement du formulaire de connexion
 * contrôle les identifiants de l'utilisateur pour lui attribuer une session
 */
function connexion($email, $mdp) {
	$bdd = bdd();
		// encodage du mot de passe
	$mdp = md5($mdp);

	$email = strtolower($email);

		// connexion à la BD pour tester si l'utilisateur existe et que les données correspondent
	$sql = "SELECT COUNT(*) AS nb_users, user_id, user_nom, user_prenom, user_pseudo, user_etat FROM users WHERE user_email = '{$email}' AND user_password = '{$mdp}'";
	$req = $bdd->query($sql);
	$data = $req->fetch();
	if ($data['nb_users'] == 1) {
		$_SESSION = array (
			'nom' => strtoupper($data['user_nom']),
			'prenom' => ucfirst($data['user_prenom']),
			'pseudo' => $data['user_pseudo'],
			'id' => $data['user_id'],
			'actif' => $data['user_etat']
			);
		header("location:index.php");
		return "Connexion réussie, bienvenue ". $_SESSION['prenom']. " ".$_SESSION['nom'].". Si vous n'êtes pas redirigé automatiquement, veuillez cliquer <a href=\"index.php\">ici</a> pour poursuivre la navigation.";
	} else {
		return "<p id=\"message\">Le mot de passe ou l'adresse électronique sont incorrects.</p>";
	}
}
?>