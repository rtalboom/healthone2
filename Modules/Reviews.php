<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getReviews(int $product_id)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM reviews WHERE product_id = $product_id");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS, "Review");
    return $result;
}

 function saveReview($name,$stars,$review,$product_id,$user_id):bool
{
    global $pdo;
    $query = $pdo->prepare( "INSERT INTO reviews (name,stars,review,product_id,user_id) VALUES (:name,:stars,:review,:product_id,:user_id)");
    $query->bindParam(':name', $name);
    $query->bindParam(':stars', $stars);
    $query->bindParam(':review', $review);
    $query->bindParam(':product_id', $product_id);
    $query->bindParam(':user_id', $user_id);
    return $query->execute();
}

function getUserReviews(int $user_id)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM reviews WHERE user_id = $user_id");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS, "Review");
    return $result;
}

?>
