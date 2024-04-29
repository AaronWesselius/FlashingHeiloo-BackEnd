<?php
namespace Services;

use Repositories\ProgrammaRepository;
class ProgrammaService {
    public function getAll() {
        $repository = new ProgrammaRepository();
        return $repository->getAll();
    }
}
