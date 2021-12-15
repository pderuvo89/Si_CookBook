

<?php

  session_start();
  $userid = $_SESSION["userid"];
if(isset($_POST["submit"])){

    require_once 'connect.php';
    require_once 'functions.inc.php';

    // Takes in values from the edit form, assigns them to variables, then calls the edit functions to edit the entries.
    $rid = $_POST["recipeid"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $instructions = $_POST["instructions"];

    $ingredient1 = $_POST["ingredient1"];
    $ingredientid1 =$_POST["ingredientid1"];
    $measure1 = $_POST["measure1"];
    $measureid1 = $_POST["measureid1"];
    $amount1 = $_POST["amount1"];

    $ingredient2 = $_POST["ingredient2"];
    $ingredientid2 =$_POST["ingredientid2"];
    $measure2 = $_POST["measure2"];
    $measureid2 = $_POST["measureid2"];
    $amount2 = $_POST["amount2"];

    $ingredient3 = $_POST["ingredient3"];
    $ingredientid3 =$_POST["ingredientid3"];
    $measure3 = $_POST["measure3"];
    $measureid3 = $_POST["measureid3"];
    $amount3 = $_POST["amount3"];

    $ingredient4 = $_POST["ingredient4"];
    $ingredientid4 =$_POST["ingredientid4"];
    $measure4 = $_POST["measure4"];
    $measureid4 = $_POST["measureid4"];
    $amount4 = $_POST["amount4"];

    require_once 'connect.php';
    require_once 'functions.inc.php';
  
    echo $rid;
    echo $title ."<br>";
    echo $description."<br>";
    echo $instructions."<br>";
    echo $ingredient1."<br>";
    echo $ingredient2."<br>";
    echo $ingredient3."<br>";
    echo $ingredient4."<br>";

    if(!empty($title)){
    editRecipe($conn, $title, $description, $instructions, $rid);
    editIngredients($conn,$rid,$ingredient1,$ingredientid1,$measure1,$measureid1, $amount1);
    if(!empty($ingredient2)){
        editIngredients($conn,$rid,$ingredient2,$ingredientid2,$measure2,$measureid2,$amount2);
    }
    if(!empty($ingredient3)){
        editIngredients($conn,$rid,$ingredient3,$ingredientid3, $measure3,$measureid3,$amount3);
    }
    if(!empty($ingredient4)){
        editIngredients($conn,$rid,$ingredient4,$ingredientid4,$measure4,$measureid4,$amount4);
    }
    


    header("location:../myprofile.php");
    exit();
    } else{
        header("location: ../submitrecipe.php?error=emptyinput");
    exit();
    }
    }
    else {
    header("location: ../login.php");
    exit();


}