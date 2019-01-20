<?php

$router->get('', 'TodoController@get');
$router->post('todos', 'TodoController@add');
$router->patch('todos/{id}', 'TodoController@update');
$router->get('todos/{id}/delete', 'TodoController@delete');
$router->post('todos/toggle-all', 'TodoController@toggle');
$router->post('todos/clear-completed', 'TodoController@clear');
$router->get('todos/clear-completed', 'TodoController@clear');
$router->get('todos/search', 'TodoController@search');
$router->get('todos/display-completed', 'TodoController@completed');
$router->get('todos/display-notcompleted', 'TodoController@notcompleted');
$router->get('todos/display-all', 'TodoController@all');
