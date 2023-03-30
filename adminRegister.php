<html>
<head>
<title>TENGOKU ADMIN REGISTER</title>
<head>
<body>
		
		<?php
		//call file to connect to server eLeave
		include ("header.php");
		?>
		
		<?php
		//this query inserts a record in eLeave table
		//has form been submited
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$error = array (); //initialize an error array
		
		//check for adminPassword
		if(empty ($_POST ['adminPassword']))
		{
			$error [] = 'YOU FORGOT TO ENTER PASSWORD';
		}
		else
		{
			$p = mysqli_real_escape_string($connect,trim($_POST ['adminPassword']));
		}
		
		//check adminName
		if(empty ($_POST ['adminName']))
		{
			$error [] = 'YOU FORGOT TO ENTER NAME';
		}
		else
		{
			$n = mysqli_real_escape_string($connect,trim($_POST ['adminName']));
		}
		
		//check adminPhoneNo
		if(empty ($_POST ['adminPhoneNo']))
		{
			$error [] = 'YOU FORGOT TO ENTER PHONE NO';
		}
		else
		{
			$ph = mysqli_real_escape_string($connect,trim($_POST ['adminPhoneNo']));
		}
		
		//check adminEmail
		if(empty ($_POST ['adminEmail']))
		{
			$error [] = 'YOU FORGOT TO ENTER EMAIL';
		}
		else
		{
			$e = mysqli_real_escape_string($connect, trim ($_POST ['adminEmail']));
		}

		//register the admin in database
		//make the query
		$q = "INSERT INTO admin (adminID, adminPassword, adminName, adminPhoneNo, adminEmail) 
		VALUES ('','$p', '$n', '$ph', '$e')";
		$result = @mysqli_query ($connect, $q);//run the query
		if ($result)//if it runs
		{
			echo'<h1>THANKS</h1>';
			exit();
		}
		else //if it didnt run message
		{
			echo'<h1> SYSTEM ERROR </h1>';
			
			//debugging message
			echo '<p>'.mysqli_error($connect).'<br><br>QUERY : '.$q. '</p>';
		} //end of the (result)
		mysqli_close($connect); //close dataabase connection aborted
		exit();
	}
	
		?>
		<link rel="stylesheet" href="sutail2.css">
		<h2 align ="center" style="color: white;"> REGISTER ADMIN </h2>
        <div class="box">
        <div class="container">
        <div class="top-header">
                    <span><a href="loginpage.html"  style="color: black;" >ALREADY HAVE ACCOUNT?</a></span>
                    <span>create your account</span>
                    <header  style="color: darkblue;" >SIGN UP</header>
        </div>
		<form action ="adminRegister.php" method="post">

		<h4> *required field </h4>
        <div class="input-field">
		<label for ="adminPassword" style="color: black;">PASSWORD: <label>
		<input type ="password" class="input" id="password" name="adminPassword" size="15" maxlength="60" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="MUST CONTAIN AT LEAST ONE NUMBER , ONE 
                UPPERCASE, LOWERCASE LETTER AND 8 OR MORE CHARACTERS"
                required value="<?php if(isset($POST['adminPassword'])) echo $POST ['adminPassword'];?>">
		</div>
		<br>
			<div>
                <label for="adminName" style="color: black;">ADMIN NAME :</label>
                <input type = "text" class="input" id ="adminName" name="adminName" size="30" maxlength="50"required
                value="<?php if(isset($POST['adminName'])) echo $POST ['adminName'];?>">   
            </div>
			<br>
            <div>
                <label for="adminPhoneNo" style="color: black;">PHONE NO :</label>
                <input type = "tel" class="input" pattern="[0-9]{3}-[0-9]{7}" id ="adminPhoneNo" name="adminPhoneNo" size="15" maxlength="20"
                required value="<?php if(isset($POST['adminPhoneNo'])) echo $POST ['adminPhoneNo'];?>">
            </div>
			<br>
			<div>
                <label for="adminEmail" style="color: black;">ADMIN EMAIL :</label>
                <input type = "email" class="input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
				id ="adminEmail" name="adminEmail" size="30" maxlength="50"
                required value="<?php if(isset($POST['adminEmail'])) echo $POST ['adminEmail'];?>">
            </div>
			<br>
			
            <div>
                <button type = "submit" class="submit">REGISTER</button>
                <button type = "reset">CLEAR ALL</button>  
            </div>  
            </form>
</div>
</div>

</body>
</html>