<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']      = 'Client';
$route['404_override']            = '';
$route['translate_uri_dashes']    = FALSE;

$route['clientes']                = 'client/getAll';
$route['cliente/(:num)']          = 'client/detail/$clientid';
$route['cliente/excluir/']        = 'client/delete';
$route['cliente']                 = 'client/insert';

$route['contatos']                = 'contact/getAll';
$route['contato/cliente/(:num)']  = 'contact/insert/$contactid';
$route['contato/(:num)']          = 'contact/detail/$contactid';
$route['contatos/cliente/(:num)'] = 'contact/getAllClient/$clientid';
$route['contato/excluir/(:num)']  = 'contact/delete/$contactid';