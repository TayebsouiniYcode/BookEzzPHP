<?php 

class RoleDao {
    public function create(Role $role): Role{
        if (empty($role->getDescription()) || $role->getDescription() == null) {
            $role->setDescription("default Description");
        }

        if (empty($role->getLogo()) || $role->getLogo() == null) {
            $role->setLogo("Default logo");
        }

        $query = "INSERT INTO roles (role_name , role_description, logo) VALUES ( '" . $role->getRoleName() . "', '" . $role->getDescription() . "', '" . $role->getLogo() . "');";


        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        $role->setId(Database::getInstance()
            ->getConnection()
            ->lastInsertId());

        return $role;
    }

    public function update(Role $role): Role {
        $query = "UPDATE roles SET ";
    }
}