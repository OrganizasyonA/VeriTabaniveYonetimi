<?php

include dirname(__FILE__).'/../classes/classes.php';

$OgrenciID = $_GET['OgrenciID'] ; 
$OgrenciBolumID = $_GET['OgrenciBolumID'] ;

$lssnandstdnt = new database();

$GetStdntInf = $lssnandstdnt->getrows("SELECT * FROM ogrenci WHERE OgrenciID = ?",array($OgrenciID));
$lessonsrows = $lssnandstdnt->getrows("SELECT DersID, DersAdi FROM Dersler WHERE BolumID = ?",array($OgrenciBolumID));

// foreach ($lessonsrows as $lesson) {
//     echo $lesson->DersAdi ; 
// }
// BU KISMA NOTLAR EKLENECEK 
?>
<html>
<head>
<meta charset="UTF-8">
<title>Obs Ogrenci Not Bilgisi</title>
	
	<!-- Bootstrap -->
    <link href="../../css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css">
	
</head>	
<body>
	
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="../../userProfile.html">
			<img class="img" alt="" src="../../images/profilePic.png" width="30" height="30"/>
			<label>Kullanici Ismi</label>
		</a>
		
		<div class="navbar-brand text-center">
			<img class="img" src="../../images/logo.png" alt="logo" width="30" heigth="30"/>
		</div>
		
		<div>
			<a class="navbar-brand float-right" href="../../loginPage.html">
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
								<label>Ders</label>
							</th>
							<th>
								<label>Sınav Türü</label>
							</th>
							<th>
								<label>Not Bilgisi</label>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php 
								foreach ($GetStdntInf as $inf) {?>
								
								<td><?php echo $inf->OgrenciID ?></td>
								<td><?php echo $inf->Isim ?></td>
								<td><?php echo $inf->Soyisim ?></td>
								
							<?php }?>
								
							<td class="form-group">
								<select name='lesson' class="form-control">
									<?php
									foreach ($lessonsrows as $lesson) {
										echo "<option value='".$lesson->DersID."'>".$lesson->DersAdi."</option>" ; 
									}
									?>
								</select>
							</td>
							<td>
								<select name='type' class="form-control">
									<?php
									foreach ($lessonsrows as $lesson) {
										echo "<option value='".$lesson->DersID."'>".$lesson->DersAdi."</option>" ; 
									}
									?>
								</select>
							</td>
							<td class="form-group">
								<input type='text' name='grade' class="form-control">
							</td>							
						</tr>
						<tr>
							<?php 
								foreach ($GetStdntInf as $inf) {?>
								
								<td><?php echo $inf->OgrenciID ?></td>
								<td><?php echo $inf->Isim ?></td>
								<td><?php echo $inf->Soyisim ?></td>
								
							<?php }?>
								
							<td class="form-group">
								<select name='lesson' class="form-control">
									<?php
									foreach ($lessonsrows as $lesson) {
										echo "<option value='".$lesson->DersID."'>".$lesson->DersAdi."</option>" ; 
									}
									?>
								</select>
							</td>
							<td>
								<select name='type' class="form-control">
									<?php
									foreach ($lessonsrows as $lesson) {
										echo "<option value='".$lesson->DersID."'>".$lesson->DersAdi."</option>" ; 
									}
									?>
								</select>
							</td>
							<td class="form-group">
								<input type='text' name='grade' class="form-control">
							</td>		
						</tr>
						<tr>
							<td colspan="6">
								<input type='submit' value='Not Ekle' name="notekle" class="btn btn-primary float-right rounded-3">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.4.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>


<?php 

if(isset($_POST['notekle'])){
    $ogrenciID = $_POST['ogrenciID'];
    $DersID = $_POST['lesson'];
    $notu = $_POST['grade'];


    echo $ogrenciID.$DersID.$notu; 

    $addgrade = new database();

    $checkgrade = $addgrade->getrow("INSERT INTO Ogrenci_Ders_Notlari (OgrenciID, DersID, Notu) VALUES (?, ?, ?)",array($ogrenciID,$DersID,$notu));

    if($checkgrade){
        echo "Not Eklenemedi ";
    }else{
        echo "Not başarılı Bir şekilde eklendi ";
    }
}






?>


