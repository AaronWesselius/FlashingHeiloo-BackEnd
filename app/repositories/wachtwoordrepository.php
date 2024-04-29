<?php
namespace Repositories;
use Repositories\Repository;

use PDO;

class WachtwoordRepository extends Repository {
    function getWachtwoord() {
        $stmt = $this->connection->prepare("SELECT wachtwoord FROM `wachtwoord` WHERE id=1;");
        $stmt->execute();

        $wachtwoord = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    
        return $wachtwoord[0];
    }
    
}