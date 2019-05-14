<?php

//
// ────────────────────────────────────────────────────────────────── I ──────────
//   :::::: S I G N   I N   M O D E L : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────
//

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include('connection.php');
			$user_id=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			$response = $query->fetchAll(PDO::FETCH_ASSOC);
			$user_id = $response[0]['id'];
			$user_name = $response[0]['username'];
			$user_email = $response[0]['email'];
			if(empty($response)){
				print "<script>alert(\"Acceso invalido.\");window.location='../signin';</script>";
			}else{
				session_start();
				$_SESSION["user_id"] = $user_id;
				$_SESSION["user_name"] = $user_name;
				$_SESSION["user_email"] = $user_email;
				print "<script>window.location='../auth';</script>";				
			}
		}
	}
} else {
	print "<script>window.location='../signin';</script>";
}

