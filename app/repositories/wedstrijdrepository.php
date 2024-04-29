<?php
namespace Repositories;

use Models\Wedstrijd;
use Services\SpelerService;
use PDO;

class WedstrijdRepository extends Repository {

    private $spelerService;

    public function __construct() {
        parent::__construct();
        $this->spelerService = new SpelerService();
    }

    public function getAll($offset, $limit)  {
        $stmt = $this->connection->prepare("SELECT id, team1, team2, schijdsrechter1, schijdsrechter2, tafel1, tafel2, datum FROM wedstrijd");
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $wedstrijden = $stmt->fetchAll();
        
        $newWedstrijd = new Wedstrijd;


        foreach($wedstrijden as $wedstrijd){
            $newWedstrijd->schijdsrechter1 = $this->spelerService->getById($wedstrijd['schijdsrechter1']);
            $newWedstrijd->schijdsrechter2 = $this->spelerService->getById($wedstrijd['schijdsrechter2']);
            $newWedstrijd->tafel1 = $this->spelerService->getById($wedstrijd['tafel1']);
            $newWedstrijd->tafel2 = $this->spelerService->getById($wedstrijd['tafel2']);

            $wedstrijd = $newWedstrijd;
        }   
        return $wedstrijden;   
    }
    
    public function insert($wedstrijd) {
        $stmt = $this->connection->prepare("INSERT INTO wedstrijd (team1, team2, schijdsrechter1, schijdsrechter2, tafel1, tafel2, datum) 
        VALUES (:team1, :team2, :schijdsrechter1, :schijdsrechter2, :tafel1, :tafel2, :datum)");
        
        $results = $stmt->execute([
            ':team1' => $wedstrijd->team1, 
            ':team2' => $wedstrijd->team2, 
            ':schijdsrechter1' => $wedstrijd->schijdsrechter1, 
            ':schijdsrechter2' => $wedstrijd->schijdsrechter2, 
            ':tafel1' => $wedstrijd->tafel1, 
            ':tafel2' => $wedstrijd->tafel2, 
            ':datum' => $wedstrijd->datum
        ]);
        return $results;
    }

    public function delete($id) {
        $stmt = $this->connection->prepare("DELETE FROM wedstrijd WHERE id = :id");
        $results = $stmt->execute([':id' => $id]);
        return $results;
    }
}
