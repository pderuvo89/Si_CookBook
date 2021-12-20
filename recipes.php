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

         function my_sort($a,$b)
         {
         if ($a==$b) return 0;
         return ($a<$b)?-1:1;
         }
         
         

          class Recipe{
            public $title;
            public $recipeId;
            public $description;
            public $instructions;
            public $amount = array();
            public $unitOfMeasure= array();
            public $ingredient = array();
            public $userId;

            public function displayRecipe(){
              if ($this->title!= "") {
              
              echo "<h2>" . $this->title. "</h2>" ."Created by: " . $this->userId . "<br><br>" . $this->description . "<br><br>" ;
             for ($i=0; $i <sizeof($this->ingredient) ; $i++) { 
               echo "-". $this->ingredient[$i] . ": " . $this->amount[$i]. " " . $this->unitOfMeasure[$i] . "<br>";
             } 
              echo  "<br><br>" .$this->instructions. "<br><br>";
            }
            }
          }

          
      
          
          
        
          $Recipes[] = array();
                           
          $sql = "SELECT r.name AS 'Recipe', 
          r.id,
          r.instructions,
          r.description, 
          u.user_uid As 'User'
         FROM recipe r        
         JOIN users u on r.user_id = u.user_id;";
         $result = $conn->query($sql);
         $x= 0;
         if($result->num_rows > 0){
                            
             while($row = $result->fetch_assoc()){
              
             $Recipes[$x]= new Recipe();

             $titles[$x] = $row["Recipe"];
             $rid[$x] = $row["id"];  
             $instructions[$x] = $row["instructions"];
             $description[$x] = $row["description"];
             $useruid[$x] =$row["User"];
             $x++;   
 
 
               }
            } else {
                      echo "<p>no Rows Found</p>";
                    }
        for ($y=0; $y <sizeof($titles);$y++){
            if($rid[$y]!==$rid[$y-1]){
              $Recipes[$y]->title = $titles[$y];
              $Recipes[$y]->userId = $useruid[$y];
              $Recipes[$y]->instructions=$instructions[$y];
              $Recipes[$y]->description =$description[$y];
              $Recipes[$y]->recipeId = $rid[$y];
              
              
            }
         
        }
        foreach ($Recipes as $value) {
         
        
        $rid = $value->recipeId;
        $count=0;  
        $sql = "SELECT 
        i.name AS 'Ingredient',
        ri.amount AS 'Amount',
        mu.name AS 'Unit of Measure',
        u.user_uid AS 'User'
        FROM recipe r
        JOIN recipeingredient ri ON r.id = ri.recipe_id
        JOIN ingredient i on i.id = ri.ingredient_id
        JOIN users u on r.user_id = u.user_id
        LEFT OUTER JOIN measure mu on mu.id = measure_id
        WHERE r.id = ?;";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $rid);
        $stmt->execute();
        $result = $stmt->get_result();


        if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
          $value->ingredient[$count] = $row["Ingredient"];
          $value ->amount[$count] = $row["Amount"];
          $value ->unitOfMeasure[$count] = $row["Unit of Measure"]; 
          $count++;
        }
      }

         }



         
        
        
      
  

   usort($Recipes, "my_sort");
    foreach ($Recipes as $value) {
      $value->displayRecipe();
    }



    ?>
  <br>

  </div>
</div>
<?php include 'includes/footer.php' ?>
