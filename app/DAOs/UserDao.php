<?php 


class UserDao {

    public function create(Utilisateur $user): Utilisateur{
        $query = "INSERT INTO utilisateurs (firstname, lastname, email, password, photo, phone, role_id ) VALUES ( '". $user->getFirstname() . "' , '" . $user->getLastname() . "' , '". $user->getEmail() . "' , '" . $user->getPassword() . "', '" . $user->getPhoto() . "' , '" . $user->getPhone() . "' ,". $user->getRole()->getId() .  ");" ;

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        $user->setId(Database::getInstance()
            ->getConnection()
            ->lastInsertId());

        return $user;
    }

    public function delete(Utilisateur $user) : int {
        $query = "DELETE FROM utilisateurs WHERE id = " . $user->getId() . " ;";

        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();

        return $statement->rowCount();
    }

    public function update(Utilisateur $user) : Utilisateur {
        $query = "UPDATE utilisateurs SET firstname = '" . $user->getFirstname() . "' , lastname = '" . $user->getLastname() . "' , email = '" . $user->getEmail() . "', password = '" . $user->getPassword() . "' , phone = '" . $user->getPhone() . "', photo = '" . $user->getPhoto() . "' , role_id = " . $user->getRole()->getRoleName() . " WEHRE id = ". $user->getId() . ";";
        
        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();

        return $user;
    }

    public function findAll() : array {
        $query = "SELECT * FROM utilisateurs";

        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, Utilisateur::class);
    }

    public function findById(int $id) : Utilisateur {
        $query = "SELECT * FROM utilisateurs WHERE id = " . $id;

        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();

        return $statement->fetchObject(Utilisateur::class);
    }
}