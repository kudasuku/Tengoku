<htmL>
<head>
    <title>TENGOKU USER LOGIN </title>
<head>
    <body>
        <?php
        //call file to connect server project
        include("header1.php")
        ?>

        <?php
        //this section processes submission from the login form
        //check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD']== 'POST')
        {
            //validate the userID
            if(!empty($_POST['userID']))
            {
                $id = mysqli_real_escape_string($connect, $_POST['userID']);
            }
            else
            {
                $id=FALSE;
                echo '<p class = "error">You forgot to enter your ID.</p>';
            }
            //validate the userPassword
            if (!empty($_POST['userPassword']))
            {
                $p = mysqli_real_escape_string($connect, $_POST['userPassword']);
            }
            else
            {
                $p = FALSE;
                echo '<p class = "error">You forgot to enter your password.</p>';
            }
            //if no problems
            if ($id && $p)
            {
                //retrieve the userID , userPassword , userName , userPhoneNo , userEmail ,userAddress
                $q = "SELECT userID , userPassword , userName , userPhoneNo , userEmail ,userAddress FROM user WHERE (userID = '$id' AND userPassword = '$p')";

                //run the query and assign in to variable result
                $result = mysqli_query ($connect, $q);

                //count the number of rows that match the adminID/adminPassword combination
                //if one database row (record) matches the input;
                if (@mysqli_num_rows($result) == 1)
                {
                    //start the session, fetch the record and insert the three values in an array
                    session_start();
                    $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<p><a href="http://localhost/project2/homepage.html"></a><p>';

                    // cancel the rest of the script
                    exit();
                    
                    mysqli_free_result ($result);
                    mysqli_close ($connect);
                    //no match was made
                }
                else
                {
                    echo '<p class = "error">The userID and userPassword entered do not match our records 
                    <br> perhaps you need to register, just click the Register Button</p>';
                }
                //if there was a problems
            }
            else
            {
                echo '<p class ="error">Please try again.</p>';
            }
            mysqli_close($connect);
        }//end of submit conditional

        ?>
        <link rel="stylesheet" href="sutail.css">
        <a href="homepage.html" class="logo"><img src="TENGOKULOGO.png"></a>
        <h2 align ="center"style="color: white;"> USER LOGIN </h2>
        <div class="box">
        <div class="container">
        <div class="top-header">

        <form action="userLogin.php" method ="post">
            <div class="input-field">
                <label for="adminID">USER ID :</label>
                <input type = "text" class="input" id ="userID" name="userID" size="4" maxlength="6"
                value="<?php if(isset($POST['userID'])) echo $POST ['userID'];?>">
                
            </div>
            <div class="input-field">
                <label for="userPassword">PASSWORD :</label>
                <input type = "userPassword" class="input" id ="userPassword" name="userPassword" size="15" maxlength="60"
                pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="MUST CONTAIN AT LEAST ONE NUMBER , ONE 
                UPPERCASE, LOWERCASE LETTER AMD 8 OR MORE CHARACTERS"
                required value="<?php if(isset($POST['userPassword'])) echo $POST ['userPassword'];?>">
 
            </div>

            <div class="input-field">
            <div class="bottom">
                <button type = "submit" class="submit">LOGIN</button>
                <button type = "reset" class="submit">RESET</button>
                
            </div>
    </div>
    <br><br>
            <div>
                <label>DONT HAVE AN ACCOUNT?
                    <a href="userRegister.php">SIGN UP</a>
                    
                </label>
                
            </div>
            </form>
    </div>
    </div>
    </div>
</body>
</html>