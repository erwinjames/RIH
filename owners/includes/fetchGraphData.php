<?php
include('config.php');
if(isset($_POST["year"])){
$year = $_POST["year"];
$sqlG = "SELECT * from tblbooking where FromDAte='$year' AND status=2 ORDER BY BookingId ASC";
$queryG = $dbh -> prepare($sqlG);
$queryG->execute();
$resultsG=$queryG->fetchAll(PDO::FETCH_OBJ);
foreach($resultsG as $resultG)
{  
    $month = date('m',strtotime($resultG->FromDAte));
    $year = date('Y',strtotime($resultG->FromDAte));
    $year = date('d',strtotime($resultG->FromDAte));
    $totalProfit = $resultG->pax + $resultG->pkgOffer_value;
    $output[] = array(
        'month' => $month,
        'profit' =>floatval($totalProfit)
    );
}
echo json_encode($output);
}

?>