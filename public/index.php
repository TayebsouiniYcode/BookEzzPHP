<?php 

include './../app/Core/Router.php';
include './../app/Controllers/HomeController.php';
include './../app/Core/Application.php';
include './../app/http/Request.php';
include './../app/http/Response.php';
include './../app/Services/UserService.php';
include './../app/Services/AuthService.php';
include './../app/Repositories/Implementations/UserRepository.php';
include './../app/DAOs/UserDao.php';
include './../app/Services/RoleService.php';
include './../app/Repositories/Implementations/RoleRepository.php';
include './../app/DAOs/RoleDao.php';
include './../app/Controllers/AuthController.php';
include "./../app/http/LoginForm.php";
include './../utils/Classe.php';
include './../utils/Message.php';

// include './../views/layouts/head.php';

$app = new Application();

$app->run();