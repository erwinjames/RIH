<?php 
include("includes/config.php");
$pid=14;
$sql = "SELECT * from tblbooking where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_ASSOC);
$cnt=1;
$checkDates = array();
if($query->rowCount() > 0)
{
foreach($results as $result)
{
    $checkDates[] = $result['FromDate'];
    // $arraydata = implode(',',$checkDates);
    // echo $arraydata;
   
}

}else{
    echo "0 result";
// }
}
header('Content-Type: application/json');
echo json_encode($checkDates);
?>

