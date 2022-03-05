<?php
global $params;
$products = getAllProducts();
$users = getUsers();
$messages = getMessages();
$categories = getCategories();


if (!isAdmin()){
    logout();
    header("location:/home");

}   else {
    switch ($params[2]) {
        case 'users':
            $titleSuffix = ' | Gebruikers';
            
            if(isset($_POST['delete'])) {
                $userId = filter_input(INPUT_POST, 'userId');
                if($userId === false) {
                    $message = "<div class='alert alert-info' role='alert'> ℹ De formulier staat leeg.</div>";
                    include_once "../Templates/admin/users.php";
                } else {
                    $succes = deleteUser($userId);
                    $message = "<div class='alert alert-success' role='alert'> ✔ Machine succesvol gedelete.</div>";
                    include_once "../Templates/admin/users.php";
                }
            }   else {
                include_once "../Templates/admin/users.php";
            }
            break;
        case 'edit':
            $titleSuffix = ' | Edit Machine';
            $currentMachine = getProduct($_GET['productId']);

            if(isset($_POST['editmachinebutton'])) {
                $name = filter_input(INPUT_POST, 'name');
                $description = filter_input(INPUT_POST, 'description');
                $category_id = filter_input(INPUT_POST, 'categoryid');
                $productId = $currentMachine->id;
                $target_dir = "../public/img/uploads/";
                $target_file = $target_dir . basename($_FILES["editmachineupload"]["name"]);
                if($name === false) {
                    include_once "../Templates/admin/edit.php";
                } else {
                    if (move_uploaded_file($_FILES["editmachineupload"]["tmp_name"], $target_file)){
                        $succes = changeProduct($name,$description,$category_id,$target_file,$productId);
                        $currentMachine->name = $name;
                        $currentMachine->description = $description;
                        $currentMachine->image = $target_file;
                        $currentMachine->category_id = $category_id;
                        include_once "../Templates/admin/edit.php"; 
                    }
                }
            } else {
                include_once "../Templates/admin/edit.php";
            }
            break;
        case 'messages':
            $titleSuffix = ' | Messages';

            if(isset($_POST['delete'])) {
                $messageId = filter_input(INPUT_POST, 'messageId');
                if($messageId === false) {
                    $message = "<div class='alert alert-info' role='alert'> ℹ De formulier staat leeg.</div>";
                    include_once "../Templates/admin/messages.php";
                } else {
                    $succes = deleteMessage($messageId);
                    $message = "<div class='alert alert-success' role='alert'> ✔ Machine succesvol gedelete.</div>";
                    include_once "../Templates/admin/messages.php";
                }
            }   else {
                include_once "../Templates/admin/messages.php";
            }
            break;
        case 'logout':
            logout();
            include_once "../Templates\logout.php";
            break;
        default:
            $titleSuffix = ' | Control Center';
            $message = "<div class='alert alert-success' role='alert'> ✔ Machines succesvol opgehaald.</div>";

            if(isset($_POST['delete'])) {
                $productId = filter_input(INPUT_POST, 'productId');
                if($productId === false) {
                    $message = "<div class='alert alert-info' role='alert'> ℹ De formulier staat leeg.</div>";
                    include_once "../Templates/admin/machines.php";
                } else {
                    $succes = deleteProduct($productId);
                    $message = "<div class='alert alert-success' role='alert'> ✔ Machine succesvol gedelete.</div>";
                    include_once "../Templates/admin/machines.php";
                }
            }   else {
                include_once "../Templates/admin/machines.php";
            }

            if(isset($_POST['addmachinebutton'])) {
                $target_dir = "../public/img/uploads/";
                $target_file = $target_dir . basename($_FILES["machineimageupload"]["name"]);
                $name = filter_input(INPUT_POST, 'name');
                $description = filter_input(INPUT_POST, 'description');
                $category_id = filter_input(INPUT_POST, 'categoryid');
                if($name === false) {                    
                    $message = "<div class='alert alert-info' role='alert'> ℹ De formulier staat leeg.</div>";
                    include_once "../Templates/admin/machines.php";
                } else {
                    if (move_uploaded_file($_FILES["machineimageupload"]["tmp_name"], $target_file)){
                        $succes = addProduct($name,$description,$target_file,$category_id); 
                        $message = "<div class='alert alert-success' role='alert'> ✔ Item succesvol toegevoegd.</div>";  
                    } else {
                        $message = "<div class='alert alert-warning' role='alert'> ⚠ Oeps! Er was een error.</div>";
                    }
                    include_once "../Templates/admin/machines.php";
                }
            }

            if(isset($_POST['addcategorybutton'])) {
                $target_dir = "../public/img/uploads/";
                $target_file = $target_dir . basename($_FILES["categoryimageupload"]["name"]);
                $name = filter_input(INPUT_POST, 'categoryName');
                $description = filter_input(INPUT_POST, 'categoryDescription');
                if($name === false) {                    
                    $message = "<div class='alert alert-info' role='alert'> ℹ De formulier staat leeg.</div>";
                    include_once "../Templates/admin/machines.php";
                } else {
                    if (move_uploaded_file($_FILES["categoryimageupload"]["tmp_name"], $target_file)){
                        $succes = addCategory($name,$description,$target_file); 
                        $message = "<div class='alert alert-success' role='alert'> ✔ Item succesvol toegevoegd.</div>";  
                    } else {
                        $message = "<div class='alert alert-warning' role='alert'> ⚠ Oeps! Er was een error.</div>";
                    }
                    include_once "../Templates/admin/machines.php";
                }
            }
            break;
    }
}