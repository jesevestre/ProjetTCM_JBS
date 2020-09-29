<?php require('tete.php'); ?>
<div id="contenu">

<?php
$csv = new csv();
if (isset($_POST['export'])){
	$csv->export();
}

class csv extends mysqli{
	private $state_csv = false;
	
	public function __construct(){
		parent::__construct("localhost", "root", "", "prenoms");
		if ($this->connect_error){
			echo "Échec de la connexion à la base de données : ". $this->connect_error;
		}
	}
	
	public function export (){
		$this->state_csv = false;
		$q = "SELECT t.label, t.type, t.genre, t.origin FROM ref_prenoms as t";
		$run = $this->query($q);
		if ($run->num_rows > 0){
			$fn = "csv_ref_prenoms_generes".".csv";
			$ref_prenoms = fopen("FichierGenere/". $fn, "w");
			while ($row = $run->fetch_array(MYSQLI_NUM)){
				if (fputcsv($ref_prenoms, $row)){
					$this->state_csv = true;
				}else{
					$this->state_csv = false;
				}
			}
			if ($this->state_csv){
				echo "Exportation réussie";
			}else{
				echo "Echec de l'exportation";
			}
			fclose($ref_prenoms);
		}else{
			echo "Aucune donnée disponible";
		}
	}
}
?>
</div>	
<?php require('pied.php'); ?>
