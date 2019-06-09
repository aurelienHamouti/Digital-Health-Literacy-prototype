<?php
//regroupe toutes les fonctions permettant de trouver et d'afficher un ou des articles

function afficherUnArticleSelonNo($noArticle){
	$entries = chargerTousLesArticles();
	foreach ($entries as $article) {
		if($article["tags"] == $noArticle){
			afficherArticle($article);
		}
	}	
}

function afficherArticle($article){
	print("<table>");
	print("<tr><td><strong>Numéro d'article : </strong></td><td>" . $article["tags"]."</td></tr><br>");
	print("<tr><td><strong>Corps de l'article : </strong></td><td>" . $article["value"]."</td></tr><br>");
	print("<tr><td><strong><strong>Auteur de l'article : </strong></td><td>" . $article["author"]."</td></tr><br>");
	print("<tr><td><strong>Date de publication : </strong></td><td>" . $article["date"]."</td></tr><br>");
	//print("<tr><td><strong>previous : </strong></td><td>" . $article["previous"]."</td></tr><br>");
	//print("<tr><td><strong>conf : </strong></td><td>" . $article["conf"]."</td></tr><br>");
	print("</table>");
	print("<br><br>");
}

function chargerTousLesArticles(){
	$observatory = file_get_contents('http://groups.cowaboo.net/2018/group08/public/api/observatory?observatoryId=DHL');//GET REST sur l'api de cowaboo où se trouve les données, "catalogue" ou "test" -> rubriques alternatives à "DHL" 
	$decodedText = html_entity_decode($observatory);
	$jsonFile_decoded = json_decode($decodedText, true);
	//var_dump($jsonFile_decoded);
	$entries = $jsonFile_decoded['dictionary']['entries'];
	return $entries;
}

function AfficherTousLesArticles(){
	$entries = chargerTousLesArticles();
	//print_r($jsonFile_decoded['dictionary']['entries']['Qmd2NRmitzzwSrE2MDa61qWWz9SqoXY4Qxe7kaDJ2LdqF1']);
	foreach ($entries as $article) {
		afficherArticle($article);
	}
}

?>
