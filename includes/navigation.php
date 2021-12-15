<header>
  <h1 class="logo">Community Cookbook</h1>
  <nav>
    <ul>
      <li><a href="main.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="recipes.php">Recipes</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php
        if(isset($_SESSION["useruid"])){
          echo " <li><a href='myprofile.php'>My Profile</a></li> ";
          echo " <li><a href='includes/logout.inc.php'>Log out</a><li> ";
         }
         else{
          echo "<li><a href='signup.php'>Sign Up</a></li>";
          echo "<li><a href='login.php'>Log in</a><li>";
         }
      ?>
    </ul>
  </nav>
</header>
