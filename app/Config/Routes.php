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

$routes->post('logar','Home::logar');

$routes->get('principal','Home::vagas');

$routes->get('escolha','Home::escolhaLogin');

$routes->get('candidatar/(:num)', 'Home::candidatar/$1');

$routes->post('salvarCandidato', 'Home::salvarCandidato');

$routes->post('salvarEmpresa', 'Home::salvarEmpresa');

$routes->get('criar-vaga','Home::criarVaga');

$routes->get('sair','Home::sair');