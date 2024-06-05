<?php
session_start();

include'classes/classes.php';

if(!empty($_POST)){
	
	$database = new database();
	$query = "SELECT * FROM calisanlar WHERE staff_name = ? AND staff_pass = ?";
	$query2 = "SELECT * FROM ogrenci WHERE Isim = ? AND sifre = ?";
	
	$_SESSION['userName'] = $_POST['kulAd'];

	if($database->getrow($query,array($_POST['kulAd'],$_POST['kulSif']))){
		
		echo "giris basarili" ;
		header("Location: admnPanel.php");
		
	}
	else if($database->getrow($query2,array($_POST['kulAd'],$_POST['kulSif']))){
		
		$userName = $_POST['kulAd'];
		$userPass = $_POST['kulSif'];
		
		$idQuery = "SELECT tcNum FROM kullanici WHERE Isim = '$userName' AND Isim = '$userPass'";
		$idResult = mysqli_query($conn, $idQuery);//$conn ile db baglantisi ayarlanicak
		$id = mysqli_fetch_assoc($idResult)['tcNum'];
		$_SESSION['id'] = $level;
		
		echo "giris basarili" ;
		header("Location: stndntPanel.php");
	}
	else{
		echo "Kullanıcı Adı veya Şifre hatalı" ; 
	}
	
}

?>