<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Obs Ogrenci Yoklama Bilgisi</title>

	<!-- Bootstrap -->
    <link href="../../css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css">
	
</head>

<body class="bg-secondary">

<?php

include("../classes/classes.php");

$OgrenciID = $_GET['OgrenciID']; 
$OgrenciBolumID = $_GET['OgrenciBolumID']; 

$lssnandstdnt = new database();

$GetStdntInf = $lssnandstdnt->getrows("SELECT * FROM ogrenci WHERE OgrenciID = ?",array($OgrenciID));
$lessonsrows = $lssnandstdnt->getrows("SELECT DersID, DersAdi FROM Dersler WHERE BolumID = ?",array($OgrenciBolumID));

// foreach ($lessonsrows as $lesson) {
//     echo $lesson->DersAdi ; 
// }
// BU KISMA NOTLAR EKLENECEK 
?>
	
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand nav-link" href="../../userProfile.html">
			<img class="img" alt="" src="../../images/profilePic.png" width="30" height="30"/>
			Kullanici
		</a>
		
		<div class="navbar-brand text-center">
			<img class="img" src="../../images/logo.png" alt="logo" width="30" heigth="30"/>
		</div>
		
		<div>
			<a class="navbar-brand float-right" href="../loginPage.html">
				
				<img src="../../images/logout.png" alt="" height="30" width="30"/>
			</a>
			<a class="navbar-brand float-right nav-link" href="../../staffPanel.html">
				<img src="../../images/home.png" alt="" height="30" width="30">
			</a>
		</div>
	</nav>

<div class="bg-secondary">
		<div class="container col-md-12 p-5">
			<form method="post">
				<table class="table table-dark bg-dark">
					<thead class="text-center">
						<tr>
							<th>
								<label>Ogrencinin Numarası</label>
							</th>
							<th>
								<label>Adı</label>
							</th>
							<th>
								<label>Soy Adı</label>
							</th>
							<th>
								<label>Bölümü İd</label>
							</th>
							<th>
								<label>Ders Secin</label>
							</th>
							<th>
								<label>Sinav Turu</label>
							</th>
							<th>
								<label>Notu</label>
							</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<?php 
							foreach ($GetStdntInf as $inf) {?>
							
							<td><?php echo $inf->OgrenciID ?></td>
							<td><?php echo $inf->Isim ?></td>
							<td><?php echo $inf->Soyisim ?></td>
							<td><?php echo $inf->BolumID ?></td>
							<?php }?>
							<td class="">
								<select name='lesson' class="">
									<?php 
									foreach ($lessonsrows as $lesson) {
										echo "<option value='".$lesson->DersID."'>".$lesson->DersAdi."</option>" ; 
									}
									?>
								</select>
							</td>
							<td class="">
								<select name='snvTuru' class="">
									<option value="Vize" selected>Vize</option>
									<option value="Final">Final</option>
									<option value="Odev">Odev</option>
								</select>
							</td>
							<td class="">
								<input type='text' name='grade' class="">
							</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="8">
								<input type='hidden' name='ogrenciID' value="<?php echo $OgrenciID ?>">
    							<input type='hidden' name='bolumID' value="<?php echo $OgrenciBolumID ?>">
								<input type='submit' value='Not Ekle' name="notekle" class="btn btn-primary float-right">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>

<?php 

if(isset($_POST['notekle'])){
    $ogrenciID = $_POST['ogrenciID'];
    $DersID = $_POST['lesson'];
	$snvTuru = $_POST['snvTuru'];
    $notu = $_POST['grade'];

    echo $ogrenciID.$DersID.$notu ; 

    $addgrade = new database();
	
	$checkgrade = $addgrade->getrow("INSERT INTO Ogrenci_Ders_Notlari (OgrenciID, DersID, $snvTuru) VALUES (?, ?, ?)",array($ogrenciID,$DersID,$notu));
	
	//bu kisma eski not varsa update komutu eklenecek

    if($checkgrade){
        echo "Not Eklenemedi ";
    }else{
        echo "Not başarılı Bir şekilde eklendi ";
    }
}

?>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.4.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>

</body>
</html>
