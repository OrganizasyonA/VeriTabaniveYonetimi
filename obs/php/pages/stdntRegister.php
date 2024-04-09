<?php 
include dir(__FILE__).'../classes/classes.php';
if(!empty($_POST)){

    $login = new login();

    if($login->getinf(array($_POST['stdntName'],$_POST['stdntSurname'],$_POST['tcNmbr'],$_POST['gndr'],$_POST['mthrName'],$_POST['fthrName'],$_POST['brthDate'],$_POST['sctn'],$_POST['adress']))){
        echo "kayıt başarılı bir şekilde oluşturuldu";
    }else{
        echo "hata";
    }
}

?>    
