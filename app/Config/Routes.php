<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/login', 'LoginController::index');
$routes->post('/login/store', 'LoginController::store');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/funcionarios', 'FuncionarioController::index', ['filter' => 'auth']);
$routes->get('/funcionarios/delete/(:num)', 'FuncionarioController::delete/$1', ['filter' => 'auth']);
$routes->get('/funcionarios/edit/(:num)', 'FuncionarioController::edit/$1', ['filter' => 'auth']);
$routes->get('/funcionarios/create', 'FuncionarioController::create', ['filter' => 'auth']);
$routes->post('/funcionarios/store', 'FuncionarioController::store', ['filter' => 'auth']);

$routes->get('/pecas', 'PecaController::index', ['filter' => 'auth']);
$routes->get('/pecas/delete/(:num)', 'PecaController::delete/$1', ['filter' => 'auth']);
$routes->get('/pecas/edit/(:num)', 'PecaController::edit/$1', ['filter' => 'auth']);
$routes->get('/pecas/create', 'PecaController::create', ['filter' => 'auth']);
$routes->post('/pecas/store', 'PecaController::store', ['filter' => 'auth']);

$routes->get('/clientes', 'ClienteController::index', ['filter' => 'auth']);
$routes->get('/clientes/delete/(:num)', 'ClienteController::delete/$1', ['filter' => 'auth']);
$routes->get('/clientes/edit/(:num)', 'ClienteController::edit/$1', ['filter' => 'auth']);
$routes->get('/clientes/create', 'ClienteController::create', ['filter' => 'auth']);
$routes->get('/clientes/(:num)/veiculos', 'ClienteController::veiculo/$1', ['filter' => 'auth']);
$routes->post('/clientes/store', 'ClienteController::store', ['filter' => 'auth']);

$routes->get('/servicos', 'ServicoController::index', ['filter' => 'auth']);
$routes->get('/servicos/delete/(:num)', 'ServicoController::delete/$1', ['filter' => 'auth']);
$routes->get('/servicos/edit/(:num)', 'ServicoController::edit/$1', ['filter' => 'auth']);
$routes->get('/servicos/create', 'ServicoController::create', ['filter' => 'auth']);
$routes->post('/servicos/store', 'ServicoController::store', ['filter' => 'auth']);

$routes->get('/veiculos/delete/(:num)', 'ClienteController::deleteVeiculo/$1', ['filter' => 'auth']);
$routes->get('/veiculos/edit/(:num)', 'ClienteController::editVeiculo/$1', ['filter' => 'auth']);
$routes->get('/veiculos/create/(:num)', 'ClienteController::createVeiculo/$1', ['filter' => 'auth']);
$routes->post('/veiculos/store', 'ClienteController::storeVeiculo', ['filter' => 'auth']);

$routes->get('/equipes', 'EquipeController::index', ['filter' => 'auth']);
$routes->get('/equipes/delete/(:num)', 'EquipeController::delete/$1', ['filter' => 'auth']);
$routes->get('/equipes/edit/(:num)', 'EquipeController::edit/$1', ['filter' => 'auth']);
$routes->get('/equipes/create', 'EquipeController::create', ['filter' => 'auth']);
$routes->post('/equipes/store', 'EquipeController::store', ['filter' => 'auth']);

$routes->get('/ordemServico', 'OrdemServicoController::index', ['filter' => 'auth']);
$routes->get('/ordemServico/delete/(:num)', 'OrdemServicoController::delete/$1', ['filter' => 'auth']);
$routes->get('/ordemServico/edit/(:num)', 'OrdemServicoController::edit/$1', ['filter' => 'auth']);
$routes->get('/ordemServico/concluir/(:num)', 'OrdemServicoController::concluir/$1', ['filter' => 'auth']);
$routes->get('/ordemServico/create', 'OrdemServicoController::create', ['filter' => 'auth']);
$routes->post('/ordemServico/store', 'OrdemServicoController::store', ['filter' => 'auth']);
$routes->post('/ordemServico/concluirStore', 'OrdemServicoController::concluirStore', ['filter' => 'auth']);