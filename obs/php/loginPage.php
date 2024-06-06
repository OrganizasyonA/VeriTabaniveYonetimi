<?php
session_start();

include'classes/classes.php';

if(!empty($_POST)){
	
	$database = new database();
	$query = "SELECT * FROM calisanlar WHERE staff_name = ? AND staff_pass = ?";
	$query2 = "SELECT * FROM ogrenci WHERE Isim = ? AND sifre = ?";
	
	$_SESSION['userName'] = $_POST['kulAd'];
	$_SESSION['userPass'] = $_POST['kulSif'];

	if($database->getrow($query,array($_POST['kulAd'],$_POST['kulSif']))){
		
		echo "giris basarili" ;
		header("Location: admnPanel.php");
		
	}
	else if($database->getrow($query2,array($_POST['kulAd'],$_POST['kulSif']))){
		echo "giris basarili" ;
		header("Location: stndntPanel.php");
	}
	else{
		echo "Kullanıcı Adı veya Şifre hatalı" ; 
	}
	
}

?>