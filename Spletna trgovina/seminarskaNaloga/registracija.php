<!DOCTYPE HTML>
<html>
	<head>
		<!-- NASLOV V ZAVIHKU -->
		<title>Registracija</title>
		<!-- UPORABA ŠUMNIKOV -->
		<meta charset="utf-8"/>
		<!-- CSS DATOTEKA -->
		<link  rel="stylesheet" type="text/css" href="index.css"/>
		<!-- DODAJANJE GOOGLE FONTA -->
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		<!-- DODAJANJE IKONE V ZAVIHKU-->
		<link rel="SHORTCUT ICON" href="https://cdn4.iconfinder.com/data/icons/harwdware-tools-v2/512/box_case_toolbox_tools-128.png" type="image/x-icon" />

		<script>
			function submit(){
				var	geslo1 = document.forms["registracijskiForm"]["geslo"].value;
				var	geslo2 = document.forms["registracijskiForm"]["potrditevGesla"].value;
				var uporabniskoIme = document.forms["registracijskiForm"]["uporabniskoIme"].value;
				var ime = document.forms["registracijskiForm"]["ime"].value;
				var priimek = document.forms["registracijskiForm"]["priimek"].value;
				var naslov = document.forms["registracijskiForm"]["naslov"].value;
				var telefon = document.forms["registracijskiForm"]["telefon"].value;
				var email = document.forms["registracijskiForm"]["email"].value;

				
				if(geslo1!=geslo2){
					alert("Gesli se ne ujemata! Prosimo ponovno vnesite geslo!");
					geslo1.innerHTML="";
					geslo2.innerHTML="";
					
					 
				}else if(geslo1=="" || geslo2==""){
					alert("Niste vnesli gesel! Prosimo Izpolnite vsa polja!");

				}else if(geslo1.length < 5 || geslo2.length <5){
					alert("Geslo mora vsebovati vsaj 5 znakov! Prosimo vnesite daljše geslo!");
				}
				else if(uporabniskoIme=="" || ime=="" || priimek=="" || naslov=="" || telefon=="" || email==""){
					alert("Vsa vnosna polja niso izpolnjena. Prosim izpolnite jih!");
				}
				else{
					document.getElementById("registracijskiForm").submit();
				}
				
			}
		</script>

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
					<h1>REGISTRACIJA</h1>
				</div>
			</div>
		<div id="registracijaLevaStran">	
		<form id="registracijskiForm" action="zeRegistrirani.php" method="post">
			<h3>Registracijski obrazec<h3>
			<h6><span>Polja naj ne vsebujejo šumnikov!</span></h6>
			<span>Uporabnisko ime:</span><br/>
			<input id="uporabniskoIme" type="text" name="uporabniskoIme" autofocus required/><br/>

			<span>Geslo:</span><br/>
			<input type="password" name="geslo" required/><br/>

			<span>Potrditev gesla:</span><br/>
			<input  type="password" name="potrditevGesla" requred/><br/>

			<span>Ime:</span><br/>
			<input type="text" name="ime" required/><br/>

			<span>Priimek:</span><br/>
			<input type="text" name="priimek" required/><br/>

			<span>Datum rojstva:</span><br/>
			<input type="date" name="datumRojstva"/><br/><br/>

			<span>Spol:</span><br>
			<input id="moski" type="radio" name="spol" value="moski" checked><label for="moski"><span>Moški</span></label>
			<input id="zenski" type="radio" name="spol" value="zenski"><label for="zenski"><span>Ženski</span></label><br/><br/>

			<span>Naslov:</span><br/>
			<input type="text" name="naslov" placeholder="naslov, poštna številka, kraj"/><br/>

			<span>Telefon:</span><br/>
			<input type="tel" name="telefon" placeholder="040444333"><br/>

			<span>E-mail:</span><br/>
			<input id="email" type="email" name="email" placeholder="ime.priimek@email.com" required/><br/><br/>
			<!--<button onclick="submit()"><span>POŠLJI!</span></button>-->
		</form>

		<button id="submitGumb"onclick="submit()"><span>Pošlji!</span></button>
		<br/>
		<br/>
		<!--Ta koda še ni dokončana. Na tej spletni strani mora sistem preveriti ali so vtipkani parametri že kje v bazi
		(ali se recimo že kje pojavi uporabniško ime.  ) V kolikor je vse ok, nadaljuj na stran( zeRegistrirani.php),
		kjer je uporabnik obveščen, da je bila registracija uspešna. V kolikor ni, s pomočjo javascripta izvedemo funkcijo, 
		ki uporabnika naprosi, da spremeni uporabniško ime.-->

		</div>
		<div id="registracijaDesnaStran">
			<div>
				<h1 id="naslovDesnaStran">INTER DISKONT - Spletna trgovina z orodjem</h1>
				<p id="nagovorRegistracija">Inter diskont d. o. o. je zasebno podjetje, katerega ključna dejavnost je prodaja ročnega in električnega orodja. Z našimi kupci, partnerji in sodelavci vzpostavljamo zaupanje in gradimo na dolgoročnem medsebojnem sodelovanju.</p>
			</div>
				<div class="galerijaSlikRegistracija">
					<figure id="prva">
						<img src="https://cdn0.iconfinder.com/data/icons/web-and-apps-develop/512/sketching_tools_drawing_equipment_development_ruler_pencil_illustration_education_geometry_graphic_design_flat_design_icon-512.png" width="200" height="200"/>
					</figure>

					<figure id="druga">
						<img src="https://cdn0.iconfinder.com/data/icons/web-development-2/512/prototype_sketch_blueprint_project_website_design_prototyping_web_site_structure_layout_plan_scheme_wireframe_create_sketching_tools_flat_design_icon-512.png" width="200" height="200"/>
					</figure>

					<figure id="tretja">
						<img src="https://cdn0.iconfinder.com/data/icons/industry-flat-icons/128/shovel-512.png" width="200" height="200"/>
					</figure>

					<figure id="cetrta">
						<img src="http://oss.adm.ntu.edu.sg/ichu001/wp-content/uploads/sites/178/2015/11/tools-icon.png" width="200" height="200"/>
					</figure>

					<figure id="peta">
						<img src="https://cdn3.iconfinder.com/data/icons/construction-flat-multicolor-background-shadow/2048/371_-_Under_Construction_Sign-512.png" width="200" height="200"/>
					</figure>

					<figure id="sesta">
						<img src="http://www.axis.com/sites/default/files/settings-icon.png" width="200" height="200"/>
					</figure>

					<figure id="sedma">
						<img src="http://www.clickmeindia.com/couch/uploads/image/flat-icons/graphic_design_tools-19-512.png" width="200" height="200"/>
					</figure>

					<figure id="osma">
						<img src="http://www.investmentyogi.com/w/wp-content/uploads/2014/01/partners-icon.png" width="200" height="200"/>
					</figure>
				</div>
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