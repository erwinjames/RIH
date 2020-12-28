<?php
include('config.php');
if(isset($_POST["year"])){
$year = $_POST["year"];
$sqlG = "SELECT * from tblpayments where date='$year' ORDER BY bookingId ASC";
$queryG = $dbh -> prepare($sqlG);
$queryG->execute();
$resultsG=$queryG->fetchAll(PDO::FETCH_OBJ);
foreach($resultsG as $resultG)
{  
    $month = date('m',strtotime($resultG->date));
    $year = date('Y',strtotime($resultG->date));
    $year = date('d',strtotime($resultG->date));
    $totalProfit = $resultG->DownPay_amount + $resultG->statusRecived;
    $output[] = array(
        'month' => $month,
        'profit' =>floatval($totalProfit)
    );
}
echo json_encode($output);
}
?>