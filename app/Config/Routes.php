<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('index', 'Home::index');


$routes->get('/', 'Home::login');

$routes->get('perfil', 'Home::perfil');

$routes->get('home/criarconta', 'Home::criarconta');

$routes->get('home/criarcontaempresa', 'Home::criarcontaempresa');