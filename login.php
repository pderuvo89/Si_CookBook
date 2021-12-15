<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>
<div class="picture-account"></div>
<div class="content2">
  <div class="intro">
    <h1>Account Login</h1>

    <form action="includes/login.inc.php" method="POST">
        <img src="images/ravioli.png" height="75" width="75" />
        <br />
        <br />
        <input type="text" name="uid" placeholder="Username/E-mail" />
        <br />
        <br />
        <input type="password" name="pwd" placeholder="Password" />
        <br />
        <br />
        <button type="submit" name="submit">Log In</button>
    </form>
    <p><a href="signup.php">Sign up for a new account</a></p>
    <br>
    <br>
    <?php
    if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect Username/Password! </p>";
            }
        }
    ?>
  </div>
</div>
<?php include 'includes/footer.php' ?>
