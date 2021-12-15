<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>
<div class="picture-account"></div>
<div class="content2">
  <div class="intro">
    <h1>Account Login</h1>

    <form action="includes/login.inc.php" method="POST">
      <fieldset>
        <img src="images/ravioli.png" height="75" width="75" />
        <br />
        <br />
        <input type="text" name="name" placeholder="Username/E-mail" />
        <br />
        <br />
        <input type="password" name="pwd" placeholder="Password" />
        <br />
        <br />
        <input type="submit" id="submit" />
      </fieldset>
    </form>
    <p><a href="createaccount.php">Sign up for a new account</a></p>
  </div>
</div>
<?php include 'includes/footer.php' ?>
