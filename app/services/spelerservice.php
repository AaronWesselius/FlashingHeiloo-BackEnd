<?php
namespace Services;

use Repositories\SpelerRepository;
class SpelerService {
    public function insert($speler) {
        $repository = new SpelerRepository();
        return $repository->insert($speler);
    }
    public function update($speler, $id) {
        $repository = new SpelerRepository();
        return $repository->update($speler, $id);
    }
    public function delete($id) {
        $repository = new SpelerRepository();
        return $repository->delete($id);
    }
    public function getAll($offset, $limit) {
        $repository = new SpelerRepository();
        return $repository->getAll($offset, $limit);
    }
    public function getById($id) {
        $repository = new SpelerRepository();
        return $repository->getById($id);
    }
}