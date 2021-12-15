<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>

<div class="picture-contact"></div>
<div class="content2">
  <div class="intro">
    <h1>Contact Us</h1>
    <p>You can Use this form to contact us for help with the site or give us feedback. Alternatively, we can be reached
      via the following email: </p>
    <br>
    <a href="mailto:peterderuvo@gmail.com">peterderuvo@gmail.com</a>

    <?php echo ("<h2>Feedback and Help</h2>") ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
      <select name="formchoice">
        <option value="0">Select</option>
        <option value="1">Feedback</option>
        <option value="2">Help Request</option>
      </select>
      <input type="submit" name="s" />

    </form>
    <br />
    <?php if (array_key_exists('s', $_GET))  {
                $option = $_GET['formchoice'];
      
                switch($option){
                    case "0": echo ("<p>Please select an option!</p>");  break;
                    case "1": echo file_get_contents("feedbackform.html"); break;
                    case "2": echo file_get_contents("helpform.html");  break;
                }
            } ?>
  </div>
</div>
<?php include 'includes/footer.php' ?>
