<?php 

class AuthService {
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function register(RegisterForm $registerForm) : Utilisateur {
        $this->validation($registerForm);
        
        $user = Utilisateur::instanceWithoutId(
            $registerForm->firstname,
            $registerForm->lastname,
            $registerForm->email,
            $registerForm->password,
            $registerForm->phone,
            $registerForm->photo,
            new Role(),
            []
        );

        $user->getRole()->setRoleName("Utilisateur");

        $this->userService->create($user);
        return new Utilisateur();
    }

    private function validation($forms) {
        foreach ($forms as $key => $value) {
            if (!$this->validationString($value)) {
                throw new Exception($key . " is not valide ");
            }
        }



        if (isset($forms->password) && isset($forms->passwordConfirmation)) {
            $this->passwordValidation($forms->password, $forms->passwordConfirmation);
        }


        
    }

    private function validationString(string $string): bool {
        if (empty($string) || $string == null || is_null($string)) {
            return false;
        }

        return true;
    }

    public function passwordValidation(string $password, string $passwordConfirmation) {
        if ($password != $passwordConfirmation) {
            throw new Exception("les mots de passe sont pas les mêmes");
        }

        return true;
    }

    public function login(LoginForm $loginForm) : Utilisateur{
        $this->validation($loginForm);
        $user = Utilisateur::instaceWithEmailAndPassword(
            $loginForm->email,
            $loginForm->password
        );

        $user =  $this->userService->findByEmailAndPassword($user);

        if ($user->getId() == 0) {
            throw new Exception("Email ou le mot de passe incorrect");
        }

        return $user;
    }
}