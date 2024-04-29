<?php

namespace Services;
use Repositories\WachtwoordRepository;

class WachtwoordService {
    public function checkWachtwoord($wachtwoord) {
        return $this->enqryptWachtwoord($wachtwoord) == $this->getWachtwoord();
    }
    public function getWachtwoord(){
        $repository = new WachtwoordRepository();
        return $repository->getWachtwoord();
    }
    public function enqryptWachtwoord($wachtwoord) {
        return hash('sha256', $wachtwoord);
    }
}
