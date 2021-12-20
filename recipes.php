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
                # code...
              
              echo "<h2>" . $this->title. "</h2>" ."Created by: " . $this->userId . "<br><br>" . $this->description . "<br><br>" .$this->instructions. "<br>" ;
              
                echo  $this->ingredient[$i]. " - Amount: " . $amount[$i]. " " . $unitOfMeasure[$i] . "<br>";
              
              
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
         $z=0;
         
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
            }   
            
              
        
        else {
            echo "<p>no Rows Found</p>";
        }
        for ($y=0; $y <sizeof($titles);$y++){
            if($rid[$y]!==$rid[$y-1]){
              $Recipes[$y]->title = $titles[$y];
              $Recipes[$y]->userId = $useruid[$y];
              $Recipes[$y]->instructions=$instructions[$y];
              $Recipes[$y]->description =$description[$y];
        
            }
           if($rid[$y] == $rid[$y+1] || $rid[$y]==$rid[$y-1] || $rid[$y] == $rid[0]) {
             $Recipes[$y]->ingredient[$z] = $ingredient[$y]; 
             $Recipes[$y]->amount[$z] = $amount[$y]; 
             $Recipes[$y]->unitOfMeasure[$z] = $unitOfMeasure[$y]; 
              $z++;
        
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
