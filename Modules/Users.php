<?php
function addUser($name,$email,$password):bool
{
    global $pdo;
    $query = $pdo->prepare( "INSERT INTO users (name,password,email,image) VALUES (:name,:password,:email,:image)");
    $query->bindParam(':name', $name);
    $image ="../public/img/nothing.jpeg";
    $query->bindParam(':password', $password);
    $query->bindParam(':email', $email);
    $query->bindParam(':image', $image);
    return $query->execute();
};

function checkLogin():string{
    global $pdo;
        $email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        $password=filter_input(INPUT_POST,'password');
    if ($email!== null && $email !== false && !empty($password)){
        $sql = 'SELECT * FROM users WHERE email = :e AND password =:p';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':e',$email);
        $sth->bindParam(':p',$password);
        $sth->setFetchMode(PDO::FETCH_CLASS,'User');
        $sth->execute();
        $user = $sth->fetch();

        if($user!==false){
            $_SESSION['user']=$user;
            if ($_SESSION['user']->id=="1"){
                return 'ADMIN';
            }
            else{
                return 'MEMBER';
            }
        }
        return 'FAILURE';
    }
    return 'INCOMPLETE';
};

function isAdmin():bool {
    if (isset($_SESSION['user']) &&!empty($_SESSION['user'])){
        $user = $_SESSION['user'];
        if ($user->id == "1") {
            return true;
        }
        else{
            return false;
        }
    }
    return false;
}
function logout() {
    $_SESSION["isLoggedIn"] = false;
    session_unset();
}

function getUsers()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM users") ;
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS,"user");
    }
    catch(PDOException $e){
        $e->error_message;
    }
    
    return $result;
}   

function changePassword($password,$user_id):bool
{
    global $pdo;
    $query = $pdo->prepare("UPDATE users SET password = '$password' WHERE id=$user_id");
    return $query->execute();
};

function changeProfile($name,$email,$target_file,$user_id):bool
{
    global $pdo;
    $query = $pdo->prepare("UPDATE users SET name = '$name', email = '$email', image = '$target_file' WHERE id=$user_id");
    return $query->execute();
};

function deleteUser(int $userId)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM users WHERE id=$userId");
    }
    catch(PDOException $e){
        $e->error_message;
    }
    return $query->execute();
}

function getUserName(int $user_id):string
{
    global $pdo;
    // $query = $pdo->prepare( "SELECT users.name FROM reviews INNER JOIN users ON reviews.user_id=users.id WHERE user_id = $user_id");
    $query = $pdo->prepare("SELECT users.name FROM users WHERE id = $user_id");
    // $result = $query->fetchAll(PDO::FETCH_CLASS, "user");
    return $query->execute();
}