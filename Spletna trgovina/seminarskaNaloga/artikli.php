<?php
	error_reporting(0);
	session_start();

	$trenutniUporabnik=""; //Določimo spremenljivko trenutni uporabnik
	//Če je trenutni uporabnik določen. Torej je bilo v obrazec vpisano pravilno prijavno ime, naj se to shrani v $trenutniUporabnik

	$idTrenutnegaUporabnika = "";
	if(isset($_SESSION['trenutniUporabnik'])){
		$trenutniUporabnik=$_SESSION['trenutniUporabnik'];
		$idTrenutnegaUporabnika = $_SESSION['idTrenutnegaUporabnika'];
	}

	?>
<!DOCTYPE HTML>
<html>
	<head>
		<!--NASLOV STRANI-->
		<title>Inter Diskont - Artikli</title>
		
		<!--DODAJANJE ŠUMNIKOV-->
		<meta charset="utf-8"/>

		<!-- DODAJANJE CSS DATOTEKE-->
		<link rel="stylesheet" type="text/css" href="index.css"/>

		<!-- DODAJANJE GOOGLE FONTA -->
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		
		<!-- DODAJANJE IKONE V ZAVIHKU-->
		<link rel="SHORTCUT ICON" href="https://cdn4.iconfinder.com/data/icons/harwdware-tools-v2/512/box_case_toolbox_tools-128.png" type="image/x-icon" />	

		<?PHP

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
					$rezultat = "select ImeIzdelka, Cena, VirSlike, IzdelekID from Izdelek;";

					$poizvedba = mysqli_query($conn, $rezultat);

					//Preverimo ali je 'add' nastavljen. Na podlagi tega dobimo podatke, katera košarica je bila kliknjena.
					//Vsako košarico shranimo v globalno spremenljivko.
					if(isset($_GET['dodaj'])){
						
						//KOLIČINA V BAZI IZBRANEGA ARTIKLA
						$kolicina = mysqli_query($conn, 'select IzdelekID, zaloga from Izdelek where IzdelekID='.$_GET['dodaj']);

						while($kolicina_vrstica = mysqli_fetch_assoc($kolicina)){
							if($kolicina_vrstica['zaloga']!=$_SESSION['kosarica_'.$_GET['dodaj']]){
								$_SESSION['kosarica_'.$_GET['dodaj']]+='1'; //Dodaj v košarico + 1 artikel
							}
						}


						
					}

					if(isset($_GET['odstrani'])){
						$_SESSION['kosarica_'.$_GET['odstrani']]--;
					}

					if(isset($_GET['izbrisi'])){
						$_SESSION['kosarica_'.$_GET['izbrisi']]=0;
					}

					function kosarica(){
						$sestevek = 0;
						$skupaj=0;
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
							echo"<div id='izpisIzdelkovArtikli'>";
							foreach($_SESSION as $name => $value){
								
								if($value>0){
								
									if(substr($name,0,9)=='kosarica_'){

									  $id = substr($name,9, strlen($name)-9);

									  $dobiIzBaze = mysqli_query($conn, 'select izdelekID,imeIzdelka, cena from izdelek where izdelekID='.$id);

									  while($vrstica = mysqli_fetch_assoc($dobiIzBaze)){
									  		$skupaj = $vrstica['cena']*$value;
									  		echo "<br/>";
									  		echo "<span style='font-weight:bold;color:white;'>".$vrstica['imeIzdelka']." x ".$value." (".$vrstica['cena'].'€) = '.$skupaj.'€<a href="artikli.php?dodaj='.$id.'"><img src="http://tny.im/4qN" height="20" width="20"/></a><a href="artikli.php?odstrani='.$id.'"><img src="http://tny.im/4qG" height="20" width="20"/></a><a href="artikli.php?izbrisi='.$id.'"><img src="http://tny.im/4qL" height="20" width="20"/></a><br/><br/></span>';

									  }	
									}
									$sestevek += $skupaj;

								}
							}if($sestevek == 0){
								echo "<br/><Br/><span style='color: white; font-weight:bold;'>Vaša košarica je prazna.<span>";
							}else{
								echo "<span style='color:white; font-weight:bold;'>Skupaj: ".$sestevek."€<br/><br/></span>";
								echo "<form action='{$_SERVER['PHP_SELF']}' method='POST'>";
								echo "<input type='submit' name='submit' value='NAROČI!'/>";
								echo "</form>";
						}	
						echo "</div>";
					}

					if(isset($_POST['submit'])){
					
							$idTrenutnegaUporabnika = $_SESSION['idTrenutnegaUporabnika'];
									$host= "localhost";
									$port=3306;
									$socket="";
									$user="root";
									$password="";
									$dbname="mydb"; // vpišemo ime baze, ne datoteke (!)

									//Dejanska povezava
									$conn= mysqli_connect($host, $user, $password, $dbname, $port, $socket)
									or die("Could not connect to database server".mysqli_connect_error()); //Najprej se povežemo z bazo

									$steviloTransakcij = mysqli_num_rows(mysqli_query($conn, "select * from transakcija"));//dobimo število trenutnih transakcij v bazi
									$steviloTransakcij+=1; // damo +1, da dodelimo ID trenutni transakciji
										//ustvarimo gumb ubistvu ob kliku nanj dobimo samo id transakcije. v ozdju pa se izvede še vstavljanje v bazo
										echo "<div id='gumbTransakcija'>";
										/*echo "<a style='color:black;'href='artikli.php?transakcija='{$steviloTransakcij}'><h3>NAROČI!</h3></a>";*/
										echo "</div>";

										foreach($_SESSION as $name => $value){
											if($value>0){
													
												if(substr($name,0,9)=='kosarica_'){
													 $id = substr($name,9, strlen($name)-9);
													 $trenutniUporabnik=$_SESSION['trenutniUporabnik'];
													 $cena=0;
													 $obdelan = "F";
													  $dobiIzBaze = mysqli_query($conn, 'select cena from izdelek where izdelekID='.$id);

													  while($vrstica = mysqli_fetch_assoc($dobiIzBaze)){
													  	$cena = $vrstica['cena']*$value;
													  }
													  if(isset($id)&&isset($trenutniUporabnik)&&isset($cena)&&isset($value) && isset($steviloTransakcij)){


 $vnosTransakcije = mysqli_query($conn,"INSERT INTO Transakcija ( TransakcijaID, UporabnikID, IzdelekID, Kolicina, Znesek, Obdelan ) 
								VALUES ('{$steviloTransakcij}','{$idTrenutnegaUporabnika}','{$id}','{$value}','{$cena}','{$obdelan}')") or die("Unexpected error:".mysqli_error($conn));

													  }
													  	
													  
													

													 

												}
											}
										}
										

									}
					
					?>
		
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
						      <div id='kontakt'><a href='kontakt.php'>KONTAKT</a></div>";
					}else{
						echo "<div id = 'prijava'><a href='prijava.php'>PRIJAVA</a></div>
							  <div id = 'oPodjetju'><a href='oPodjetju.php'>O PODJETJU</a></div>
							  <div id = 'vstopnaStran'><a href='index.php'>VSTOPNA STRAN</a></div>
						      <div id='kontakt'><a href='kontakt.php'>KONTAKT</a></div>";
					}
					
					?>
				<h1>ARTIKLI</h1>
				</div>
			</div>
			<?php

					
				echo "<div style='float:left;'>";

				echo "<table id='seznamArtiklov' style='border-spacing:3em;'>";

					echo "<tr>";
					$i=0;
					while($vrstica=mysqli_fetch_array($poizvedba)){
						if($i%3!=0){

								echo"<td id='orodje'>
								<table>
								<tr> <td colspan='2'><img src='{$vrstica['VirSlike']}' width='100' height='100'/></td></tr>
								<tr> <td>{$vrstica['ImeIzdelka']}</td><td STYLE='font-weight:bold;'>{$vrstica['Cena']}€</td></tr>

								<tr><td colspan='2'><div class='dodajVKosarico'><a href='artikli.php?dodaj={$vrstica['IzdelekID']}'><img src='http://tny.im/4pg' width='50' height='50' title='Dodaj v košarico'><BR/>DODAJ V KOŠARICO!</a></div></td></tr>

								</table>
								</td>";
								$i++;

							}else{

								echo "<tr/>";
								echo"<td id='orodje'>
								<table>
								<tr> <td colspan='2'><img src='{$vrstica['VirSlike']}' width='100' height='100'/></td></tr>
								<tr> <td>{$vrstica['ImeIzdelka']}</td><td STYLE='font-weight:bold;'>{$vrstica['Cena']}€</td></tr>

							 	<tr><td colspan='2'><div class='dodajVKosarico'><a href='artikli.php?dodaj={$vrstica['IzdelekID']}'><img src='http://tny.im/4pg' width='50' height='50' title='Dodaj v košarico'><BR/>DODAJ V KOŠARICO!</a></div></td></tr>

								</table>";
								$i++;
							
					}
				}
				echo "</tr>";
				echo "</table>";
				echo "</div>";
				mysqli_close($conn);
			?>

			<div id="desnaStranArtikli">
				<?php 
					echo kosarica();
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