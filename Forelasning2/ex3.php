<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med kakor</title>
		<style>
			<?php
				//Här kommer koden...
				//Flagga för om knappen skall vara användbar eller inte
				$disabled = true;

				//Defaultvärde för CSS
				$css = "body { color: rgb(0,0,0); background-color: rgb(255,255,255); }";

			if(isset($_POST["btnSend"])){

				$fgColor = $_POST["foregroundcolor"];
				$bgColor = $_POST["backgroundcolor"];

				setcookie("fgColor", $fgColor, time() + 3600);
				setcookie("bgColor", $bgColor, time() + 3600);

				$css = "body { color: $fgColor; backgroundcolor: $bgColor; }"

				$disabled = false;


			}

			if(isset($_POST["btnReset"])){

				setcookie("fgColor", "", time() - 3600);
				setcookie("bgColor", "", time() - 3600);

			}

			if(!isset($_POST["btnSend"]) && 
			!isset($_POST["btnReset"]) && 
			isset($_COOKIE["fgColor"]) && 
			isset($_COOKIE["bgColor"])){

				$fgColor = $_COOKIE["fgColor"];
				$bgColor = $_COOKIE["bgColor"];

				$css = "body { color: $fgColor; background-color: $bgColor; }";
				$disabled = false;

			}
			
			echo($css);


			?>
		</style>
	</head>
	<body>
		<div>
		
			<form action="<?php echo( $_SERVER["PHP_SELF"] ); ?>" method="post">
			
				<select name="backgroundcolor">
					<option value="rgb(255, 0, 0)" selected="selected">Red</option>
					<option value="rgb(0, 255, 0)">Green</option>
					<option value="rgb(0, 0, 255)">Blue</option>
				</select>
			
				<select name="foregroundcolor">
					<option value="rgb(255, 0, 0)">Red</option>
					<option value="rgb(0, 255, 0)">Green</option>
					<option value="rgb(0, 0, 255)" selected="selected">Blue</option>
				</select>
			
				<input type="submit" name="btnSend" value="Send" />
				<input type="submit" name="btnReset" value="Reset" <?php if($disabled) { echo("disabled"); }/>
			
			</form>
		
			<?php
			
				echo( "<pre>" );
				print_r( $_POST );
				print_r( $_COOKIE );
				echo( "</pre>" );
				
			?>
			
		</div>
	</body>
</html>