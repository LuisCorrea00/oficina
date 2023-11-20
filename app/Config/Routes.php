<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'DashboardController::index');

$routes->get('/funcionarios', 'FuncionarioController::index');
$routes->get('/funcionarios/delete/(:num)', 'FuncionarioController::delete/$1');
$routes->get('/funcionarios/edit/(:num)', 'FuncionarioController::edit/$1');
$routes->get('/funcionarios/create', 'FuncionarioController::create');
$routes->post('/funcionarios/store', 'FuncionarioController::store');

$routes->get('/pecas', 'PecaController::index');
$routes->get('/pecas/delete/(:num)', 'PecaController::delete/$1');
$routes->get('/pecas/edit/(:num)', 'PecaController::edit/$1');
$routes->get('/pecas/create', 'PecaController::create');
$routes->post('/pecas/store', 'PecaController::store');

$routes->get('/clientes', 'ClienteController::index');
$routes->get('/clientes/delete/(:num)', 'ClienteController::delete/$1');
$routes->get('/clientes/edit/(:num)', 'ClienteController::edit/$1');
$routes->get('/clientes/create', 'ClienteController::create');
$routes->get('/clientes/(:num)/veiculos', 'ClienteController::veiculo/$1');
$routes->post('/clientes/store', 'ClienteController::store');

$routes->get('/servicos', 'ServicoController::index');
$routes->get('/servicos/delete/(:num)', 'ServicoController::delete/$1');
$routes->get('/servicos/edit/(:num)', 'ServicoController::edit/$1');
$routes->get('/servicos/create', 'ServicoController::create');
$routes->post('/servicos/store', 'ServicoController::store');

$routes->get('/veiculos/delete/(:num)', 'ClienteController::deleteVeiculo/$1');
$routes->get('/veiculos/edit/(:num)', 'ClienteController::editVeiculo/$1');
$routes->get('/veiculos/create/(:num)', 'ClienteController::createVeiculo/$1');
$routes->post('/veiculos/store', 'ClienteController::storeVeiculo');

$routes->get('/equipes', 'EquipeController::index');
$routes->get('/equipes/delete/(:num)', 'EquipeController::delete/$1');
$routes->get('/equipes/edit/(:num)', 'EquipeController::edit/$1');