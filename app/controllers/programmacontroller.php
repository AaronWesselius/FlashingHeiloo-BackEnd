<?php

namespace Controllers;

use Exception;
use Services\ProgrammaService;

class ProgrammaController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new ProgrammaService();
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

        $programma = $this->service->getAll($offset, $limit);

        $this->respond($programma);
    }
}
