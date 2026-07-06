<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('index', 'Home::index');


$routes->get('/', 'Home::login');

$routes->get('perfil', 'Home::perfil');

$routes->get('criarconta', 'Home::criarconta');

$routes->get('criarcontaempresa', 'Home::criarcontaempresa');

$routes->get('principal','Home::principal');