<?php
namespace Repositories;

use PDO;
use Repositories\Repository;

class NieuwsRepository extends Repository {

    function getAll($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT id, kop, date, text FROM clubniews";
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
?>