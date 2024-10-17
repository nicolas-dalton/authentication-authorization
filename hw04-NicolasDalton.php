<!DOCTYPE html>
<html>
	<head>
		<title>COSC 4343 Homework #4</title>
	</head>
	<style type="text/css">
    body{text-align:center}

	</style>
	<body bgcolor= AntiqueWhite>
		<form method="post" action="hw04-NicolasDalton.php">
		User Name: <br>
		<input type="text" id="user_name" name="user_name"><br><br>
		Password: <br>
		<input type="text" id="password" name="password"><br><br>
		<input type="submit" value= "Log In">
		</form>
		<p>
			
			<?php 
				
				$clearanceOfUser = "";
				
				
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$servername = "localhost";
					$username = "root";
					$password = "COSC4343";
					$dbname = "UserAccountsDB";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) 
					{
						die("Connection failed: " . mysqli_connect_error());
					}
					echo "Connection successful! <br>";
					
					$user_name = $_POST["user_name"];
					$hash_password = md5($_POST["password"]);
					//QUERY STATEMENT
					$sql = "SELECT user_id, user_name, password, clearance from UserAccounts where user_name = 
					'".$user_name."' AND  password = '".$hash_password."'";
					$result = mysqli_query($conn, $sql);
					
					
					echo "<br>";
					echo "<br>";
					if (mysqli_num_rows($result) > 0)
					{
						$myArray = array();
						// output data of each row
						while($row = mysqli_fetch_assoc($result))
						{
							//echo "id: " . $row["user_id"]. " UserName: " . $row["user_name"]. " Password " . 
							//$row["password"].  "Clearance ".$row["clearance"]. "<br>";
							$myArray[] = $row["clearance"];
						}
						$clearanceOfUser = $myArray[0];
						echo "Log in Successful!";
					}
					else
					{
						echo "Cannot find user account";
					}
				
					echo "<form method='get' action='secretFiles-NicolasDalton.php'>";
					echo "<input type='hidden' name='varname' value= $clearanceOfUser>";
					echo "<input type='submit' value= 'Click here to see your files'>";
					echo "</form>"; 

				}
				mysqli_close($conn);
				
			?>
			
	</body>
</html>