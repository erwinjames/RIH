<?php

//fetch_user.php

include('config.php');

session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '".$_SESSION['user_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();


foreach($result as $row)
{
 $output .= '
 <span class="chat_msg_item chat_msg_item_user"></span>
 ';
}


echo $output;

?>
