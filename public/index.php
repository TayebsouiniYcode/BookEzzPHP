<?php 

//Models 
include './../app/Models/Etiquette.php';
include './../app/Models/Categorie.php';
include './../app/Models/Livre.php';
include './../app/Models/Model.php';
include './../app/Models/Reservation.php';
include './../app/Models/Role.php';
include './../app/Models/Tag.php';
include './../app/Models/Utilisateur.php';

include './../app/Core/ORM/Migration.php';



$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();



$migration = new Migration();

$migration->migrate();













// include './../app/Core/Router.php';
// include './../app/Controllers/HomeController.php';
// include './../app/Core/Application.php';
// include './../app/http/Request.php';
// include './../app/http/Response.php';
// include './../app/Services/UserService.php';
// include './../app/Services/AuthService.php';
// include './../app/Repositories/Implementations/UserRepository.php';
// include './../app/DAOs/UserDao.php';
// include './../app/Services/RoleService.php';
// include './../app/Repositories/Implementations/RoleRepository.php';
// include './../app/DAOs/RoleDao.php';
// include './../app/Controllers/AuthController.php';
// include "./../app/http/LoginForm.php";
// include './../utils/Classe.php';
// include './../utils/Message.php';



// include './../views/layouts/head.php';

// $app = new Application();

// $app->run();