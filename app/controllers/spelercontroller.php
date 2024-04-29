<?php

namespace Controllers;

use Exception;
use Services\ProgrammaService;
use Services\SpelerService;
use Illuminate\Http\Request; 

class SpelerController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new SpelerService();
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

    public function getOne($id)
    {
        $speler = $this->service->getById($id);

        // we might need some kind of error checking that returns a 404 if the product is not found in the DB
        if (!$speler) {
            $this->respondWithError(404, "Product not found");
            return;
        }

        $this->respond($speler);
    }

    public function create()
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\\Speler");
            $product = $this->service->insert($product);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
    }

    public function update($id)
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\\Speler");
            $product = $this->service->update($product, $id);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
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
