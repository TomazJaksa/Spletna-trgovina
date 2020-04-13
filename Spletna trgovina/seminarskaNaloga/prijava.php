<?php

	//Začetek seje. To pomeni, da se spremenljivke, ki smo jih shranili v $_SESSION prenesejo tudi na druge strani (tam kjer vključimo session_start()).
	session_start();

	//Če je trenutni uporabnik določen. Torej je bilo v obrazec vpisano pravilno prijavno ime, naj se to shrani v $trenutniUporabnik

	if(isset($_SESSION['trenutniUporabnik'])){
		$trenutniUporabnik=$_SESSION['trenutniUporabnik'];
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<!-- NASLOV V ZAVIHKU -->
		<title>Inter Diskont</title>
		<!-- UPORABA ŠUMNIKOV -->
		<meta charset="utf-8"/>
		<!-- CSS DATOTEKA -->
		<link  rel="stylesheet" type="text/css" href="index.css"/>
		<!-- DODAJANJE GOOGLE FONTA -->
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		<!-- DODAJANJE IKONE V ZAVIHKU-->
		<link rel="SHORTCUT ICON" href="https://cdn4.iconfinder.com/data/icons/harwdware-tools-v2/512/box_case_toolbox_tools-128.png" type="image/x-icon" />
		
	</head>
	
	<body id="telo">
			<div id="glava">
				<!--Prikaz "INTERDISKONT napisa, ki se premika od desne proti levi"-->
				<div id = "logo">
					<marquee scrollamount="10"
						direction="left"
						behavior="slide">
			
						<img src="https://images.cdn-cnj.si/sellers/Interdiskont.png" />
					</marquee>
					
				</div>
			</div>
			<div id="rumenaCrta"></div>
			<div id="izbrana">
				<div id="navigacija">
				<!--Tukaj ustva-->	
					<?php 
					if(isset($trenutniUporabnik)){
							echo "
							  <div id = 'kontakt'><a href='kontakt.php'>KONTAKT</a></div>
							  <div id = 'oPodjetju'><a href='oPodjetju.php'>O PODJETJU</a></div>
							  <div id='artikli'><a href='artikli.php'>ARTIKLI</a></div>";
						      ECHO "<h1>PRIJAVA</h1>";
					}else{
						echo "<div id = 'vstopnaStran'><a href='index.php'>VSTOPNA STRAN</a></div>
							  <div id = 'kontakt'><a href='kontakt.php'>KONTAKT</a></div>
							  <div id = 'oPodjetju'><a href='oPodjetju.php'>O PODJETJU</a></div>";
							  ECHO "<h1>PRIJAVA</h1>";
					}
					
					?>
					

				</div>
			</div>

			<!--TUKAJ SI IMEL OBRAZEC-->

			<?php
				// PODATKI, kateri so ključni, da se lahko sploh vzpostavi povezavo z bazo
					$host= "localhost";
					$port=3306;
					$socket="";
					$user="root";
					$password="";
					$dbname="mydb"; // vpišemo ime baze, ne datoteke (!)

					//Dejanska povezava
					$conn= mysqli_connect($host, $user, $password, $dbname, $port, $socket)
						or die("Could not connect to database server".mysqli_connect_error()); //Najprej se povežemo z bazo



				if(isset($_POST['submit'])){

					$uporabniskoIme = $_POST["uporabniskoIme"];
					$geslo = $_POST["geslo"];

					
					$uporabniskoImeInGesloVBazi = mysqli_query($conn,"select uporabniskoIme, geslo, spol, uporabnikid from uporabnik where uporabniskoIme='".$uporabniskoIme."' and geslo='".$geslo."'");

					$imeBaza = "";
					$gesloBaza = "";
					$spolBaza = "";
					$idBaza = "";


					while($vrstica = mysqli_fetch_array($uporabniskoImeInGesloVBazi)){
						$imeBaza = $vrstica['uporabniskoIme'];
						$gesloBaza = $vrstica['geslo'];
						$spolBaza = $vrstica['spol'];
						$idBaza = $vrstica['uporabnikid'];
					}
					//ČE SE PRIJAVLJA ADMINISTRATOR, ME ODPELJI NA ADMINISTRATORSKO STRAN
					if($uporabniskoIme==$imeBaza && $uporabniskoIme=="admin"){
						if($geslo == $gesloBaza){
							echo "<div id='prijavljen'><span id='prijavaNagovor1'>Pozdravljen administrator!</span>";
							echo "<br/><span>Kliknite na spodnji gumb za vstop v administracijo.</span><br/>";
							echo "<br/><br/><img src ='http://tny.im/4rx' width='200' height='200'/><br/><br/><div
							id='oglejProfil'><span><a id= 'pojdiNaProfil' href='admin.php'>Moja <br/>pisarna!</a></span>	
							</div></div><br/><br/>";
						}

					}//ČE SE PRIJAVLJA NAVADNI UPORABNIK, ME ODPELJI NA PROFILNO STRAN
					else if($uporabniskoIme==$imeBaza){
							if($geslo == $gesloBaza){
								if($spolBaza == "moski"){
									$_SESSION['trenutniUporabnik'] = $uporabniskoIme;
									$_SESSION['spolTrenutnegaUporabnika'] = $spolBaza;
									$_SESSION['idTrenutnegaUporabnika'] = $idBaza;

									echo "<div id='prijavljen'><span id='prijavaNagovor1'>Pozdravljen, ".$uporabniskoIme."!</span><br/>";

									echo"<br/><span>Kliknite na spodnji gumb za ogled profila.</span><br/>";
									echo "<br/><br/><img src='https://cdn0.iconfinder.com/data/icons/education-flat-icons-set/128/student-identity-badge-512.png' widht='200' height='200'/><br/><br/><div id='oglejProfil'><span><a id='pojdiNaProfil' href='profil.php'>Ogled Profila!</a></span></div></div><br/><br/>";
									
									
								}else{
									$_SESSION['trenutniUporabnik'] = $uporabniskoIme;
									$_SESSION['spolTrenutnegaUporabnika'] = $spolBaza;
									$_SESSION['idTrenutnegaUporabnika'] = $idBaza;
									echo "<div id='prijavljen'><span id='prijavaNagovor1'>Pozdravljena, ".$uporabniskoIme."!</span><br/>";

									echo"<br/><span>Kliknite na spodnji gumb za ogled profila.</span><br/>";
									echo "<br/><br/><img id ='pojdiNaProfilSlika' src='https://cdn0.iconfinder.com/data/icons/education-flat-icons-set/128/student-identity-badge-512.png' widht='200' height='200'/><br/><br/><div id='oglejProfil'><span><a id='pojdiNaProfil' href='profil.php'>Ogled Profila!</a></span></div></div><br/><br/>";
									
								}
								
							}else{
								include('prijavaObrazec.php');
								echo "<script>alert('Vnešeno geslo ni pravilno! Prosimo poskusite še enkrat!')</script>";
							}
							
						
					}else{
						include('prijavaObrazec.php');
						echo "<script>alert('Uporabnika žal nismo našli v bazi!')</script>";
					}
					
				}else{
					include('prijavaObrazec.php');
					echo "<script>alert('Prosimo vnesite uporabniško ime ter geslo!')</script>";
					
				}
			?>


			<div id="crnaCrta"></div>
			<div id ="noga">
				<img class="slikeNoga1"src="http://www.bisnode.si/AAA/banner/banner_bonitetna_ocena.php?id=5298261&type=1&lang=en"/>
				<img class="slikeNoga2" src="http://www.interdiskont.si/files/interdiskont/userfiles/docs/STL_zanesljiv-trgovec.png"/>
				<img class="slikeNoga3" src="http://www.interdiskont.si/files/interdiskont/userfiles/excellent-sme.png"/>
				<p id="paragrafNoga">Copyright © 2008-2016 Inter diskont d.o.o.. Vse pravice pridržane.</p>
			</div>
	
		
	</body>
</html>

