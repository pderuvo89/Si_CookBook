<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>
<div class="picture-main"></div>
<div class="content2">
    <div class="intro">
        <h1> Account Creation</h1>
        <p>Please fill out the following forms to get started submitting recipes today!</p>
        <form action="includes/signup.inc.php" method="POST">
            <input type="text" name="first" placeholder="First name" />
            <br />
            <input type="text" name="last" placeholder="Last name" />
            <br />
            <input type="text" name="email" placeholder="E-Mail" />
            <br />
            <input type="text" name="uid" placeholder="User name" />
            <br />
            <input type="password" name="pwd" placeholder="Password" />
            <br />
            <input type="password" name="pwdrepeat" placeholder="Password" />
            <br />
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"]== "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"]== "invaliduid"){
                echo "<p>Username contains invalid charecters! Please choose another. </p>";
            }
            else if ($_GET["error"]== "invalidemail"){
                echo "<p>Email is not in the proper format! Please Try agian. </p>";
            }
            else if ($_GET["error"]== "passwordnomatch"){
                echo "<p>Passwords Don't match! Please Try again! </p>";
            }
            else if ($_GET["error"]== "usernametaken"){
                echo "<p>Username already exists! Please choose another. </p>";
            }
            else if ($_GET["error"]== "passwordnomatch"){
                echo "<p>Passwords Don't match! Please Try again! </p>";
            }
            else if ($_GET["error"]== "stmtfailed"){
                echo "<p>Something went wrong, try again!</p>";
            }
            else if ($_GET["error"]== "none"){
                echo "<p>You have signed up! </p>";
            }
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php' ?>
