<?php include 'includes/header.php' ?>
<?php include  'includes/navigation.php' ?>

<div class="picture-main"></div>
<div class="content3">

  <br />
  <br />
  <div class="myrecipes">
<?php
  require_once 'includes/connect.php';

      
                           

 

        
$x= 0; 

$stmt = $conn->prepare("SELECT r.name AS 'Recipe', 
                        r.id,
                        r.description,
                        r.instructions, 
                        ri.amount AS 'Amount', 
                        mu.name AS 'Unit of Measure', 
                        mu.id AS 'Unit of Measureid',
                        i.id AS 'Ingredientid',
                        i.name AS 'Ingredient' 
                        FROM recipe r 
                        JOIN recipeingredient ri on r.id = ri.recipe_id 
                        JOIN ingredient i on i.id = ri.ingredient_id 
                        LEFT OUTER JOIN measure mu on mu.id = measure_id
                        WHERE r.id = ? ;");

$stmt->bind_param("s", $_POST['editchoice']);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows > 0){
                 
  while($row = $result->fetch_assoc()){
        


  $title = $row["Recipe"];
  $rid = $row["id"];
  $description = $row['description'];
  $instructions = $row["instructions"];
  $amount[$x] = $row["Amount"];
  $measureid[$x] = $row["Unit of Measureid"];
  $unitofmeasure[$x] = $row["Unit of Measure"];
  $ingredientid[$x] = $row["Ingredientid"];
  $ingredient[$x] = $row["Ingredient"];  
  $x++;  

    }
 }   

else {
  echo "<p>no Rows Found</p>";
}
  ?>
<h2>Edit your recipe</h2>
 <form action= 'includes/editrecipe.inc.php' name='recipeform' id='recipeform' method = 'POST'> 

        <input type ="text" name="title" value="<?php echo $title ?>">
       <br>
        <input type="text" name=" description" value="<?php echo $description ?>">
        <br>
        <textarea name="instructions"rows="10" cols="15"><?php echo $instructions ?></textarea>
        <p>Ingredients:</p>
        <br>
            <div id="ingredienthider">
                <input type="text" name="ingredient1" id="ingredient1" value="<?php echo $ingredient[0] ?>" > <br>
                     <input type="text" name="amount1" id="amount1" value="<?php echo $amount[0] ?>"> <br>
                      <input type="text" name="measure1" id="measure1" value="<?php echo $unitofmeasure[0] ?>">
                      <input type="hidden" name= "ingredientid1" value = "<?php echo $ingredientid[0] ?>">
                      <input type="hidden" name ="measureid1" value = "<?php echo $measureid[0] ?>">
                      <br> <br>

                <input type="text" name="ingredient2" id="ingredient2" value="<?php echo $ingredient[1] ?>"> <br>
                     <input type="text" name="amount2" id="amount2" value="<?php echo $amount[1] ?>"> <br>
                      <input type="text" name="measure2" id="measure2" value="<?php echo $unitofmeasure[1] ?>">
                      <input type="hidden" name= "ingredientid2" value = "<?php echo $ingredientid[1] ?>">
                      <input type="hidden" name ="measureid2" value = "<?php echo $measureid[1] ?>">
                      <br> <br>

                <input type="text" name="ingredient3" id="ingredient3" value="<?php echo $ingredient[2] ?>"> <br>
                     <input type="text" name="amount3" id="amount3" value="<?php echo $amount[2] ?>"> <br>
                       <input type="text" name="measure3" id="measure3" value="<?php echo $unitofmeasure[2] ?>">
                       <input type="hidden" name= "ingredientid3" value = "<?php echo $ingredientid[2] ?>">
                      <input type="hidden" name ="measureid3" value = "<?php echo $measureid[2] ?>">
                       <br> <br>

                <input type="text" name="ingredient4" id="ingredient4" value="<?php echo $ingredient[3] ?>"> <br>
                       <input type="text" name="amount4" id="amount4" value="<?php echo $amount[3] ?>"> <br>
                       <input type="text" name="measure4" id="measure4" value="<?php echo $unitofmeasure[3] ?>">
                       <input type="hidden" name= "ingredientid4" value = "<?php echo $ingredientid[3] ?>">
                      <input type="hidden" name ="measureid4" value = "<?php echo $measureid[3] ?>">
                       <br> <br>
            </div>
        <input type ="hidden" name= "recipeid" value = "<?php echo $rid ?>">



          <button type="submit" name="submit">Submit!</button>
     </form>

  </div>
</div>

<?php include 'includes/footer.php' ?>