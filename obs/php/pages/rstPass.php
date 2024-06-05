<?php

include'../classes/classes.php';
	
	$userName=$_POST['kulAd'];
	$userId=$_POST['kulId'];
	$newPass=$_POST['userPass'];

	$sql = "UPDATE calisanlar SET staff_pass = '$newPass' WHERE staff_name = '$userName' AND staff_id = '$userId'";
	
	if($count == 1)
	{
		echo "guncelleme basarili yonlendiriliyorsunuz";
		header ""
	}
	else{
		echo "Hatali giris";
	}
?>