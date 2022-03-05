<?php
function addMessage($email,$message):bool
{
    global $pdo;
    $query = $pdo->prepare( "INSERT INTO messages (email,message) VALUES (:email,:message)");
    $query->bindParam(':email', $email);
    $query->bindParam(':message', $message);
    return $query->execute();
};

function getMessages()
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM messages") ;
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS,"message");
    }
    catch(PDOException $e){
        $e->error_message;
    }
    
    return $result;
};   

function deleteMessage(int $messageId)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM messages WHERE id=$messageId");
    }
    catch(PDOException $e){
        $e->error_message;
    }
    return $query->execute();
}
?>
