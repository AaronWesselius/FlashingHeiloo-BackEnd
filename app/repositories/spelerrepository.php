<?php
namespace Repositories;

use Models\Speler;
use Repositories\Repository;
use PDO;

class SpelerRepository extends Repository {

    function getAll($offset, $limit) {
        $stmt = $this->connection->prepare("SELECT id, voornaam, `achternaam`, `geboortedatum`, `team` FROM speler;");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Speler');
        $articles = $stmt->fetchAll();

        return $articles;
    }
    function insert($speler) {
        $stmt = $this->connection->prepare("INSERT INTO speler (voornaam, achternaam, geboortedatum, team) VALUES (:voornaam, :achternaam, :geboortedatum, :team)");
        
        $results = $stmt->execute([
            ':voornaam' => $speler->voornaam, 
            ':achternaam' => $speler->achternaam, 
            ':geboortedatum' => $speler->geboortedatum, 
            ':team' => $speler->team,
        ]);
        return $results;
    }
    function delete($id) {
        $stmt = $this->connection->prepare("DELETE FROM speler WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function update($speler, $id) {
        $stmt = $this->connection->prepare("UPDATE speler SET voornaam = :voornaam, achternaam = :achternaam, geboortedatum = :geboortedatum, team = :team WHERE id = :id");
        $stmt->bindParam(':id', $speler->id, PDO::PARAM_INT);
        $stmt->bindParam(':voornaam', $speler->voornaam, PDO::PARAM_STR);
        $stmt->bindParam(':achternaam', $speler->achternaam, PDO::PARAM_STR);
        $stmt->bindParam(':geboortedatum', $speler->geboortedatum, PDO::PARAM_STR);
        $stmt->bindParam(':team', $speler->team, PDO::PARAM_STR);
        $stmt->execute();
    }    
    function getById($id) {
        $stmt = $this->connection->prepare("SELECT id, voornaam, `achternaam`, `geboortedatum`, `team` FROM speler WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $speler = $stmt->fetch();
        
        if ($speler === false) {
            $speler = new Speler();
            $speler->id = $id;
            $speler->voornaam = ' ';
            $speler->achternaam = ' ';
            $speler->geboortedatum = '0000-00-00';
            $speler->team = ' leeg ';
        }
        else{
            $newSpeler = new Speler();
            $newSpeler->id = $speler['id'];
            $newSpeler->voornaam =  $speler['voornaam'];
            $newSpeler->achternaam =  $speler['achternaam'];
            $newSpeler->geboortedatum =  $speler['geboortedatum'];
            $newSpeler->team =  $speler['team'];
            
            $speler = $newSpeler;
        }

        return $speler;
    }
    
}
?>