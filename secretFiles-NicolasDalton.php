<html>
	<head>
		<title>COSC 4343 Homework #4</title>
	</head>
	
	<body bgcolor= Black>
	
		<?php
			$clearance = $_GET["varname"];
			if($clearance == "T")
			{
				$topSecret_image = "TopSecret.png";
				echo "<img src=\"$topSecret_image\" />";
				$secret_image = "Secret.png";
				echo "<img src=\"$secret_image\" /> <br>";
				$confidential_image = "Confidential.png";
				echo "<img src=\"$confidential_image\" />";
				$unclassified_image = "Unclassified.png";
				echo "<img src=\"$unclassified_image\" /> <br>";
			}
			if($clearance == "S")
			{
				$secret_image = "Secret.png";
				echo "<img src=\"$secret_image\" />";
				$confidential_image = "Confidential.png";
				echo "<img src=\"$confidential_image\" /> <br>";
				$unclassified_image = "Unclassified.png";
				echo "<img src=\"$unclassified_image\" /> <br>";
			}
			if($clearance == "C")
			{
				$confidential_image = "Confidential.png";
				echo "<img src=\"$confidential_image\" />";
				$unclassified_image = "Unclassified.png";
				echo "<img src=\"$unclassified_image\" /> <br>";
			}
			if($clearance == "U")
			{
				$unclassified_image = "Unclassified.png";
				echo "<img src=\"$unclassified_image\" /> <br>";
			}
		?>
	</body>
	</html>