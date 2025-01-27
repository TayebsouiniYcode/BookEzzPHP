<?php 

class AuthController {
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    public function login(Request $request, Response $response) {
        if ($request->getMethod() == 'get') {
            include './../views/login.php';
        }
    }

    public function logout(): void {

    }
}