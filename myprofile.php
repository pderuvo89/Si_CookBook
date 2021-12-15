<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>

<div class="picture-main"></div>
<div class="content3">

  <br />
  <br />
  <div class="myrecipes">
<h1>My Recipes</h1>

<?php
         require_once 'includes/connect.php';

      
                           

 

        
          $x= 0; 

          $stmt = $conn->prepare("SELECT r.name AS 'Recipe', 
          r.id,
          r.description,
          r.instructions, 
          ri.amount AS 'Amount', 
          mu.name AS 'Unit of Measure', 
          i.name AS 'Ingredient' 
         FROM recipe r 
         JOIN recipeingredient ri on r.id = ri.recipe_id 
         JOIN ingredient i on i.id = ri.ingredient_id 
         LEFT OUTER JOIN measure mu on mu.id = measure_id
         WHERE r.user_id = ? ;");
        
        $stmt->bind_param("s", $_SESSION['userid']);
        $stmt->execute();
        $result = $stmt->get_result();

        
        if($result->num_rows > 0){
                           
            while($row = $result->fetch_assoc()){
                  
          

            $titles[$x] = $row["Recipe"];
            $rid[$x] = $row["id"];
            $description[$x] = $row["description"];
            $instructions[$x] = $row["instructions"];
            $amount[$x] = $row["Amount"];
            $unitofmeasure[$x] = $row["Unit of Measure"];
            $ingredient[$x] = $row["Ingredient"];  
            $x++;   


              }
           }   
        
        else {
            echo "<p>no Rows Found</p>";
        }
        for ($y=0; $y <sizeof($titles);$y++){
            if($rid[$y]!==$rid[$y-1]){
        echo "<h2>" .$titles[$y]. "</h2>" . $description[$y] . "<br><br>" . $instructions[$y]. "<br>" ; 
            }
            if($rid[$y] == $rid[$y+1] || $rid[$y]==$rid[$y-1] || $rid[$y] == $rid[0]) {
                echo $ingredient[$y]. " - Amount: " . $amount[$y] . " " . $unitofmeasure[$y] . "<br>";
        
        }
    }

    ?>
    <br>
    <br>



  </div>


</div>

<div class="recipeactionscontainer">
  <br>
  <br>
  <h1>Actions:</h1>
  <p>Delete:</p>
  <form action= 'includes/deleterecipe.inc.php' name='deleteform' id='deleteform' method = 'POST'>
    <select name = "deletechoice">
      <?php

        $stmt2 = $conn->prepare("SELECT r.name AS 'Recipe',
                                        r.id AS 'Rid'
                                FROM recipe r 
                                WHERE r.user_id = ? ;");

        $stmt2->bind_param("s", $_SESSION['userid']);
        $stmt2->execute();
        $result = $stmt2->get_result();

         
        if($result->num_rows > 0){
                          
          while($row = $result->fetch_assoc()){
             $titles2[] = $row["Recipe"];
             $rid2[] = $row["Rid"];
          }
        }

      for($deletelist =0; $deletelist < sizeof($titles2); $deletelist++){
        echo '<option value = "' .$rid2[$deletelist].'">'. $titles2[$deletelist] . '</option>';
      }
      ?>
    </select>
    <input type="hidden" name = "userid" value="<?php $_SESSION['userid']?>" >
    <button type="submit">Submit</button>
  </form>

  <br>
  <br>


  <p>Edit:</p>
  <form action= 'editrecipe.php' name='editform' id='editform' method = 'POST'>
    <select name = "editchoice">
      <?php

        $stmt3 = $conn->prepare("SELECT r.name AS 'Recipe',
                                        r.id AS 'Rid'
                                FROM recipe r 
                                WHERE r.user_id = ? ;");

        $stmt3->bind_param("s", $_SESSION['userid']);
        $stmt3->execute();
        $result = $stmt3->get_result();

         
        if($result->num_rows > 0){
                          
          while($row = $result->fetch_assoc()){
             $titles3[] = $row["Recipe"];
             $rid3[] = $row["Rid"];
          }
        }

      for($editlist =0; $editlist < sizeof($titles2); $editlist++){
        echo '<option value = "' .$rid3[$editlist].'">'. $titles3[$editlist] . '</option>';
      }
      ?>
    </select>
    <input type="hidden" name = "userid" value="<?php $_SESSION['userid']?>" >
    <button type="submit">Submit</button>
  </form>
</div>

<?php include 'includes/footer.php' ?>
