<htmL>
<head>
    <title>TENGOKU ADMIN LOGIN</title>
<head>
    <body>
        <?php
        //call file to connect server eleave
        include("header.php")
        ?>

        <?php
        //this section processes submission from the login form
        //check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD']== 'POST')
        {
            //validate the adminID
            if(!empty($_POST['adminID']))
            {
                $id = mysqli_real_escape_string($connect, $_POST['adminID']);
            }
            else
            {
                $id=FALSE;
                echo '<p class = "error">You forgot to enter your ID.</p>';
            }
            //validate the adminPassword
            if (!empty($_POST['adminPassword']))
            {
                $p = mysqli_real_escape_string($connect, $_POST['adminPassword']);
            }
            else
            {
                $p = FALSE;
                echo '<p class = "error">You forgot to enter your password.</p>';
            }
            //if no problems
            if ($id && $p)
            {
                //retrieve the adminID , adminPassword , adminName , adminPhoneNo , adminEmail ,userID, leaveID 
                $q = "SELECT adminID , adminPassword , adminName , adminPhoneNo , adminEmail ,userID, leaveID FROM admin WHERE (adminID = '$id' AND adminPassword = '$p')";

                //run the query and assign in to variable result
                $result = mysqli_query ($connect, $q);

                //count the number of rows that match the adminID/adminPassword combination
                //if one database row (record) matches the input;
                if (@mysqli_num_rows($result) == 1)
                {
                    //start the session, fetch the record and insert the three values in an array
                    session_start();
                    $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<p> WELCOME TO eLeave System<p>';

                    // cancel the rest of the script
                    exit();
                    
                    mysqli_free_result ($result);
                    mysqli_close ($connect);
                    //no match was made
                }
                else
                {
                    echo '<p class = "error">The adminID and adminPassword entered do not match our records 
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

        <h2 align ="center"> ADMIN LOGIN </h2>

        <form action="adminLogin.php" method ="post">
            <div>
                <label for="adminID">ADMIN ID :</label>
                <input type = "text" id ="adminID" name="adminID" size="4" maxlength="6"
                value="<?php if(isset($POST['adminID'])) echo $POST ['adminID'];?>">
                
            </div>
            <div>
                <label for="adminPassword">PASSWORD :</label>
                <input type = "adminPassword" id ="adminPassword" name="adminPassword" size="15" maxlength="60"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/{8,}" title="MUST CONTAIN AT LEAST ONE NUMBER , ONE 
                UPPERCASE, LOWERCASE LETTER AMD 8 OR MORE CHARACTERS"
                required value="<?php if(isset($POST['adminPassword'])) echo $POST ['adminPassword'];?>">
 
            </div>

            <div>
                <button type = "submit">LOGIN</button>
                <button type = "reset">RESET</button>
                
            </div>
            <div>
                <label>DONT HAVE AN ACCOUNT?
                    <a href="adminRegister.php">SIGN UP</a>
                    
                </label>
                
            </div>
    </form>
</body>
</html>
