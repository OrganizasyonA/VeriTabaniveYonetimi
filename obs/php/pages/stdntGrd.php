<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Obs</title>

	<!-- Bootstrap -->
    <link href="../../css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css">
	
</head>

<body class="bg-secondary">
	
	<nav class="navbar navbar-dark bg-dark">
		<div class="navbar-brand">
			<img class="img" alt="" src="../../images/profilePic.png" width="30" height="30"/>
			<label>
				<?php
					echo $_SESSION['userName'];
				?>
			</label>
		</div>
		
		<div class="navbar-brand text-center">
			<img class="img" src="../../images/logo.png" alt="logo" width="30" heigth="30"/>
		</div>
		
		<div>
			<a class="navbar-brand float-right" href="../../loginPage.html">
				
				<img src="../../images/logout.png" alt="" height="30" width="30"/>
			</a>
			<a class="navbar-brand float-right nav-link" href="../stndntPanel.php">
				<img src="../../images/home.png" alt="" height="30" width="30">
			</a>
		</div>
	</nav>
	<div>
		<div class="container col-md-12 p-5">
			<form>
				<table class="table table-dark bg-dark">
					<thead class="text-center">
						<tr>
							<th>
								<label>Tc Numarasi</label>
							</th>
							<th>
								<label>Ders Id</label>
							</th>
							<th>
								<label>VizeNotu</label>
							</th>
							<th>
								<label>FinalNotu</label>
							</th>
							<th>
								<label>Notu</label>
							</th>
						</tr>
					</thead>
					<tbody>
					<?php
					include"../classes/classes.php";
					
					$stdntData = "SELECT * FROM kullanici WHERE id = '".$_SESSION['id']."'";
					$result = $conn->query($stdntData);
					
					$row = $result->fetch_assoc();?>
						<tr class="text-center">
							<td><?php echo $row['tcNum'] ?></td>
							<td><?php echo $row['DersID'] ?></td>
							<td><?php echo $row['VizeNotu'] ?></td>
							<td><?php echo $row['FinalNotu'] ?></td>
							<td><?php echo $row['Notu'] ?></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../../js/jquery-3.4.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap-4.4.1.js"></script>
</body>
</html>
