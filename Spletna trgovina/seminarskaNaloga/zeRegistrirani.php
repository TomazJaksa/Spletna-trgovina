<!DOCTYPE HTML>
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
					<div id = "prijava"><a href="prijava.php">PRIJAVA</a></div>
					<div id = "kontakt"><a href="kontakt.php">KONTAKT</a></div>
					<div id = "oPodjetju"><a href="oPodjetju.php">O PODJETJU</a></div>
					<div id = "vstopnaStran"><a href="index.php">VSTOPNA STRAN</a></div>
					<h1 ="rezultat">REGISTRACIJA</h1>
				</div>
			</div>
			
		<!--Ta koda še ni dokončana. Na tej spletni strani mora sistem preveriti ali so vtipkani parametri že kje v bazi
		(ali se recimo že kje pojavi uporabniško ime.  ) V kolikor je vse ok, nadaljuj na stran( zeRegistrirani.php),
		kjer je uporabnik obveščen, da je bila registracija uspešna. V kolikor ni, s pomočjo javascripta izvedemo funkcijo, 
		ki uporabnika naprosi, da spremeni uporabniško ime.-->
			<!--POVEZAVA Z BAZO-->
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

					$conn->set_charset("UTF-8"); //Šumniki 

					$uporabniskoIme = $_POST["uporabniskoIme"];
					$geslo = $_POST["geslo"];
					$email = $_POST["email"];
					$naslov = $_POST["naslov"];
					$telefon = $_POST["telefon"];
					$datumRojstva = $_POST["datumRojstva"];
					$priimek = $_POST["priimek"];
					$ime= $_POST["uporabniskoIme"];
					$spol= $_POST["spol"];
					
					//Preverimo ali uporabniško ime že obstaja
					/*
					$preveri= "select * from uporabnik where uporabniskoIme=' ". $uporabniskoIme. "' or email = '".$email."'";
					
					$res = mysqli_query($conn,$preveri);
					$prestejRes = mysqli_num_rows($res);

					*/

					$preveri= "select * from uporabnik where uporabniskoIme='". $uporabniskoIme. "'";
					
					$res = mysqli_query($conn,$preveri);
					$prestejRes = mysqli_num_rows($res);

					$preveri2= "select * from uporabnik where  email = '".$email."'";
					
					$res2 = mysqli_query($conn,$preveri2);
					$prestejRes2 = mysqli_num_rows($res2);

					/*
					while($row = mysqli_fetch_array($res)){

							echo "$row[1] $row[3]<br/>";
							echo "Stevilo vrstic : $prestejRes";
					
					}*/
					if($prestejRes>0){
						//Preusmeritev na obrazec
						echo"<br/><br/><img id='registracijaNeuspesna' src='https://cdn1.iconfinder.com/data/icons/ui-icons-2/512/wrong-01-512.png' width='250' height='250'/>";
						echo "<h1 class='registracijaNeuspesnaNagovor'>Ups! Nekaj se je zalomilo.</h1>";
						echo "<script>alert('Registracija ni uspela, ker uporabniško ime že obstaja. Prosimo spremenite ga.');window.location.href='registracija.php';</script>";
						
										

					
					}
					else if($prestejRes2>0){
						 //Preusmeritev na obrazec
						echo"<br/><br/><img id='registracijaNeuspesna' src='https://cdn1.iconfinder.com/data/icons/ui-icons-2/512/wrong-01-512.png' width='250' height='250'/>";
						echo "<h1 class='registracijaNeuspesnaNagovor'>Ups! Nekaj se je zalomilo.</h1>";
						echo "<script>alert('Registracija ni uspela, ker e-naslov uporablja že drugi uporabnik. Prosimo spremenite ga.');window.location.href='registracija.php';</script>";
					}
						/* in izvrši tegale*/
					else{

						$vnos = mysqli_query($conn,"INSERT INTO Uporabnik (UporabniskoIme, Geslo, Email, Naslov, Telefon, Spol, DatumRojstva, Ime, Priimek) VALUES ('$uporabniskoIme', '$geslo', '$email', '$naslov', '$telefon', '$spol', '$datumRojstva', '$ime', '$priimek')");
					
						// tako se dobi podatke iz baze (izberemo vrstico in jo izpišemo po atributu)
						//$result = mysqli_query($conn, "select * from uporabnik;");

						//while($row= mysqli_fetch_array($result)){
						//	echo "$row[UporabniskoIme]<br/>";
						//}
						echo "<img id='registracijaUspesna' src='http://3.bp.blogspot.com/-5V_GvJ10fDc/U1UsJ-2zDtI/AAAAAAAAAGE/j_3Ov0Gg4Q0/s1600/Check_user_man_ok_yes_accept_tick.png' height='250' widht='250'/>";

						if($spol=="zenski"){
							echo "<h1 class='registriranNagovor'>Pozdravljena $ime. Vaša registracija je bila uspešna.</h1>";	
						}else{
						echo "<h1 class='registriranNagovor'>Pozdravljen $ime. Vaša registracija je bila uspešna.</h1>";
						}

						
					
					}
					
					mysqli_close($conn);

				?> 
				<div id="crnaCrta"></div>
			<div id ="noga">
				<img class="slikeNoga1"src="http://www.bisnode.si/AAA/banner/banner_bonitetna_ocena.php?id=5298261&type=1&lang=en"/>
				<img class="slikeNoga2" src="http://www.interdiskont.si/files/interdiskont/userfiles/docs/STL_zanesljiv-trgovec.png"/>
				<img class="slikeNoga3" src="http://www.interdiskont.si/files/interdiskont/userfiles/excellent-sme.png"/>
				<p id="paragrafNoga">Copyright © 2008-2016 Inter diskont d.o.o.. Vse pravice pridržane.</p>
			</div>
			
</html>