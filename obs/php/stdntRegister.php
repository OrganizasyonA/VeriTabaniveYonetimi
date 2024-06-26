<html>
<head>
<meta charset="UTF-8">
<title>Obs Ogrenci Kayit</title>

	<!-- Bootstrap -->
    <link href="../css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css">
	
</head>

<body class="bg-secondary">
	
	<nav class="navbar navbar-dark bg-dark align-content-center">
		<div class="navbar-brand">
			<img class="img" alt="" src="../images/profilePic.png" width="30" height="30"/>
			<label>
				<?php
					session_start();
					echo $_SESSION['userName'];
				?>
			</label>
		</div>
		
		<div class="navbar-brand text-center">
			<img class="img" src="../images/logo.png" alt="logo" width="30" heigth="30"/>
			<label>Ogrenci Kayit Sistemi</label>
		</div>
		
		<div>
			<a class="navbar-brand float-right" href="../loginPage.html">
				
				<img src="../images/logout.png" alt="" height="30" width="30"/>
			</a>
			<a class="navbar-brand float-right nav-link" href="admnPanel.php">
				<img src="../images/home.png" alt="" height="30" width="30">
			</a>
		</div>
	</nav>
	
	<div class="bg-secondary pt-5 pb-5">
	
		<div class="container d-flex justify-content-center ">
			<form method="post" action="pages/stdntRegister.php" class="form p-3 col-md-6 col-lg-5 col-xl-4">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" placeholder="Ismi" name="stdntName"/>
					</div>
					<div class="form-group col-md-6">
						<input type="text" class="form-control" placeholder="Soy Ismi" name="stdntSurname"/>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" max="11" min="11" placeholder="Tc Numarasi" name="tcNmbr"/>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group-prepend">
							<label class="input-group-text">Cinsiyet</label>
							<select class="custom-select" name="gndr">
								<option value="Diger" selected>Seciniz</option>
								<option value="Erkek">Erkek</option>
								<option value="Kadin">Kadin</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" placeholder="Anne Ismi" name="mthrName" class="form-control"/>
					</div>
					<div class="form-group col-md-6">
						<input type="text" placeholder="Baba Ismi" name="fthrName" class="form-control"/>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="input-group-append">
							<label class="input-group-text mr-6">Bolumu</label>
							<select class="custom-select" name="sctn">
								<option value="0" selected>Seciniz</option>
								<option value="1">Bilgisayar Programciligi</option>
								<option value="2">Makina</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="input-group-append">
							<label class="input-group-text mr-6">Dogum Tarihi</label>
							<input type="date" class="form-control" name="brthDate"/>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="input-group">
						<textarea class="form-control" placeholder="Acik adres" name="adress"></textarea>
					</div>
				</div>
				<div class="form-row pt-2">
					<div class="input-group col-md-6">
						<button type="reset" class="btn btn-danger">Formu Temizle</button>
					</div>
					<div class="input-group col-md-6">
						<button type="submit" class="btn btn-primary">Kayit Et</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../js/jquery-3.4.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap-4.4.1.js"></script>
</body>
</html>
