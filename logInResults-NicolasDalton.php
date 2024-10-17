<!DOCTYPE html>
<html>
	<body bgcolor= AntiqueWhite>
		<?php	
			$clearanceOfUser = "";
				if (sizeof($_GET['user_name']) > 0 && sizeof($_GET['password']) > 0)
				{
					//CONNECT TO DATABASE
					$servername = "localhost";
					$username = "root";
					$password = "COSC4343";
					$dbname = "UserAccountsDB";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) 
					{
						die("Connection failed: " . mysqli_connect_error());
					}
					echo "Connection to database was successful! <br>";
					//STORE USERNAME AND HASH PASSWORD
					$user_name = $_GET["user_name"];
					$hash_password = md5($_GET["password"]);
					//QUERY STATEMENT
					$sql = "SELECT user_id, user_name, password, clearance from UserAccounts where user_name = 
					'".$user_name."' AND  password = '".$hash_password."'";
					$result = mysqli_query($conn, $sql);
					
					if (mysqli_num_rows($result) > 0)
					{
						$myArray = array();
						// output data of in an array
						while($row = mysqli_fetch_assoc($result))
						{
							$myArray[] = $row["clearance"];
						}
						$clearanceOfUser = $myArray[0];
						echo "Log in Successful!";
						if(sizeof($clearanceOfUser) > 0)
						{
							echo "<form method='get' action='secretFiles-NicolasDalton.php'>";
							echo "<input type='hidden' name='varname' value= $clearanceOfUser>";
							echo "<input type='submit' value= 'Click here to see your files'>";
							echo "</form>"; 
						}
					}
					
					else
					{
						echo "However, We cannot find user account";
					}
					
					mysqli_close($conn);
				}
				else
				{
					echo "You must type in a Username and password";
					
				}
			
		?>
	</body>
</html>
			