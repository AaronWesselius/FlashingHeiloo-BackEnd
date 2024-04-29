<?php

namespace Controllers;

use Exception;
use Services\WedstrijdService;

class WedstrijdController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new WedstrijdService();
    }

    public function getAll()
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $nieuws = $this->service->getAll($offset, $limit);

        $this->respond($nieuws);
    }

    public function create()
    {
        try {
            $wedstrijd = $this->createObjectFromPostedJson("Models\\Wedstrijd");
            $wedstrijd = $this->service->insert($wedstrijd);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($wedstrijd);
    }

    public function delete($id)
    {
        try {
            $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
        $this->respond(true);
    }
}
