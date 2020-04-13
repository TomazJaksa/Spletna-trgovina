<?php
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
					<?php 
					if(isset($trenutniUporabnik)){
						echo "Prijavljen uporabnik ne more na naslovno stran!";
					}else{
						echo "
							  <div id = 'kontakt'><a href='kontakt.php'>KONTAKT</a></div>
							  <div id = 'oPodjetju'><a href='oPodjetju.php'>O PODJETJU</a></div>
						      <dvi id = 'prijava'><a href='prijava.php'>PRIJAVA<a/></div>";
					}
					
					?>
					<h1>INTER DISKONT  <span id="slogan">Pravo orodje za dobro ceno</span></h1>

				</div>
			</div>
			
			<div class ="galerijaSlik">
				<figure>
				<img class="show" src="https://cdn1.iconfinder.com/data/icons/tools/32/tools-drill-512.png" width="400" height="300" />
				<figcaption><strong>inter Diskont d.o.o.</strong> je zasebno podjetje, katerega ključna dejavnost je prodaja ročnega in električnega orodja. Z našimi kupci, partnerji in sodelavci vzpostavljamo zaupanje in gradimo na dolgoročnem medsebojnem sodelovanju.</figcaption>
				</figure>

				<figure>
				<img class="show" src="https://cdn1.iconfinder.com/data/icons/tools/32/tools-circular-saw-512.png" width="400" height="300"/>
				<figcaption><strong>Inter Diskont: </strong>Znam, naredim sam!</figcaption>
				</figure>

				<figure>
				<img class="show" src="https://cdn1.iconfinder.com/data/icons/tools/32/tools-clamp-512.png" width="400" height="300"/>
				<figcaption><strong>Inter Diskont: </strong>Znam, naredim sam!</figcaption>
				</figure>

				<figure>
				<img class="show" src="https://cdn1.iconfinder.com/data/icons/tools/32/tools-putty-knife-512.png" width="400" height="300"/>
				<figcaption><strong>Inter Diskont: </strong>Znam, naredim sam!</figcaption>
				</figure>

				<figure>
				<img class="show" src="https://cdn0.iconfinder.com/data/icons/hardware-and-painting-tools/512/hand_saw-512.png" width="400" height="300" />
				<figcaption><strong>inter Diskont d.o.o.</strong> je zasebno podjetje, katerega ključna dejavnost je prodaja ročnega in električnega orodja. Z našimi kupci, partnerji in sodelavci vzpostavljamo zaupanje in gradimo na dolgoročnem medsebojnem sodelovanju.</figcaption>
				</figure>

				<figure>
				<img class="show" src="https://cdn1.iconfinder.com/data/icons/tools/32/tools-shovel-512.png" width="400" height="300"/>
				<figcaption><strong>Inter Diskont: </strong>Znam, naredim sam!</figcaption>
				</figure>

				<figure>
				<img class="show" src="https://cdn2.iconfinder.com/data/icons/tools-glyph/32/wheelbarrow-512.png" width="400" height="300"/>
				<figcaption><strong>Inter Diskont: </strong>Znam, naredim sam!</figcaption>
				</figure>

				<figure>
				<img class="show" src="https://cdn1.iconfinder.com/data/icons/tools-glyph/32/screwdriver-512.png" width="400" height="300"/>
				<figcaption><strong>Inter Diskont: </strong>Znam, naredim sam!</figcaption>
				</figure>

			</div>
			<div id="desnaStran">
				<div id="registrirajSe"><a id="registracija" href="registracija.php">Registriraj se!</a></div>
				<div id="nagovor"><h1>Še nisi član?</h1><p>Registriraj se 
					in uživaj v popustih in mnogih drugih ugodnostih, 
					ki jih prinaša članstvo!</p></div>
				<img id="registracijaSlika" src="https://cdn2.iconfinder.com/data/icons/ballicons-2-free/100/wrench-512.png" width="100px" height="100px"/>
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