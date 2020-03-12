<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>F1 Exempel 5</title>
	</head>
	<body>
		<div>
			
			<?php
				echo( "<pre>" );
				print_r( $_POST );
				echo( "</pre>" );
			?>	

			<form action="<?php echo( $_SERVER["PHP_SELF"] ); ?>" method="post"> 
				<input type="submit" name="btnSend" value="Send" />
				<input type="submit" name="btnDemo" value="Demonstration" />
				<input type="hidden" name="hidDemo" value="Alltid med..." />
			</form>
			<!-- Under föreläsning 2 kommer mer om attributen action och method -->
			<?php
				//Här kommer koden!

				//Inkluderar extern klass som finns i underkatalogen include
				include("include/OneDice.php");

				//Skapar variabeln oOneDice - Observera $ (dollartecken)
				//Instansierar ett objekt ur klassen OneDice (som finns i filen OneDice.php och 
				//skickar med heltalet 6.)
				$oOneDice = new OneDice(6);

				//Skriver ut resultatet från metodanropet getNbr() från objektet oOneDice (observer $ och ->
				echo("<p>" . $oOneDice->getNbr() . "</p>"); //Utskriften blir 6

				//anropar metoden setNbr() och skickar med heltalet 99!
				$oOneDice->setNbr(99);

				//Skriver ut resultatet från metodanropet getNbr() från objektet oOneDice (observer $ och ->
				echo("<p>" . $oOneDice->getNbr() . "</p>"); //Utskriften blir 1! Varför?

				//includerar extern klass
				include("include/SixDices.php");

				//Skapar variabel och instansierar objekt
				//Observera att vi först måste inkludera OneDice.php eftersom SixDices.php använder denna.
				$oSixDices = new SixDices();

				//Kasta tärningarna
				$oSixDices->rollDices();

				//Dumpa ut innehållet i vektorn i objectet $oSixDices
				$oSixDices->dumpDices();

				//Skriver ut summan av alla tärningarna
				//Observera echo() eftersom metoden returnerar värdet.
				//Observera också punkten (.) som utgör strängkontenering (är + i JavaScipt)
				echo( "<p>Summan är " . $oSixDices->sumDices() . "!</p>");

				//Skriver ut tärningarna som bilder (svg).
				//Observera echo() eftersom metoden returnerar värdet.
				echo( $oSixDices->svgDices() );
			?>

		</div>
	</body>
</html>