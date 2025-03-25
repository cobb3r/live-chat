<?php

use CodeIgniter\CLI\CLI;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/signup', 'Home::signup', ['filter' => 'login']);
$routes->match(['get', 'post'], '/signin', 'Home::signin', ['filter' => 'login']);
$routes->get('/signout', 'Home::signout', ['filter' => 'logout']);
$routes->get('/chat', 'Home::chat', ['filter' => 'logout']);
$routes->cli('/server', 'Server::index');