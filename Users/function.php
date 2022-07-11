<?php
declare(strict_types=1);

function insertData($pdo,$sql,$data):bool{
    if(count($data)==0) return false;
    if($stmt=$pdo->prepare($sql)){

        if($stmt->execute($data)){
            return true;
        }
        return false;
    }

}
