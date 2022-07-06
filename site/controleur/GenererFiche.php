<?php

    use Dompdf\Dompdf;

    use Dompdf\Options;

    require_once "../dompdf/autoload.inc.php";
    require_once "../controleur/connexion.php";

    if(isset($_POST['idIntervention'])){
        $id = $_POST['idIntervention'];
    }
    
    $sql = "SELECT * FROM intervention, technicien WHERE idIntervention = $id AND intervention.idTechnicien = technicien.idTechnicien";
    $db = new PDO('mysql:host=localhost;dbname=ap2eme', 'root', 'root');
    $query = $db->query($sql);
    $intervention = $query->fetchAll();

    //$requete = mysqli_query($mysqli,"SELECT * FROM intervention") or die("Error");

    ob_start();
    require_once "../vue/pdf-content.php";
    $html=ob_get_contents();
    ob_end_clean();
    
    
    
    $options = new Options();
    $options -> set('defaultFont', 'times');
    $options->set('isRemoteEnabled', TRUE);
    
    $dompdf = new Dompdf($options);

    $dompdf -> loadHtml($html);

    $dompdf->setPaper('A4','portrait');
    
    $dompdf -> render();

    $fichier = 'fiche_intervention.pdf';

    $dompdf -> stream($fichier);

?>