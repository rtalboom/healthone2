<?php
function getShophours()
{
    global $pdo;
    $query=$pdo->prepare("SELECT * FROM shophours");
    $query->execute();
    $result=$query->fetchAll(PDO::FETCH_CLASS,"shophours" );
    return $result;
}