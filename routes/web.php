<?php 



Route::get("/", [HomeController::class, 'index']);
Route::get("/login", [AuthController::class, 'login']); 
Route::post("/login", [AuthController::class, '/login/action']); 