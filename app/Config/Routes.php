<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/signup', 'Home::signup', ['filter' => 'login']);
$routes->match(['get', 'post'], '/signin', 'Home::signin', ['filter' => 'login']);
$routes->get('/signout', 'Home::signout', ['filter' => 'logout']);
$routes->get('/server', 'Server::index');