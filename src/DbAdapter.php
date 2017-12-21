<?php
    class DbAdapter{
        public static function consultaSql($query){
            $db = new PDO("sqlite:./datos.db");
            $db->exec('PRAGMA foreign_keys = ON;'); 
            $res=$db->prepare($query);
            $res->execute();
            $res->setFetchMode(PDO::FETCH_NAMED);
            return $res;
        }
        
        public static function consultaUnica($query){
            $db = new PDO("sqlite:./datos.db");
            $db->exec('PRAGMA foreign_keys = ON;'); 
            $res=$db->prepare($query);
            $res->execute();
            return $res->fetchAll()['0'];
        }
    }
?>