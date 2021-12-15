<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>
<div class="picture-main"></div>
<div class="content2">
  <br />
  <br />
  <div class="recipes">
      <a class = "pure-button submit" href= "submitrecipe.php">Submit a recipe</a>  
      <h1>Community Recipes</h1>

    <?php
         require_once 'includes/connect.php';

          class Recipe{
            public $title;
            public $recipeId;
            public $description;
            public $instructions;
            public $amount;
            public $unitOfMeasure;
            public $ingredient = array();
            public $userId;

          }
        
          $Recipes = array();
                           
         $sql = "SELECT r.name AS 'Recipe', 
         r.id,
         r.description,
         r.instructions, 
         u.user_uid As 'User'
        FROM recipe r 
        JOIN users u on r.user_id = u.user_id";
        $result = $conn->query($sql);
        $x= 0; 

        
        if($result->num_rows > 0){
                           
            while($row = $result->fetch_assoc()){
                  
              $Recipes[$x] = new Recipe();
              
            $Recipes[$x]->$title = $row["Recipe"];
            echo $Recipes[$x]->$title;
            $Recipes[$x]->$recipeId = $row["id"];
            $Recipes[$x]->$description = $row["description"];
            $Recipes[$x]->$instructions = $row["instructions"];
            $Recipes[$x]->$amount = $row["Amount"];
            $Recipes[$x]->$unitOfMeasure = $row["Unit of Measure"];
            $Recipes[$x]->$ingredient[$x] = $row["Ingredient"];  
            $Recipes[$x]->$userId =$row["User"];
            $x++;   

            }
           }   
        
        else {
            echo "<p>no Rows Found</p>";
        }
       // for ($y=0; $y <sizeof($titles);$y++){
       //     if($rid[$y]!==$rid[$y-1]){
       // echo "<h2>" .$titles[$y]. "</h2>" ."Created by: " . $useruid[$y] . "<br><br>" . $description[$y] . "<br><br>" . $instructions[$y]. "<br>" ; 
       //     }
       //     if($rid[$y] == $rid[$y+1] || $rid[$y]==$rid[$y-1] || $rid[$y] == $rid[0]) {
       //         echo $ingredient[$y]. " - Amount: " . $amount[$y] . " " . $unitofmeasure[$y] . "<br>";
        
       // }
    //}
    //    foreach($Recipes as $recipe){
    //      echo "<h2>" . $recipe->$instructions . "</h2>";
    //    }


    ?>


  </div>
</div>
<?php include 'includes/footer.php' ?>
