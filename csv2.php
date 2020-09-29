<?php require('tete.php'); ?>

<div id="contenu">

<?php
$con=mysqli_connect("localhost","root","","a_traiter");
if($con){

	$file=$_FILES['file']['tmp_name'];
	$handle=fopen($file,"r");
	$i=0;
	
	while(($cont=fgetcsv($handle,1000,","))!==false){
		$table=rtrim($_FILES['csvfile']['id'],".csv");
		if($i==0){
			$id = $cont[0];
			$firstname = $cont[1];
			$lastname = $cont[2];
			$query="CREATE TABLE $table ($id INT(5), $firstname VARCHAR(50),
			$lastname VARCHAR(50));";
			echo $query,"<br />";
			mysqli_query($con,$query);
		} else {
			$query="INSERT INTO $table ($id, $firstname, $lastname) 
			VALUES('$cont[0]','$cont[1]','$cont[2]');";
			echo $query,"<br />";
		}
		$i++;
	}
} else{
	echo "Echec de la connexion";
}
?>

</div>	
	
<?php require('pied.php'); ?>