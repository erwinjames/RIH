<?php
$number1 = "09062419916";
$message1 = "This is Rameriz island Hopping conferming that your reservation is confirmed";
$apicode1="TR-ERWIN419916_IKT4L";
$passwd1="dx%4a!1(%3";
function itexmo($number,$message,$apicode,$passwd){
    $ch = curl_init();
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
    curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_POSTFIELDS, 
              http_build_query($itexmo));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return curl_exec ($ch);
    curl_close ($ch);
}

$result = itexmo($number1,$message1,$apicode1,$passwd1);
if ($result == ""){
echo "iTexMo: No response from server!!! ";	
}else if ($result == 0){
echo "Message Sent!";
}
else{	
echo "Error Num ". $result . " was encountered!";
}
?>