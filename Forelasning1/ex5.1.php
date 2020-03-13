<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med klasser och objekt</title>
		<link href="style/style.css" rel="stylesheet" />
	</head>
	<body>
		<div>
		
            <?php
            
				include("include/OneDice.php");
				include("include/SixDices.php");

				$oSiXDices = new SixDices();

				$oSiXDices->rollDices();

				echo( $oSiXDices->svgDices() );
				
				echo("<p>" . $oSiXDices->sumDices() . "</p>" . PHP_EOL);

            ?>
			
		</div>
	</body>
</html>