<?php
class DB{
    static public function connect(){
        $pdo = new PDO("mysql:host=localhost;dbname=employer","root","");
        //pour afficher les accent é
        $pdo->exec("set names utf8");
        //pour afficher les erreurs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $pdo;
    }
}
?>