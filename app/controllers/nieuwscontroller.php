<?php

namespace Controllers;

use Exception;
use Services\NieuwsService;

class NieuwsController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new NieuwsService();
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
}
