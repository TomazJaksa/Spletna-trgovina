<?php
	session_start();
	 //Določimo spremenljivko trenutni uporabnik

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
						<div id = 'izpisNarocil'><a href='izpisNarocil.php'>IZPIS NAROČIL</a></div>
						<div id='brskanjePoBazi'><a href='admin.php'>BRSKANJE PO BAZI</a></div>
					<h1>VNOS ARTIKLOV IN POSODABLJANJE PODATKOV</h1>
				</div>
			</div>

			<div id='levaStranAdmin'>
				<h2>Vnašanje izdelka v bazo</h2>
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					Ime izdelka:&nbsp<input type="text" name="ime" REQUIRED /><br/><br/>
					Zaloga:&nbsp &nbsp &nbsp<input type="number" name="zaloga" REQUIRED /><br/><br/>
					Cena:&nbsp &nbsp &nbsp &nbsp <input type="number" name="cena" REQUIRED/><br/><br/>
					Vir slike:&nbsp &nbsp &nbsp<input type="url" name="virSlike" REQUIRED/><br/><br/><br/>
					<input type="submit" name="submit" value="VNOS IZDELKA V BAZO!">
				</form>

				<h2>POSODABLJANJE BAZE</h2>
				<h3>Tabela vrednosti za v pomoč pri posodabljanju vrednosti zaloge artiklov</h3>
				<?php
					
					$host= "localhost";
					$port=3306;
					$socket="";
					$user="root";
					$password="";
					$dbname="mydb"; // vpišemo ime baze, ne datoteke (!)

				//Dejanska povezava
					$conn= mysqli_connect($host, $user, $password, $dbname, $port, $socket)
					or die("Could not connect to database server".mysqli_connect_error()); //Najprej se povežemo z bazo 

					$poizvedba = mysqli_query($conn, "select uporabniskoIme, izdelek.izdelekID,imeIzdelka , zaloga, kolicina, znesek from transakcija, uporabnik, izdelek where uporabnik.uporabnikID = transakcija.uporabnikID and transakcija.izdelekID = izdelek.izdelekID and transakcija.obdelan != 'T'");
			

					echo "<table id='narocilaTabela'>";
					echo "<tr><td class='imena'>UPORABNIŠKO IME</td><td class='imena'>ID IZDELKA</td><td class='imena'>IME IZDELKA</td><td class='imena'>ZALOGA</td><td class='imena'>NAROČILO</td><td class='imena'>ZNESEK</td></tr>";
					while($vrstica = mysqli_fetch_array($poizvedba)){
					
					echo"<TR><td>".$vrstica[0]."</td>&nbsp<td> ".$vrstica[1]."</td><td> ".$vrstica[2]."</td><td> ".$vrstica[3]."</td><td> ".$vrstica[4]."</td><td>".$vrstica[5]."</td></TR>";
					
					}

				echo "</table><br/><br/>";
				?>
				<form method='post' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				ID ARTIKLA: <input type='number' name="artikelID" requred/><br/><br/>
				NOVA ZALOGA: <input type='number' name="novaZaloga" required/><br/><br/>
				<input type="submit" name="submit2" value="POSODOBI ZALOGO ARTIKLA!">
				</form>
				<?php
				/*ZA POSODABLJANJE ZALOGE V BAZI*/
				if(isset($_POST['submit2'])){

					$idArtikla = $_POST['artikelID'];
					$novaZaloga = $_POST['novaZaloga'];

					$posodobitevBaze = mysqli_query($conn,"UPDATE izdelek SET  zaloga='$novaZaloga' WHERE izdelekID='$idArtikla'") or die ('Error updating database: '.mysql_error());

					$posdobitevBaze2 = mysqli_query($conn,"UPDATE transakcija SET obdelan='T' where izdelekID='$idArtikla'")or die ('Error updating database: '.mysql_error());
				}

				/*ZA VNAŠANJE NOVIH ARTIKLOV*/
				if(isset($_POST['submit'])){

				$ime = $_POST['ime'];
				$zaloga = $_POST['zaloga'];
				$cena =  $_POST['cena'];
				$vir = $_POST['virSlike'];
							mysqli_query("START TRANSACTION");
				$vnesiVbazo = mysqli_query($conn, "INSERT INTO Izdelek (ImeIzdelka, Zaloga, Cena, VirSlike) VALUES ('$ime','$zaloga','$cena','$vir')");
							mysqli_query("COMMIT");

				}
				?>
			
			</div>
			<div id="desnaStranVnosArtiklov">
				<h2 style='font-weight:bold;'>Ste že našli vse kar ste hoteli?</h2><br/>
				<h3 id="odjavaNagovor">Ste preverili vso ponudbo kladiv ali pa novo kolekcijo kompresorskega orodja? 
					Lahko se oglasite, tudi v naših poslovalnicah, ki so po celi Sloveniji. Se že veselimo vašega prihoda.
					<br/><br/><br/>Kliknite na gumb odjava, da se odjavite iz sistema.</h3>
				<br/><br/>
				<img src="https://cdn0.iconfinder.com/data/icons/interface-icons-rounded/110/Logout-128.png" widht="100" height="100"/><br/>
				<br/><div id="odjavaGumb"><span><a id="odjavaNapis" href="profil.php?logout=True">ODJAVA!</a></span></div>
				<?php
					if(isset($_GET['logout'])){
						session_unset();
						session_destroy();
						mysqli_close();
						header('location: index.php');
						
					}
				?>
			</div>

			<div id="crnaCrta"></div>
			<div id ="noga">
				<img class="slikeNoga1"src="http://www.bisnode.si/AAA/banner/banner_bonitetna_ocena.php?id=5298261&type=1&lang=en"/>
				<img class="slikeNoga2" src="http://www.interdiskont.si/files/interdiskont/userfiles/docs/STL_zanesljiv-trgovec.png"/>
				<img class="slikeNoga3" src="http://www.interdiskont.si/files/interdiskont/userfiles/excellent-sme.png"/>
				<p id="paragrafNoga">Copyright © 2008-2016 Inter diskont d.o.o.. Vse pravice pridržane.</p>
			</div>
		
	</body>
</html>