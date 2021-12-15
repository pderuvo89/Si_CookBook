<?php
require_once 'connect.php';
// Deletes records from the DB
echo $_POST['deletechoice'];

$stmt = $conn->prepare("SELECT ingredient_id, measure_id
FROM recipeingredient 
WHERE recipe_id = ? ;");

$stmt->bind_param("i", $_POST['deletechoice']);
$stmt->execute();
$result = $stmt->get_result();

$y=0;

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){
$ingredientid[$y] = $row["ingredient_id"];
$measureid[$y] = $row["measure_id"];
echo $ingredientid[$y];
$y++;
}
}else echo "No ROWS FOUND";

$stmt2 = $conn->prepare("DELETE FROM recipeingredient WHERE recipe_id = ?");
$stmt2->bind_param("i", $_POST['deletechoice']);
$stmt2->execute();
$stmt2->close();


$stmt3 = $conn->prepare("DELETE FROM recipe WHERE id = ?");
$stmt3->bind_param("i", $_POST['deletechoice']);
$stmt3->execute();
$stmt3->close();



for($x=0; $x<sizeof($ingredientid);$x++){
    $stmt = $conn->prepare("DELETE FROM ingredient WHERE id = ?");
    $stmt->bind_param("i", $ingredientid[$x]);
    $stmt->execute();
    $stmt->close();
    }
for($x=0; $x<sizeof($measureid);$x++){
    $stmt = $conn->prepare("DELETE FROM measure WHERE id = ?");
    $stmt->bind_param("i", $measureid[$x]);
    $stmt->execute();
    $stmt->close();
    }

header("location:../myprofile.php");
exit();    