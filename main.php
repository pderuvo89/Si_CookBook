<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>

<div class="picture-main"></div>
<div class="content2">
  <br />
  <br />
  <div class="intro">
    <?php 
  
    if(isset($_SESSION["useruid"])){
      echo "<p> Welcome, ". $_SESSION["useruid"] ." </p> ";
     
     }
     ?>
    <h1 class="h1-heading">
      Welcome to Staten Island's First Digital Cookbook!
    </h1>
     
    <p>
      Nowadays the idea of sharing a recipe, blog, or fun new cooking
      project with your friends or strangers around the world is
      commonplace. Social media has made it easier than ever to connect
      with people around the world. Yet sometimes it seems like it's
      harder than ever to connect with the people in your own
      neighborhood. Nowadays it seems easier to get a recipe from somebody
      from across the country than across the street. That's why I created
      this page, the Staten Island Community cookbook.
    </p>
    <br />
    <p>
      Before we were liking pictures of eachothers lunch on instagram, our
      grandparents and theirs were sharing their recipes in one of the
      earliest forms of social media : the community cookbook. Part
      recipebook, part history guide, and intensely local, community
      cookbooks were how groups from the turn of the century collected
      community knowldge into one place and distributed them to the
      masses. Groups like churches, group homes, and social clubs would
      compile recipes in these books and the proceeds from sales would be
      used to help fund group activities. Nowadays, these books are some
      of the only historical data we have about these groups, and they
      provide a fascinating windows into how people of a different era
      cook.
    </p>
    <br />
    <p>
      I don't know about you, but I have no clue what my neighbors in
      Staten Island are cooking these days. And I'd love to find out.
      That's why I created this site. Here you can submit an old family
      recipe, a fun twist on an old classic, or something totally new you
      just created in the kitchen! You can also browse recipes submitted
      by other Staten Islanders, and find something new to cook that has
      been a staple of your neighborhood for generations. In the recipes
      section you'll be able to sort recipes by style of cuisine and by
      neighborhood, so if you've ever been curious what the Sri Lankan
      community on the north shore makes on sundays, or what the Irish
      community in West Brighton makes on a weeknight, you'll be able to
      find it here!
    </p>
   

  </div>
</div>
<?php include 'includes/footer.php' ?>
