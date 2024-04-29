<?php

namespace Controllers;

use Services\WachtwoordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    private $wachtwoordService;
    public function __construct()
    {
        $this->wachtwoordService = new WachtwoordService();
    }
    public function Login()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        $password = $data->wachtwoord;

        if ($this->wachtwoordService->checkWachtwoord($password)) {
            $this->respond("login gelukt");
        } else {
            $this->respondWithError(401, "login mislukt");
        }
    }
    
}
