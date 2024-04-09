<?php

include("../classes/classes.php");

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

<div class="bg-secondary">
		<div class="container col-md-12 p-5">
			<form>
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
							
							</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($GetStdntInf as $inf) {?>
						<tr>
							<td><?php echo $inf->OgrenciID ?></td>
							<td><?php echo $inf->Isim ?></td>
							<td><?php echo $inf->Soyisim ?></td>
							<td><?php echo $inf->BolumID ?></td>
							<td class="float-right">
							
							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
<div>
<h2>Öğrenciye Not Ekle</h2>
<form method='post'>
    <input type='hidden' name='ogrenciID' value="<?php echo $OgrenciID ?>">
    <input type='hidden' name='bolumID' value="<?php echo $OgrenciBolumID ?>">
    <label for='ders'>Ders Seçin:</label>
    <select name='lesson'>
        <?php 
        foreach ($lessonsrows as $lesson) {
            echo "<option value='".$lesson->DersID."'>".$lesson->DersAdi."</option>" ; 
        }
        ?>
    </select>
   
    <label for='not'>Not:</label>
    <input type='text' name='grade'><br>
    <input type='submit' value='Not Ekle' name="notekle">
</form>

</div>

<?php 

if(isset($_POST['notekle'])){
    $ogrenciID = $_POST['ogrenciID'];
    $DersID = $_POST['lesson'];
    $notu = $_POST['grade'];


    echo $ogrenciID.$DersID.$notu ; 

    $addgrade = new database();

    $checkgrade = $addgrade->getrow("INSERT INTO Ogrenci_Ders_Notlari (OgrenciID, DersID, Notu) VALUES (?, ?, ?)",array($ogrenciID,$DersID,$notu));

    if($checkgrade){
        echo "Not Eklenemedi ";
    }else{
        echo "Not başarılı Bir şekilde eklendi ";
    }
}






?>


