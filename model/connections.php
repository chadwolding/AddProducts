<?php
function getConnection()
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=wolding", 'cwolding', 'ChWo3433');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $ex) {
        echo "error " . $ex->getMessage();
    }
}
?>