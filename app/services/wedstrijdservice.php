<?php
namespace Services;

use Repositories\WedstrijdRepository;
class WedstrijdService {
    public function getAll($offset, $limit) {
        $repository = new WedstrijdRepository();
        return $repository->getAll($offset, $limit);
    }
    public function insert($wedstrijd) {
        $repository = new WedstrijdRepository();
        return $repository->insert($wedstrijd);
    }
    public function delete($id) {
        $repository = new WedstrijdRepository();
        return $repository->delete($id);
    }
}

