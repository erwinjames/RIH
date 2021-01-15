<?php
// Connection
$conn = mysqli_connect("localhost", 'root','', 'test');
$json = '';
if(isset($_GET['rq'])):
	switch($_GET['rq']):
		case 'new':
			$msg = $_POST['msg'];
			$myid = $_POST['mid'];
			$fid = $_POST['fid'];
			if(empty($msg)){
				//$json = array('status' => 0, 'msg'=> 'Enter your message!.');
			}else{
				$qur = mysqli_query($conn,'insert into msg set `to`="'.$fid.'", `from`="'.$myid.'", `msg`="'.$msg.'", `status`="1"');
				if($qur){
					$qurGet = mysqli_query($conn,"select * from msg where id='".mysqli_insert_id()."'");
					while($row = mysqli_fetch_array($qurGet)){
						$json = array('status' => 1, 'msg' => $row['msg'], 'lid' => mysqli_insert_id(), 'time' => $row['time']);
					}
				}else{
					$json = array('status' => 0, 'msg'=> 'Unable to process request.');
				}
			}
		break;
		case 'msg':
			$myid = $_POST['mid'];
			$fid = $_POST['fid'];
			$lid = $_POST['lid'];
			if(empty($myid)){

			}else{
				//print_r($_POST);
				$qur = mysqli_query("select * from msg where `to`='$myid' && `from`='$fid' && `status`=1");
				if(mysqli_num_rows($qur,$conn) > 0){
					$json = array('status' => 1);
				}else{
					$json = array('status' => 0);
				}
			}
		break;
		case 'NewMsg':
			$myid = $_POST['mid'];
			$fid = $_POST['fid'];

			$qur = mysqli_query($conn,"select * from msg where `to`='$myid' && `from`='$fid' && `status`=1 order by id desc limit 1");
			while($rw = mysqli_fetch_array($qur)){
				$json = array('status' => 1, 'msg' => '<div>'.$rw['msg'].'</div>', 'lid' => $rw['id'], 'time'=> $rw['time']);
			}
			// update status
			$up = mysqli_query($conn,"UPDATE `msg` SET  `status` = '0' WHERE `to`='$myid' && `from`='$fid'");
		break;
	endswitch;
endif;

@mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($json);
?>
	