<?php

include "includes/connect.php";

$sql = "DROP TABLE recipeingredient;";

if (mysqli_query($conn, $sql)) {
  echo "Table recipeingredient deleted successfully". "<br>";
} else {
  echo "Error dropping table recipeingredients: " . mysqli_error($conn) . "<br>";
}



$sql = "DROP TABLE ingredient;";

if (mysqli_query($conn, $sql)) {
  echo "Table ingredients deleted successfully". "<br>";
} else {
  echo "Error dropping table ingredients: " . mysqli_error($conn) . "<br>";
}

$sql = "DROP TABLE measure;";

if (mysqli_query($conn, $sql)) {
  echo "Table measure deleted successfully". "<br>";
} else {
  echo "Error dropping table measure: " . mysqli_error($conn) . "<br>";
}

$sql = "DROP TABLE recipe;";

if (mysqli_query($conn, $sql)) {
  echo "Table recipe deleted successfully". "<br>";
} else {
  echo "Error dropping table recipe: " . mysqli_error($conn) . "<br>";
}

$sql = "DROP TABLE users;";

if (mysqli_query($conn, $sql)) {
  echo "Table users deleted successfully". "<br>";
} else {
  echo "Error dropping table users: " . mysqli_error($conn) . "<br>";
}

echo "<br>";
echo "<br>";
echo "<br>";

$sql = "CREATE TABLE ingredient (
    id int(5) NOT NULL,
    name varchar(50) DEFAULT NULL
  );";

if (mysqli_query($conn, $sql)) {
    echo "Table ingredients created successfully". "<br>";
  } else {
    echo "Error creating table ingredients: " . mysqli_error($conn) . "<br>";
  }



  $sql = "CREATE TABLE measure (
    id int(5) NOT NULL,
    name varchar(50) DEFAULT NULL
  );";

if (mysqli_query($conn, $sql)) {
    echo "Table measure created successfully" . "<br>";
  } else {
    echo "Error creating table measure: " . mysqli_error($conn) . "<br>";
  }


  $sql = "CREATE TABLE recipe (
    id int(5) NOT NULL,
    name varchar(50) NOT NULL,
    description varchar(250) NOT NULL,
    instructions varchar(750) NOT NULL,
    user_id int(11) NOT NULL
    );";

if (mysqli_query($conn, $sql)) {
    echo "Table recipe created successfully" . "<br>";
  } else {
    echo "Error creating table recipe : " . mysqli_error($conn) . "<br>";
  }

  $sql = "CREATE TABLE recipeingredient (
    recipe_id int(5) NOT NULL,
    ingredient_id int(5) NOT NULL,
    measure_id int(5),
    amount int(5)
    );";


if (mysqli_query($conn, $sql)) {
    echo "Table recipeingredients created successfully" . "<br>";
  } else {
    echo "Error creating table recipeingredients: " . mysqli_error($conn) . "<br>";
  }  

  $sql = "CREATE TABLE users (
    user_id int(11) NOT NULL,
    user_first varchar(256) NOT NULL,
    user_last varchar(256) NOT NULL,
    user_email varchar(256) NOT NULL,
    user_uid varchar(256) NOT NULL,
    user_pwd varchar(256) NOT NULL
  );";

if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully" . "<br>";
  } else {
    echo "Error creating table users: " . mysqli_error($conn) . "<br>";
  }    

  echo "<br>";
  echo "<br>";
  echo "<br>";

$sql = "ALTER TABLE ingredient
    ADD PRIMARY KEY (id);";

if (mysqli_query($conn, $sql)) {
  echo "Table ingredients altered  successfully". "<br>";
} else {
  echo "Error altering table ingredient: " . mysqli_error($conn) . "<br>";
}  

$sql = "ALTER TABLE measure
    ADD PRIMARY KEY (id);";

if (mysqli_query($conn, $sql)) {
  echo "Table measure altered  successfully". "<br>";
} else {
  echo "Error altering table measure: " . mysqli_error($conn) . "<br>";
}  

$sql = "ALTER TABLE recipe
ADD PRIMARY KEY (id),
ADD KEY fk_userid (user_id);";

if (mysqli_query($conn, $sql)) {
  echo "Table recipe altered  successfully". "<br>";
} else {
  echo "Error altering table recipe: " . mysqli_error($conn) . "<br>";
}  

$sql = "ALTER TABLE recipeingredient
ADD PRIMARY KEY (recipe_id,ingredient_id),
ADD KEY fk_ingredient (ingredient_id),
ADD KEY fk_measure (measure_id);";

if (mysqli_query($conn, $sql)) {
  echo "Table recipeingredient altered  successfully". "<br>";
} else {
  echo "Error altering table recipeingredients: " . mysqli_error($conn) . "<br>";
}  

$sql = "ALTER TABLE users
         ADD PRIMARY KEY (user_id);";

if (mysqli_query($conn, $sql)) {
  echo "Table users altered  successfully". "<br>";
} else {
  echo "Error altering table users: " . mysqli_error($conn) . "<br>";
}  

echo "<br>";
echo "<br>";
echo "<br>";

$sql = "ALTER TABLE ingredient
MODIFY id int(5) NOT NULL AUTO_INCREMENT;";

if (mysqli_query($conn, $sql)) {
  echo "Table ingredient altered  successfully". "<br>";
} else {
  echo "Error altering table ingredient: " . mysqli_error($conn) . "<br>";
} 

$sql = "ALTER TABLE measure
MODIFY id int(5) NOT NULL AUTO_INCREMENT;";

if (mysqli_query($conn, $sql)) {
  echo "Table measure altered  successfully". "<br>";
} else {
  echo "Error altering table measure: " . mysqli_error($conn) . "<br>";
} 

$sql = "ALTER TABLE recipe
MODIFY id int(5) NOT NULL AUTO_INCREMENT;";

if (mysqli_query($conn, $sql)) {
  echo "Table recipe altered  successfully". "<br>";
} else {
  echo "Error altering table recipe: " . mysqli_error($conn) . "<br>";
} 

$sql = "ALTER TABLE users
MODIFY user_id int(5) NOT NULL AUTO_INCREMENT;";

if (mysqli_query($conn, $sql)) {
  echo "Table users altered  successfully". "<br>";
} else {
  echo "Error altering table users: " . mysqli_error($conn) . "<br>";
} 

echo "<br>";
echo "<br>";
echo "<br>";

$sql = "ALTER TABLE recipe
ADD CONSTRAINT fk_userid FOREIGN KEY (user_id) REFERENCES users (user_id);";

if (mysqli_query($conn, $sql)) {
  echo "Table recipe altered  successfully". "<br>";
} else {
  echo "Error altering table recipe: " . mysqli_error($conn) . "<br>";
} 

$sql = "ALTER TABLE recipeingredient
ADD CONSTRAINT fk_ingredient FOREIGN KEY (ingredient_id) REFERENCES ingredient (id),
ADD CONSTRAINT fk_measure FOREIGN KEY (measure_id) REFERENCES measure (id),
ADD CONSTRAINT fk_recipe FOREIGN KEY (recipe_id) REFERENCES recipe (id);";

if (mysqli_query($conn, $sql)) {
  echo "Table recipeingredient altered  successfully". "<br>";
} else {
  echo "Error altering table recipeingredient: " . mysqli_error($conn) . "<br>";
} 

 
?>