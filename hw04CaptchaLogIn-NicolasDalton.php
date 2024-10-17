<!DOCTYPE html>
<html>
	<head>
		<title>COSC 4343 Homework #4</title>
	</head>
	<style type="text/css">
    body{text-align:center}

	</style>
	<body bgcolor= AntiqueWhite>
		<h2>PROVE THAT YOU ARE NOT A ROBOT!!</h2> 
    
   
    <div style='margin:15px'> 
        <img src="captcha.php"> 
    </div> 
      
    <form method="POST" action= " <?php echo $_SERVER['PHP_SELF']; ?>"> 
        <input type="text" name="input"/> 
        <input type="hidden" name="flag" value="1"/> 
        <input type="submit" value="Submit" name="submit"/> 
    </form> 
      
    <div style='margin-bottom:5px'> 
        <?php echo $msg; ?> 
    </div> 
      
    <div> 
        Can't read the image? Click 
        <a href='<?php echo $_SERVER['PHP_SELF']; ?>'> 
            here 
        </a> 
        to refresh! 
    </div> 
	<p>
	<?php
  
		session_start(); 
		$msg = ''; 
  
		// If user has given a captcha! 
		if (isset($_POST['input']) && sizeof($_POST['input']) > 0) 
		{
			// If the captcha is valid 
			if ($_POST['input'] == $_SESSION['captcha']) 
			{
				$msg = '<span style="color:green">SUCCESSFUL!!!</span>'; 
			}
			else 
			{
				$msg = '<span style="color:red">CAPTCHA FAILED!!!</span>'; 
			}
			echo $msg;
	
				
				
		}
		if($msg == '<span style="color:green">SUCCESSFUL!!!</span>')
			{
				
				echo "<br>";
				echo "<form method='get' action='logInResults-NicolasDalton.php'";
				echo "<br>";
				echo "User Name: <br>";
				echo "<input type='text' id='user_name' name='user_name'><br><br>";
				echo "Password: <br>";
				echo "<input type='text' id='password' name='password'><br><br>";
				echo "<input type='submit' value= 'Log In'>";
				echo "</form>";
			}
		?>
	</body>
</html>