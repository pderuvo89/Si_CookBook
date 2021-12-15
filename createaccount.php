<?php include 'header.php' ?>

  <body>
    <div class="grid-container">
      <div class="picture-main"></div>
      <div class="content2">
        <div class="intro">
            <h1> Account Creation</h1>
            <p>Please fill out the following forms to get started submitting recipes today!</p>
          <form action="signup.php" method="POST">
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
            <button type="submit" name="submit">Sign Up</button>
          </form>
        </div>
      </div>
      <?php include 'footer.php' ?>
    </div>
  </body>
</html>
