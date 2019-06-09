<?php
//regroupe toutes les fonctions permettant de trouver et d'afficher un ou des utilisateurs
function afficherUnUtilisateurSelonMail($mail){
	$arrayListeUtilisateurs = chargerTousLesUtilisateur();
	foreach ($arrayListeUtilisateurs as $utilisateur) {
		if(key($arrayListeUtilisateurs) == $mail){
			afficherUtilisateur($utilisateur, key($arrayListeUtilisateurs));
		}
	}	
}

function afficherUtilisateur($mdp, $mail){
	
	print("<table>");
	print("<tr><td><strong>Mail utilisateur : </strong></td><td>" . $mail ."</td></tr><br>");
	print("<tr><td><strong>Mot de passe chiffré : </strong></td><td>" . $mdp ."</td></tr><br>");
	print("</table>");
	print("<br><br>");
}

function chargerTousLesUtilisateur(){
	$userListJson = file_get_contents('http://groups.cowaboo.net/2018/group08/public/api/users');//GET REST sur l'api de cowaboo où se trouve les données
	$decodedText = html_entity_decode($userListJson);
	$jsonFile_decoded = json_decode($decodedText, true);
	//var_dump($jsonFile_decoded);
	$arrayListeUtilisateurs = $jsonFile_decoded['user_list']['list'];
	return $arrayListeUtilisateurs;
}


function afficherTousLesUtilisateurs(){
	$arrayListeUtilisateurs = chargerTousLesUtilisateur();
	foreach ($arrayListeUtilisateurs as $utilisateur) {
		afficherUtilisateur($utilisateur, key($arrayListeUtilisateurs));
	}
}

?>
