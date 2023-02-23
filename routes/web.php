<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('tasks', new Route(constant('URL_SUBFOLDER') . 'myTask/all_tasks',
    array('controller' => 'FetchTasksController', 'method'=>'getTasks')));