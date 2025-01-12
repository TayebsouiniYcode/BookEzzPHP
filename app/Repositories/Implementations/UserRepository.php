<?php 

class UserRepository {
    private UserDao $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function create(Utilisateur $user): Utilisateur {
        return $this->userDao->create($user);
    }

    public function update(Utilisateur $user): Utilisateur {
        return $this->userDao->update($user);
    }

    public function delete(int $id): int {
        return $this->userDao->delete($id);
    }

    public function findAll() : array {
        return $this->userDao->findAll();
    }

    public function findById(int $id): Utilisateur {
        return $this->userDao->findById($id);
    }

    public function findByEmail(string $email): mixed {
        $query = "SELECT id, firstname, lastname, email, phone, photo, role_id, password FROM utilisateurs WHERE email = '" . $email . "';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchObject(Utilisateur::class);
    }

    public function findByEmailAndPassword(Utilisateur $user) : mixed {
        $query = "SELECT id, firstname, lastname, email, phone, photo, role_id, password FROM utilisateurs WHERE email = '" . $user->getEmail() . "' AND password = '". $user->getPassword() ."';";
        
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchObject(Utilisateur::class);
    }

}