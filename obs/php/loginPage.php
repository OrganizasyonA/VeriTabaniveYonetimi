<?php

include'classes/classes.php';

session_start();

if(!empty($_POST)){
	
	$database = new database();
	$query = "SELECT * FROM calisanlar WHERE staff_name = ? AND staff_pass = ?";
	
	$_SESSION['userName'] = $_POST['kulAd'];

	if($database->getrow($query,array($_POST['kulAd'],$_POST['kulSif']))){
		echo "giris basarili" ;
		header("Location: admnPanel.php");
	}
	else{
		echo "Kullanıcı Adı veya Şifre hatalı" ; 
	}
	
}

?>