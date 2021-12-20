<?php





function emptyInputSignup($first, $last, $email, $uid, $pwd, $pwdrepeat) {
    // Checks if any of the input fields are empty for signing up a user
    $result;
    if(empty($first) || empty($last) || empty($email) || empty($uid)  || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
} 

function invalidUid($uid) {
    // Regex for rejecting invalid user IDs
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $uid)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
} 

function invalidEmail($email) {
    // Uses phps built in email validator
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
} 

function pwdMatch($pwd,$pwdrepeat) {
    // Checks that the user entered two matching passwords on signup
    $result;
    if($pwd!== $pwdrepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
} 

function uidExists($conn,$uid, $email) {
    // Checks if the user id already exists in the system
    $sql = "SELECT * FROM users WHERE user_uid = ? OR user_email= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uid, $email );
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
} 

function  createUser($conn, $first, $last, $email, $uid, $pwd) {
    
    // Function for creating a new user

    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) 
            VALUES (?, ?, ?, ?, ?) ;" ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $hashedpwd );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
} 

function emptyInputLogin($username,$pwd) {
    // Checks for empty input on the login screen
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
} 

function loginUser($conn, $username, $pwd){
    // Function logs the user into the system
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdhashed = $uidExists["user_pwd"];
    $checkPwd = password_verify($pwd, $pwdhashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["user_id"];
        $_SESSION["useruid"] = $uidExists["user_uid"];
        header("location: ../main.php");
        exit();
    }
}

function enterRecipe($conn, $title, $description, $instructions, $userid){
    
    // Enters the recipe into the recipe table

    
    $sql = "INSERT INTO recipe (name, description, instructions , user_id) 
    VALUES (?, ?, ?, ?) ;" ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../recipes.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $instructions, $userid );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
 
}

function enterIngredients($conn, $ingredient, $measure, $amount, $title){

    // Enters the ingredients into the recipe table , then creates an entry into the recipeingredient
    // table which links the recipe and the ingredient.
    $sql = "INSERT INTO ingredient (name) 
    VALUES (?) ;" ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "s", $ingredient );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "INSERT INTO measure (name) 
    VALUES (?) ;" ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "s", $measure );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT id
    FROM recipe
    WHERE name = ?;";

    $stmt2 = $conn->prepare("SELECT r.id AS 'Rid'
    FROM recipe r 
    WHERE r.name = ? ;");

    $stmt2->bind_param("s", $title);
    $stmt2->execute();
    $result = $stmt2->get_result();


    if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
    $rid = $row["Rid"];
    }
    }
    
    $sql = "SELECT id
    FROM ingredient
    ORDER BY id DESC
    LIMIT 0,1;";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
                              
        while($row = $result->fetch_assoc()){
                 
           $ingredientid = $row["id"];
   
             }
          }

    $sql = "SELECT id
    FROM measure
    ORDER BY id DESC
    LIMIT 0,1;";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
                            
        while($row = $result->fetch_assoc()){
                
            $measureid = $row["id"];
            
    
            }
        }
    $sql = "INSERT INTO recipeingredient (recipe_id,ingredient_id,measure_id,amount) 
    VALUES (?,?,?,?) ;" ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "ssss", $rid, $ingredientid, $measureid, $amount );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    

}

function editRecipe($conn, $title, $description, $instructions, $rid){
    
// Edits an existing recipe table entry
    
    $sql = "UPDATE recipe SET name = ? ,description =? , instructions = ?  WHERE id = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../recipes.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "sssi", $title, $description, $instructions, $rid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

 
}


function editIngredients($conn,$rid, $ingredient, $ingredientid, $measure, $measureid, $amount){

    // Edits an existing ingredient , measure, and recipeingredient entry
    $sql = "UPDATE ingredient SET name = ? WHERE id= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "si", $ingredient, $ingredientid );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "UPDATE measure SET name =? WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "si", $measure, $measureid );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    
    $sql = "UPDATE recipeingredient SET amount= ? WHERE recipe_id = ? AND ingredient_id = ? AND measure_id = ? ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }   


    mysqli_stmt_bind_param($stmt, "siii", $amount, $rid, $ingredientid, $measureid );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    

}