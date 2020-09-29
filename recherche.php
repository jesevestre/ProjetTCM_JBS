<?php require('tete.php'); ?>
<?php include ('BDDIntersection.php'); ?>

<div id="contenu">
	
<?php if (empty($_POST['rechercher'])){ ?>
<form method="post" action="">
	<table class="tableCenter">
		<tr>
			<td><label for="label"><?php echo "Choisissez un prénom"; ?>: </label></td>
			<td><input type="text"  class="form-control" name="label" list="label" 
			maxlength="50" size="100%" required autocomplete="off" placeholder="Prénom"></td>
			<datalist id="label" class="form-control">
				
			<?php
			$sql = $pdo->query("SELECT label FROM ref_prenoms ORDER BY label ASC");

				if ($sql){
					echo "";
				}
				 else {
					echo "Echec de la création de la table";
				}

			if (isset($_POST['rechercher'])){
				$label = $_POST["label"];
			}
			while ($resultat = $sql->fetch()){
				$label = $resultat['label'];

			?>
				<option name="label" value="<?php echo $label; ?>"><?php echo $label; ?></option> 
			<?php } ?>
			
				</datalist>
			</tr>
		</table>
	<input type="submit" name="rechercher" class="form-control submit" value="<?php echo "Rechercher"; ?>" />
</form>

<?php
}
if (isset($_POST['rechercher'])){
	$label2 = $_POST["label"];
?>

<form method="post" action="recherche.php">
	<input type="submit" name="" class="form-control submit" value="<?php echo "Retour à la recherche"; ?>" />
</form>
	<br/ >
	<br/ >
	<br/ >
	<br/ >
	
<?php
	$_GET['page'] = 1;
	$videosParPage = 20;
	$videoTotalesReq = $pdo->query("SELECT id, label FROM ref_prenoms 
	WHERE label LIKE '$label2%'");
	$videosTotales = $videoTotalesReq->rowCount();
	$pagesTotales = ceil($videosTotales/$videosParPage);

	if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0){
		$_GET['page'] = intval($_GET['page']);
		$pageCourante = $_GET['page'];
	} else {
		$pageCourante = 1;
	}

	$depart = ($pageCourante-1)*$videosParPage;
	
	$sql = $pdo->query("SELECT id, label, type, genre, origin FROM ref_prenoms 
	WHERE label LIKE '$label2%' ORDER BY label ASC LIMIT ".$depart.','.$videosParPage);
	

	
	while ($resultat = $sql->fetch()){		
		
		if ($resultat['type']=='1'){
			$type='masculin';
		}
		else if ($resultat['type']=='2'){
			$type='féminin';
		}
		else{
			$type='anbigü';
		}
		
		if ($resultat['genre']=='1'){
			$genre='masculin';
		}
		else{
			$genre='féminin';
		}
?>

<form method="post" action="">
		<table class="tableCenter">
			<tr <?php if ($type=='féminin'){ ?> style="background-color:#F8B3BC;" <?php 
					}else if ($type=='masculin'){ ?>style="background-color:#26C4EC;" <?php } ?> >
				<!--<td><?php echo $resultat['id'];?></td>-->
				<td width="250px"><span class="TexteRouge">Prénom: </span><?php echo $resultat['label'];?></td>
				<td width="150px"><span class="TexteRouge">Type: </span><?php echo $type;?></td>
				<td width="250px"><span class="TexteRouge">Genre prioritaire: </span><?php echo $genre;?></td>
				<td width="300px"><span class="TexteRouge">Origine: </span><?php echo $resultat['origin'];?></td>
			</tr>
		</table>
	</form>
<?php
	}
	for ($i=1;$i<=$pagesTotales;$i++){
		if ($i == $pageCourante){
			echo $i.' ';
		}else {
		echo '<a href="recherche.php?page='.$i.'">'.$i.'</a> ';
		}
	}
}
?>
</div>	
	
<?php require('pied.php'); ?>