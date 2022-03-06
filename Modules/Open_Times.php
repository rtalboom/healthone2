<?php
function getTimes()
{
    global $pdo;
    $query=$pdo->prepare("SELECT * FROM times");
    $query->execute();
    $result=$query->fetchAll(PDO::FETCH_CLASS,"times" );
    return $result;
}