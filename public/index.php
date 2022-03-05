<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';
require '../Modules/Open_Times.php';
require '../Modules/Reviews.php';
require '../Modules/Users.php';
require '../Modules/Messages.php';

session_start();
$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

if (isset($_SESSION['isLoggedIn'])){
    
} else {
    $_SESSION['isLoggedIn'] = false;
}

if (isset($_GET['category_id'])){
    $id = $_GET['category_id'];
}

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';
        $categories = getCategories();
        include_once "../Templates/categories.php";
        break;

    case 'category':
        $titleSuffix = ' | Category';
        $categories = getCategories();
        $category = getCategoryName($id);
        $products = getProducts($id);
        include_once "../Templates/category.php";
        break;

    case 'profile':
        $titleSuffix = ' | Profiel';
        if(isset($_POST['changeprofilebutton'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $name = filter_input(INPUT_POST, 'name');
            $user_id = $_SESSION['user']->id;
            $target_dir = "../public/img/uploads/";
            $target_file = $target_dir . basename($_FILES["profilepictureupload"]["name"]);
            if($email === false) {
                include_once "../Templates/profile.php";
            } else {
                if (move_uploaded_file($_FILES["profilepictureupload"]["tmp_name"], $target_file)){
                    $succes = changeProfile($name,$email,$target_file,$user_id);
                    $_SESSION['user']->name = $name;
                    $_SESSION['user']->email = $email;
                    $_SESSION['user']->image = $target_file;
                    include_once "../Templates/profile.php";  
                }
            }
        } else {
            include_once "../Templates/profile.php";
        }

        if(isset($_POST['changepasswordbutton'])) {
            $user_id = $_SESSION['user']->id;
            $newPassword = filter_input(INPUT_POST, 'newpassword');
            if($newPassword === true && filter_input(INPUT_POST, 'oldpassword') == $_SESSION['user']->password){
                changePassword($newPassword, $user_id);
            } else {
                $message = "<div class='alert alert-warning' role='alert'> ⚠ Wachtwoord niet correct ingevuld.</div>";
                include_once "../Templates/profile.php";  
            }
        } else {
            include_once "../Templates/profile.php";
        }

        break;
    case 'contact':
        $titleSuffix = ' | Contact';
        if(isset($_POST['verzenden'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $message = filter_input(INPUT_POST, 'message', );
            if($email === false) {
                include_once "../Templates/contact.php";
            } else {
                $succes = addMessage($email,$message);
                include_once "../Templates/contact.php";
            }

        } else {
            include_once "../Templates/contact.php";
        }
        break;
    case 'machine':
        $titleSuffix = ' | Machine';
        $category = getCategoryName($id);
        $product = getProduct($id);
        $reviews = getReviews($id);

        if(isset($_POST['verzenden'])) {
            $title = filter_input(INPUT_POST, 'title');
            $stars = filter_input(INPUT_POST, 'stars');
            $review = filter_input(INPUT_POST, 'review');
            $user = $_SESSION['user'];
            $user_id = $user->id;  
            if($stars === false) {
                include_once "../Templates/machine.php";
            } else {
                $succes = saveReview($title,$stars,$review,$id,$user_id);
                include_once "../Templates/machine.php";
            }
        } else {
            include_once "../Templates/machine.php";
        }
        include_once "../Templates/machine.php";
        break;
    case 'registreren':
        $titleSuffix = ' | Registreren';
        if(isset($_POST['verzenden'])) {
            $name = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', );
            if($email === false) {
                include_once "../Templates/registreren.php";
                $message = "<div class='alert alert-info' role='alert'> ℹ Voer alle velden in.</div>";
            } else {
                $succes = addUser($name,$email,$password);
                $message = "<div class='alert alert-info' role='succes'> ✔ U bent gerigstreerd!</div>";
                include_once "../Templates/login.php";
            }
        } else {
            include_once "../Templates/registreren.php";
        }
        break;
    case 'login':
        $titleSuffix = ' | Login';
        $message = "<div class='alert alert-info' role='alert'> ℹ Voer alle velden in.</div>";
        if(isset($_POST['login'])){
            $result = checkLogin();
            switch ($result){
                case 'ADMIN':
                    $_SESSION["isLoggedIn"] = true;
                    header("location: /admin/home");
                    break;
                case 'MEMBER':
                    $_SESSION["isLoggedIn"] = true;
                    header("location: /home");
                    break;
                case 'FAILURE':
                    $_SESSION["isLoggedIn"] = false;
                    $message = "<div class='alert alert-warning' role='alert'> ⚠ E-mail en/of wachtwoord niet correct ingevuld.</div>";
                    include_once "../Templates/login.php";
                    break;
                case 'INCOMPLETE':
                    $_SESSION["isLoggedIn"] = false;
                    $message = "<div class='alert alert-info' role='alert'> ℹ Check of u alle velden heeft ingevuld.</div>";
                    include_once "../Templates/login.php";
                    break;
            }
        }
        else {
            $message = "<div class='alert alert-info' role='alert'> ℹ Voer uw inloggegevens in om door te gaan.</div>";
            include_once "../Templates/login.php";
        }
        break;
    case 'logout';
        $titleSuffix = ' | Logout';
        $_SESSION["isLoggedIn"] = false;
        include_once ('../Templates/logout.php');
        break;
    case 'admin';
    $titleSuffix = ' | admin';
        include_once ('admin.php');
        break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle()
{
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
