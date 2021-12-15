<?php

    // Takes the input from the submit recipe form and sets the information to variables. Then calls the functions to enter the info into the DB
  session_start();
  $userid = $_SESSION["userid"];
if(isset($_POST["submit"])){

    require_once 'connect.php';
    require_once 'functions.inc.php';

    $title = $_POST["title"];
    $description = $_POST["description"];
    $instructions = $_POST["instructions"];

    $ingredient1 = $_POST["ingredient1"];
    $measure1 = $_POST["measure1"];
    $amount1 = $_POST["amount1"];

    $ingredient2 = $_POST["ingredient2"];
    $measure2 = $_POST["measure2"];
    $amount2 = $_POST["amount2"];

    $ingredient3 = $_POST["ingredient3"];
    $measure3 = $_POST["measure3"];
    $amount3 = $_POST["amount3"];

    $ingredient4 = $_POST["ingredient4"];
    $measure4 = $_POST["measure4"];
    $amount4 = $_POST["amount4"];

    require_once 'connect.php';
    require_once 'functions.inc.php';
  
    echo $title ."<br>";
    echo $description."<br>";
    echo $instructions."<br>";
    echo $ingredient1."<br>";
    echo $ingredient2."<br>";
    echo $ingredient3."<br>";
    echo $ingredient4."<br>";

    if(!empty($title)){
    enterRecipe($conn, $title, $description, $instructions, $userid);

    enterIngredients($conn,$ingredient1,$measure1,$amount1, $title);
    if(!empty($ingredient2)){
        enterIngredients($conn,$ingredient2,$measure2,$amount2, $title);
    }
    if(!empty($ingredient3)){
        enterIngredients($conn,$ingredient3,$measure3,$amount3, $title);
    }
    if(!empty($ingredient4)){
        enterIngredients($conn,$ingredient4, $measure4, $amount4, $title);
    }


    header("location: ../recipes.php");
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