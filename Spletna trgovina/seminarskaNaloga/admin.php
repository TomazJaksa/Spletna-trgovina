<?php
	error_reporting(0);
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
						<div id = 'vnosArtiklov'><a href='vnosArtiklov.php'>VNOS ARTIKLOV</a></div>
						
						<div id='izpisNarocil'><a href='izpisNarocil.php'>IZPIS NAROČIL</a></div>
					<h1>BRSKANJE PO BAZI</h1>
				</div>
			</div>

<div id='levaStranAdmin'>
			<h2>Iskanje po bazi podatkov s pomočjo kjučnih besed.</h2>
			<H6>V polje vnesite poizvedbo v sql obliki, za iskanje po bazi.
			Izpis je omejen na 4 atribute.
			</H6>

			<span>Poizvedba:</span>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
			<input type="text" name="poizvedba" placeholder="'select * from shema where condition is value;'" />
			<input type="submit" name="submit" value="POŠLJI V POIZVEDBO!">
			</form>
			<?php
				if(isset($_POST['submit'])){
				$host= "localhost";
				$port=3306;
				$socket="";
				$user="root";
				$password="";
				$dbname="mydb"; // vpišemo ime baze, ne datoteke (!)

				//Dejanska povezava
				$conn= mysqli_connect($host, $user, $password, $dbname, $port, $socket)
				or die("Could not connect to database server".mysqli_connect_error()); //Najprej se povežemo z bazo 
				$poizvedba = $_POST['poizvedba'];

				$stavek = mysqli_query($conn,$poizvedba);
				
				echo "<table id='narocilaTabela'>";
				while($vrstica = mysqli_fetch_array($stavek)){
					
					echo"<TR><td>".$vrstica[0]."</td>&nbsp<td> ".$vrstica[1]."</td><td> ".$vrstica[4]."</td><td>".$vrstica[5]."</td></TR>";
					
				}
				echo "</table><br/>";

			}
				$host= "localhost";
				$port=3306;
				$socket="";
				$user="root";
				$password="";
				$dbname="mydb"; // vpišemo ime baze, ne datoteke (!)

				$conn= mysqli_connect($host, $user, $password, $dbname, $port, $socket)
				or die("Could not connect to database server".mysqli_connect_error()); //Najprej se povežemo z bazo 

				echo "<table>";
					$stavek2 = mysqli_query($conn,"select * from uporabnik;");

					while($vrstica = mysqli_fetch_array($stavek2)){
						echo "<tr><td>".$vrstica[0]."</td><td>".$vrstica[1]."</td><td>".$vrstica[2]."</td><td>".$vrstica[3]."</td></tr>";
					}

				echo "</table>";	
			?>
			</div>
			<div id="desnaStranAdmin">
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