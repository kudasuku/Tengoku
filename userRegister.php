<html>
<head>
<title>TENGOKU USER REGISTER</title>
<head>
<body>
		
		<?php
		//call file to connect to server 
		include ("header1.php");
		?>
		
		<?php
		//this query inserts a record in  table
		//has form been submited
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$error = array (); //initialize an error array
		
		//check for ussrPassword
		if(empty ($_POST ['userPassword']))
		{
			$error [] = 'YOU FORGOT TO ENTER PASSWORD';
		}
		else
		{
			$p=mysqli_real_escape_string($connect,trim($_POST['userPassword']));
		}
		
		//check userName
		if(empty ($_POST ['userName']))
		{
			$error [] = 'YOU FORGOT TO ENTER NAME';
		}
		else
		{
			$n = mysqli_real_escape_string($connect,trim($_POST ['userName']));
		}
		
		//check userPhoneNo
		if(empty ($_POST ['userPhoneNo']))
		{
			$error [] = 'YOU FORGOT TO ENTER PHONE NO';
		}
		else
		{
			$ph = mysqli_real_escape_string($connect,trim($_POST ['userPhoneNo']));
		}
		
		//check userEmail
		if(empty ($_POST ['userEmail']))
		{
			$error [] = 'YOU FORGOT TO ENTER EMAIL';
		}
		else
		{
			$e = mysqli_real_escape_string($connect, trim ($_POST ['userEmail']));
		}

        //check userAddress
		if(empty ($_POST ['userAddress']))
		{
			$error [] = 'YOU FORGOT TO ENTER ADDRESS';
		}
		else
		{
			$ad = mysqli_real_escape_string($connect, trim ($_POST ['userAddress']));
		}
		
		//register the user in database
		//make the query
		$q = "INSERT INTO user (userID, userPassword, userName, userPhoneNo, userEmail, userAddress) 
		VALUES ('','$p', '$n', '$ph', '$e', '$ad')";
		$result = @mysqli_query ($connect, $q);//run the query
		if ($result)//if it runs
		{
			echo'<h1><a href="http://localhost/project2/homepage.html"></a></h1>';
			exit();
		}
		else //if it didnt run message
		{
			echo'<h1> SYSTEM ERROR :( </h1>';
			
			//debugging message
			echo '<p>'.mysqli_error($connect).'<br><br>QUERY : '.$q. '</p>';
		} //end of the (result)
		mysqli_close($connect); //close dataabase connection aborted
		exit();
	}
	
    ?>
    <link rel="stylesheet" href="sutail2.css">
	<a href="homepage.html" class="logo"><img src="TENGOKULOGO.png"></a>
    <h2 align ="center" style="color: white;"> REGISTER NOW AS MEMBER AND GET 50% OFF </h2>
    <div class="box">
    <div class="container">
    <div class="top-header">
                <span><a href="http://localhost/project2/userLogin.php"  style="color: black;" >ALREADY HAVE ACCOUNT?</a></span>
                <span style="color: black;">create your account</span>
                <header  style="color: darkblue;" >SIGN UP</header>
    </div>
    <form action ="http://localhost/promo/" method="post">

    <h4> *required field </h4>
    <div class="input-field">
    <label for ="userPassword" style="color: black;">ENTER PASSWORD: <label>
    <input type ="password" class="input" placeholder="enter your password" id="password" name="userPassword" size="15" maxlength="60" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="MUST CONTAIN AT LEAST ONE NUMBER , ONE 
            UPPERCASE, LOWERCASE LETTER AND 8 OR MORE CHARACTERS"
            required value="<?php if(isset($POST['userPassword'])) echo $POST ['userPassword'];?>">
			
			<!-- An element to toggle between password visibility -->
			<input type="checkbox" onclick="myFunction()">Show Password</input>
			<script>
			function myFunction() {
  			var x = document.getElementById("password");
 			 if (x.type === "password")
			{
    		x.type = "text";
  			}
			else 
			{
    		x.type = "password";
  			}
			}
			</script>
    </div>
    <br>
        <div class="input-field">
            <label for="userName" style="color: black;">ENTER NAME :</label>
            <input type = "text" class="input" placeholder="your full name / username" id ="userName" name="userName" size="30" maxlength="50"required
            value="<?php if(isset($POST['userName'])) echo $POST ['userName'];?>">   
        </div>
        <br>
        <div class="input-field">
            <label for="userPhoneNo" style="color: black;">ENTER PHONE NO (with -) :</label>
            <input type = "tel" class="input" placeholder="enter your phone-No (must contain -)"pattern="[0-9]{3}-[0-9]{7}" id ="userPhoneNo" name="userPhoneNo" size="15" maxlength="20"
            required value="<?php if(isset($POST['userPhoneNo'])) echo $POST ['userPhoneNo'];?>">
        </div>
        <br>
        <div class="input-field">
            <label for="userEmail" style="color: black;">ENTER YOUR EMAIL :</label>
            <input type = "email" class="input" placeholder="enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            id ="userEmail" name="userEmail" size="30" maxlength="50"
            required value="<?php if(isset($POST['userEmail'])) echo $POST ['userEmail'];?>">
        </div>
        <br>
        <div class="input-field">
                <label for="userAddress">ENTER ADDRESS :</label>
                <input type = "text" id ="userAddress"  placeholder="enter your full address" name="userAddress" size="100" maxlength="300"required
                value="<?php if(isset($POST['userAddress'])) echo $POST ['userAddress'];?>">   
        </div>
        <br><br>
        <div class="input-field">
            <button type = "submit" class="submit">REGISTER</button>
            <div class="bottom">
                    <div class="left">
                        <input type="checkbox"  id="check">
                        <label for="check">Remember Me</label>
                    </div>
                    <div class="right">
                        <label><a href="https://www.website.com/forgot-password/?source=SC">Forgot password?</a></label>
                    </div>
            <br><br>
            <button type = "reset">CLEAR ALL</button>  
        </div>  
        </form>
</div>
</div>

</body>
</html>