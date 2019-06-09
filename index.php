<?php
session_start();
echo '<html>';
require("header.php");
echo '<body>';
?>


<h1>Bienvenue sur le site prototype <font style="color: red;">Digital Health Literacy</font></h1> 
<h3><em>publication d'articles de santé en ligne</em></h3>
<br>



<hr/>
<br>

<table><tr><td>
<h2>Afficher tous les articles</h2>
<form method="POST" action="index.php">
<input  type="submit" name="afficherTousLesArticles" value="Afficher tous les articles">
</form>
</td>

<td>
<h2>Entrez le numéro d'un article à visionner</h2>
<form method="POST" action="index.php">
Numéro de l'article :
<input type="text" name="noArticle">
<input  type="submit" name="afficherUnArticle" value="Afficher article">
</form>
</td>

<td>
<h2>Afficher tous les utilisateurs</h2>
<form method="POST" action="index.php">
<input  type="submit" name="afficherTousLesUtilisateurs" value="Afficher tous les utilisateurs">
</form>
</td>

<td>
<h2>Entrez le mail d'un utilisateur à visionner</h2>
<form method="POST" action="index.php">
Adresse mail :
<input type="text" name="mail">
<input  type="submit" name="afficherUnUtilisateur" value="Afficher utilisateur">
</form>
</td>

</tr></table>          


<?php

include("fonctionsArticles.php");
include("fonctionsUtilisateurs.php");

if(isset($_POST['afficherTousLesArticles'])){
		AfficherTousLesArticles();
}

if(isset($_POST['afficherUnArticle'])){
		afficherUnArticleSelonNo($_POST['noArticle']);
}

if(isset($_POST['afficherTousLesUtilisateurs'])){
		afficherTousLesUtilisateurs();
}

if(isset($_POST['afficherUnUtilisateur'])){
		afficherUnUtilisateurSelonMail($_POST['mail']);
}



//require("./footer.php");
echo '</body></html>';
?>