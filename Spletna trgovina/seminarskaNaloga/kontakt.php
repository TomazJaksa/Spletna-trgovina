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
							  <div id = 'oPodjetju'><a href='oPodjetju.php'>O PODJETJU</a></div>
						      <div id='artikli'><a href='artikli.php'>ARTIKLI</a></div>";
					}else{
						echo "<div id = 'prijava'><a href='prijava.php'>PRIJAVA</a></div>
							  <div id = 'oPodjetju'><a href='oPodjetju.php'>O PODJETJU</a></div>
							  <div id = 'vstopnaStran'><a href='index.php'>VSTOPNA STRAN</a></div>
						      ";
					}
					
					?>
					<h1>KONTAKT</h1>

				</div>
			</div>
			<div id="levaStran">
				<h1>INTER DISKONT D.O.O.</h1> <br/> 
					<p id="kontaktBesedilo">
					<span class="kontaktBarva">Naslov:</span>
					Partizanska 15,<br/> 
					2390 Ravne na Koroškem<br/> <br/> 

					<span class="kontaktBarva">Trgovina:</span>	02 82 18 391<br/> <br/> 
					<span class="kontaktBarva">Faks:</span>	02 82 18 393<br/> <br/> 
					<span class="kontaktBarva">Reklamacije:</span>	02 82 18 391<br/><br/>  
					reklamacije@interdiskont.si<br/> <br/> 
					<span class="kontaktBarva">E-pošta:</span>	 
					interdiskont@siol.net<br/> <br/> 

					<span class="kontaktBarva">Odpiralni čas:</span><br/> 
					<span class="kontaktBarva">Pon - pet:</span>	7:00 - 20:00<br/> 
					<span class="kontaktBarva">Sobota:</span>	7:00 - 15:00<br/> 
					</p>
				
 					<div id="kontaktSlika"><img src="http://www.aurionlearning.com/testmedia/media/40931/contact-image.png" width="200" height="200"></div>
					
					<!--</div>
					
					<div id="kontaktSlika3"><img src="http://www.hostingreviewslist.com/wp-content/uploads/2013/04/basket-shopping-cart-ecommerce-icon.png" width="100" height="100">
					<div id="kontaktSlika4"><img src="http://www.hostingreviewslist.com/wp-content/uploads/2013/04/basket-shopping-cart-ecommerce-icon.png" width="200" height="200"/></div>
					<div id="kontaktSlika5"><img src="http://www.hostingreviewslist.com/wp-content/uploads/2013/04/basket-shopping-cart-ecommerce-icon.png" width="200" height="200"/></div>

					-->



			</div>

			<div id="kontaktDesnaStran">
				<img id="kontaktSlika2"src="https://cdn1.iconfinder.com/data/icons/finance-items/512/writing_pen_feather_calligraphy_ink_inkstand_inkwell_quill_art_drawing_flat_design_icon-512.png" height="100" width="100"/>
				<h1>AVTORJI SPLETNE STRANI</h1><br/><br/>
					<p id="avtorBesedilo">Avtorja spletne strani sva Miha Bučar in Tomaž Jakša.<br/>
					Spletna trgovina Inter Diskont je bila narejena v okviru 
					predmeta "Uvod v spletno programiranje" 4.5.2016, na Fakulteti za informacijske študije.<br/>
					Upava, da vam je spletna stran všeč ter, da bo v veliko pomoč pri 
					nakupovanju orodja malim in velikim mojstrom.<p>
				
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