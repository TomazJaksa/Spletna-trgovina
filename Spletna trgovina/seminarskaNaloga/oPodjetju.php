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
					<?php 
					if(isset($trenutniUporabnik)){
						echo "<div id = 'profil'><a href='profil.php'>PROFIL</a></div>
							  <div id = 'kontakt'><a href='kontakt.php'>KONTAKT</a></div>
						      <div id='artikli'><a href='artikli.php'>ARTIKLI</a></div>";
					}else{
						echo "<div id = 'prijava'><a href='prijava.php'>PRIJAVA</a></div>
							  <div id = 'kontakt'><a href='kontakt.php'>KONTAKT</a></div>
							  <div id = 'vstopnaStran'><a href='index.php'>VSTOPNA STRAN</a></div>
						      ";
					}
					
					?>
					<h1>O PODJETJU</h1>

				</div>
			</div>
			<div id="levaStran">
				<div>
					<h1 id="naslovOPodjetju">INTER DISKONT D.O.O.</h1><img id="slikaOPodjetju" src="https://cdn1.iconfinder.com/data/icons/business-items/512/skyscraper_office_building_modern_business_company_city_architecture_urban_structure_tower_flat_design_icon-512.png" height="100" width="100">
				</div>
				<div>
					<p id="besediloOPodjetju">Inter diskont d. o. o. je zasebno podjetje,<br/> katerega ključna dejavnost je prodaja ročnega in električnega orodja.<br/><br/>
						Z našimi kupci, partnerji in sodelavci<br/> vzpostavljamo zaupanje in gradimo na dolgoročnem medsebojnem sodelovanju.<br/>
						Merilo naše uspešnosti mora ostati zadovoljstvo kupcev,<br/> zato jim zagotavljamo najboljše možno razmerje med ceno in kvaliteto.<br/> 
						Zagotavljamo jim tudi obljubljeno kakovost, funkcionalnost in varnost izdelkov<br/> ter redno izpolnjujemo naše servisne obveznosti.<br/>
						Zaradi uvedbe lastnih blagovnih znamk iščemo vedno nove nabavne in prodajne poti.<br/>
						Spoštujemo različnost, kar nas vodi do poslovnih uspehov na vseh trgih.<br/>  Pripravljeni smo za vse spremembe in novosti.<br/>
						Naše vrednote so <br/>neposredna komunikacija, razumevanje potrošnika,<br/> sposobnost prilagajanja, poštenost, prijateljstvo,<br/>
						 kreativnost, strokovnost, timsko delo,<br/> pripadnost, odgovornost, znanje,<br/> raznolikost, hitrost, fleksibilnost,<br/>
						  gospodarnost in podjetnost.<br/>
						Ni dovolj, da samo prodamo izdelek.<br/> Našim kupcem želimo ponuditi prijetno in osebno izkušnjo.<br/> 
						Da bi se jim čim bolj približali,<br/> smo že pred leti pričeli s terenskimi prodajami v njihovem domačem kraju.<br/> 
						O  naši ponudbi jih informiramo s prodajnimi letaki,<br/> preko naše spletne strani in preko radijskih postaj.<br/> 
					</p>
				</div>
			</div>

			<div id="desnaStranOPodjetju">
				<h1 id="zgodovinaNaslov">Zgodovina podjetja</h1><img id="zgodovinaSlika" src="http://drivenmedia.org/wp-content/uploads/2015/10/burundi-history.png" height="100" widht="100"/>
				<p id="zgodovinaBesedilo">
					Podjetje Inter diskont  je bilo ustanovljeno leta 1989.<br/><br/>
					V prvih letih je prodaja potekala na večjih organiziranih sejmih po Sloveniji<br/>
					 in na ozemlju bivše Jugoslavije.<br/><br/>
					Prodajo smo v naslednjih letih razširili tudi na tradicionalne dnevne sejme,<br/>
					 ki so jih organizirali manjši kraji.<br/> 
					Leta 1991 smo na Ravnah odprli gostinski lokal Pop bar,<br/>
					v avgustu 1995 smo v centru mesta odprli trgovino z motom <br/>»Vse za dom, vrt in hišo«.<br/>
					Na isti lokaciji so tudi poslovni in skladiščni prostori.<br/>  
					S prodajo na terenu v lastni organizaciji smo pričeli oktobra leta 1994.<br/> 
					Od takrat smo obiskali že skoraj vse občine v Sloveniji.<br/> 
					Leta 2008 smo dokončali izgradnjo novih skladiščnih prostorov.<br/> 
					Leta 2009 smo odprli drugo stalno trgovino v Ljubljani - ( BTC  City, Hala 10 ),<br/>  
					leta 2014 še tretjo v Novem mestu - (BTC City , Hala A) in četrto leta 2015 v Murski Soboti. (BTC City).<br/>
					Leto 2016 je bilo posvečeno 27. obletnici ustanovitve našega podjetja!<br/>
				</p>
				<img id="slikaID"src="http://www.interdiskont.si/files/interdiskont/userfiles/banerji/Interdiskont-27-let-z-vami.jpg" widht="100" height="100">
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