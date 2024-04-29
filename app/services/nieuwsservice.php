<?php
namespace Services;

use Repositories\NieuwsRepository;
class NieuwsService {
    public function getAll($offset = NULL, $limit = NULL) {
        $repository = new NieuwsRepository();
        return $repository->getAll($offset, $limit);
    }
}
