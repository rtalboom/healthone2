<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM products WHERE category_id = $categoryId") ;
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS,"Product");
    }
    catch(PDOException $e){
        $e->error_message;
    }
    return $result;
}

function getProduct(int $productId)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM products WHERE id=$productId") ;
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS,"Product")[0];
    }
    catch(PDOException $e){
        $e->error_message;
    }
    
    return $result;
}   

function getAllProducts()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT p.id as id, p.image as image, p.description as description, p.name as name, p.category_id as category_id, c.name as category
        FROM products p join categories c ON (p.category_id = c.id)");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS,"Product");
    }
    catch(PDOException $e){
        $e->error_message;
    }
    return $result;
}

function deleteProduct(int $productId)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM products WHERE id=$productId");
    }
    catch(PDOException $e){
        $e->error_message;
    }
    return $query->execute();
}

function addProduct($name,$description,$target_file,$category_id):bool
{
    global $pdo;
    $query = $pdo->prepare( "INSERT INTO products (name,description,image,category_id) VALUES (:name,:description,:image,:category_id)");
    $query->bindParam(':name', $name);
    $query->bindParam(':description', $description);
    $query->bindParam(':image', $target_file);
    $query->bindParam(':category_id', $category_id);
    return $query->execute();
};

function changeProduct($name,$description,$target_file,$category_id,$productId):bool
{
    global $pdo;
    $query = $pdo->prepare("UPDATE products SET name = '$name', description = '$description', image = '$target_file', category_id = '$category_id' WHERE id=$productId");
    return $query->execute();
};