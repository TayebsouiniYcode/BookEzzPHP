<?php 


class RoleService {
    private RoleRepository $roleRepository;

    public function __construct() {
        $this->roleRepository = new RoleRepository();
    }

    public function getRoleByName(string $name) {
    
        if (empty($name)) {
            return false;
        }

        $role = $this->roleRepository->findByName($name);
        return $role;
    }

    public function getRoleById(int $id) {
        return $this->roleRepository->findById($id);
    }
}