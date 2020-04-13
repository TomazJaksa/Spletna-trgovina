<img id="prijavaSlika" src="https://cdn0.iconfinder.com/data/icons/interface-icons-rounded/110/Login-512.png" width="200" height="200"/><br/><br/>
<form id="prijavaForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
				<span>Uporabniško ime:</span><br/>
				<input type="text" name="uporabniskoIme" autofocus required /><br/><br/>

				<span>Geslo:</span><br/>
				<input type="password" name="geslo" required/><br/><br/>
				<input id="prijavaGumb" type="submit" value="PRIJAVA!" name="submit"/><br/><br/>

			</form>