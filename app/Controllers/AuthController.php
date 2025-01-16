<?php 

class AuthController {
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    public function index() {
        include './../views/login.php';
    }
    
    public function register(RegisterForm $registerForm) {
       try {
            $user = $this->authService->register($registerForm);
       }catch (Exception $e) {
            Message::display($e);
       }
    }

    public function login(LoginForm $logInForm) {
        try {
            $user = $this->authService->login($logInForm);
        } catch (Exception $e) {
            Message::display($e);
        }
    }

    public function logout(): void {

    }
}