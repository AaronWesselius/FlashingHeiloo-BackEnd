<?php
namespace Repositories;

use PDO;
use Repositories\Repository;

class ProgrammaRepository extends Repository {
    function getAll($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT id, beginTijd, `eindTijd`, `dag`, `team`, locatie FROM programma;";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $clubNieuws = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {               
                $clubNieuws[] = $row; // Assuming no need for a separate rowToClubNieuws conversion
            }

            return $clubNieuws;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}