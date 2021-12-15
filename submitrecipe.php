<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>

<div class="picture-main"></div>
<div class="content2">
  <br />
  <br />
  <div class="recipes">
    <h1> Add a new recipe </h1>
    <?php 
    // Checks if the user is logged in. If they are the form will display, if they aren't they wil see an error message.
    if(isset($_SESSION["useruid"])){
    echo "<form action= 'includes/submitrecipe.inc.php' name='recipeform' id='recipeform' method = 'POST'> ";

    echo    '<input type ="text" name="title" placeholder="Recipe Title">';
    echo    '<br>';
    echo    '<input type="text" name=" description" placeholder="Recipe Description">';
    echo    '<br>';
    echo    '<textarea name="instructions" placeholder="Recipe instructions (750)" rows="10" cols="25"></textarea>';
    echo    '<p>How many ingredients?</p>';
    echo    '<select name="numingredients" id="numingredients" onchange="showdiv()">';
    echo     '    <option value=" "></option>' ;   
    echo     '   <option value="1">1</option>';
    echo     '   <option value="2">2</option>';
    echo        '<option value="3">3</option>';
    echo        '<option value="4">4</option>';
    echo      '</select>';
    echo        '<div id="ingredienthider">';
    echo            '<input type="text" name="ingredient1" id="ingredient1" placeholder="Ingredient 1" style="display: none">';
    echo                ' <input type="text" name="amount1" id="amount1" placeholder="Amount" style="display: none">';
    echo                '  <input type="text" name="measure1" id="measure1" placeholder="Measure eg. tablespoon,pound,cup etc." style="display: none">';
    echo "<br>";
    echo            '<input type="text" name="ingredient2" id="ingredient2" placeholder="Ingredient 2" style="display: none">';
    echo                ' <input type="text" name="amount2" id="amount2" placeholder="Amount" style="display: none">';
    echo                '  <input type="text" name="measure2" id="measure2" placeholder="Measure eg. tablespoon,pound,cup etc." style="display: none">';
    echo "<br>";
    echo            '<input type="text" name="ingredient3" id="ingredient3" placeholder="Ingredient 3" style="display: none">';
    echo                ' <input type="text" name="amount3" id="amount3" placeholder="Amount" style="display: none">';
    echo                 '  <input type="text" name="measure3" id="measure3" placeholder="Measure eg. tablespoon,pound,cup etc." style="display: none">';
    echo "<br>";    
    echo            '<input type="text" name="ingredient4" id="ingredient4" placeholder="Ingredient 4" style="display: none">';
    echo                  ' <input type="text" name="amount4" id="amount4" placeholder="Amount" style="display: none">';
    echo                 '  <input type="text" name="measure4" id="measure4" placeholder="Measure eg. tablespoon,pound,cup etc." style="display: none">';
    echo        '</div>';
    echo      '<button type="submit" name="submit">Submit!</button>';
    echo '</form>';
    }
    else echo "<p> Please Log in before submitting recipes!</p>";

    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }

    }

    ?>
  </div>
</div>

<script>
    function showdiv(){
        if (document.getElementById('numingredients').value == 4){
            document.getElementById('ingredient1').style.display ="block";
            document.getElementById('ingredient2').style.display ="block";
            document.getElementById('ingredient3').style.display ="block";
            document.getElementById('ingredient4').style.display ="block";

            document.getElementById('measure1').style.display ="block";
            document.getElementById('measure2').style.display ="block";
            document.getElementById('measure3').style.display ="block";
            document.getElementById('measure4').style.display ="block";

            document.getElementById('amount1').style.display ="block";
            document.getElementById('amount2').style.display ="block";
            document.getElementById('amount3').style.display ="block";
            document.getElementById('amount4').style.display ="block";

        }else if(document.getElementById('numingredients').value == 3){
            document.getElementById('ingredient1').style.display ="block";
            document.getElementById('ingredient2').style.display ="block";
            document.getElementById('ingredient3').style.display ="block";
            document.getElementById('ingredient4').style.display ="none";

            document.getElementById('measure1').style.display ="block";
            document.getElementById('measure2').style.display ="block";
            document.getElementById('measure3').style.display ="block";
            document.getElementById('measure4').style.display ="none";

            document.getElementById('amount1').style.display ="block";
            document.getElementById('amount2').style.display ="block";
            document.getElementById('amount3').style.display ="block";
            document.getElementById('amount4').style.display ="none";
        } else if(document.getElementById('numingredients').value == 2){
            document.getElementById('ingredient1').style.display ="block";
            document.getElementById('ingredient2').style.display ="block";
            document.getElementById('ingredient3').style.display ="none";
            document.getElementById('ingredient4').style.display ="none";

            document.getElementById('measure1').style.display ="block";
            document.getElementById('measure2').style.display ="block";
            document.getElementById('measure3').style.display ="none";
            document.getElementById('measure4').style.display ="none";

            document.getElementById('amount1').style.display ="block";
            document.getElementById('amount2').style.display ="block";
            document.getElementById('amount3').style.display ="none";
            document.getElementById('amount4').style.display ="none";
        } else if(document.getElementById('numingredients').value == 1){
            document.getElementById('ingredient1').style.display ="block";
            document.getElementById('ingredient2').style.display ="none";
            document.getElementById('ingredient3').style.display ="none";
            document.getElementById('ingredient4').style.display ="none";

            document.getElementById('measure1').style.display ="block";
            document.getElementById('measure2').style.display ="none";
            document.getElementById('measure3').style.display ="none";
            document.getElementById('measure4').style.display ="none";

            document.getElementById('amount1').style.display ="block";
            document.getElementById('amount2').style.display ="none";
            document.getElementById('amount3').style.display ="none";
            document.getElementById('amount4').style.display ="none";
        }
    }


</script>
<?php include 'includes/footer.php' ?>
