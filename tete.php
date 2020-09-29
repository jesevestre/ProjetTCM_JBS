<!-- Site internet en HTML5 -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
	<head>
		<title>Exercice PHP / MYSQL - JBS</title>

		<link rel="stylesheet" href="style.css" />
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style_impression.css" media="print" />
		<!--<link rel="icon" type="image/png" href="dbdtc_images/logoIcone2.png" />-->
		
		<script>
			var t;
			t = 1;
			function changerTaille(modif) {
				t = t + modif;
				document.getElementsByTagName("body")[0].style.fontSize = t + "em";
			}

			var i;
			i = 30;
			function movePage(change) {
				i = i + change;
				document.getElementById("contenu").style.width = "75%";
				document.getElementById("contenu").style.marginLeft = i + "%";
			}
		</script>

	<body>
		<div id="entete">
		<a id="hautdepage"></a> 
			<p><a href="index.php"><img class="logo" src="images/logo_TCM.png" alt="Bouton pour revenir à l'acceil"></a></p>	

		<div class="menu">
		<nav>	
			<label for="menu-mobile" class="menu-mobile">Menu</label>
			<input type="checkbox" id="menu-mobile" role="button">
			<ul>
				<li class="menu-Accessibilite"><a href="index.php" accesskey="1">Accueil</a></li>
				
				<li class="menu-UN"><a href="import.php" accesskey="2">import.php</a></li>
				
				<li class="menu-Accessibilite"><a href="recherche.php" accesskey="3">recherche.php</a></li>
				
				<li class="menu-UN"><a href="traitement.php" accesskey="4">traitement.php</a></li>
				
				<li class="menu-Accessibilite"><a href="#" accesskey="5">Options</a>
					<ul class="submenu">
						<li><a href="#" onClick="changerTaille(0.1); return false;" accesskey="6">Agrandir texte</a></li>
						<li><a href="#" onClick="changerTaille(-0.1); return false;" accesskey="7">Réduire texte</a></li>
						<li><a href="#" onClick="movePage(10); return false;">Affichage à droite</a></li>
						<li><a href="#" onClick="movePage(-10); return false;">Affichage à gauche</a></li>
						<li><a href="dbdtc_Outils_accessiblite.php" accesskey="8">Outils d'accessibilité</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		</div>
	</div>
