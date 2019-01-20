<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller {
    
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);
        

        if ($result) {
          $this->redirect('/');
        }
    }

    public function update($urlParams)
    {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $completed = isset($body['status']) ? 'true' : 'false'; // whether or not the todo has been checked or not
        
        $result = TodoItem::updateTodo($todoId, $body['title'], $completed);
        
        
        if ($result) {
          $this->redirect('/');
        }
        
        
    }

    public function toggle()
    {
        $todosToggle = TodoItem::findAll();
        
        $completedCounter = count(array_filter($todosToggle, function($todo) { 
           return $todo['completed'] === "false";
        }));
        
        if ($completedCounter > 0) {
           $result = TodoItem::toggleTodos('true');
        } else {
           $result = TodoItem::toggleTodos('false');
        }
        
        if ($result) {
            $this->redirect('/');
        }
    }

    public function delete($urlParams)
    {
      // TODO: Implement me!
      $result = TodoItem::deleteTodo($urlParams['id']);

      if ($result) {
        $this->redirect('/');
      }

    }

    public function clear()
    {
        $todosClear = TodoItem::findAll();

        foreach ($todosClear as $todo){
            if ($todo['completed'] === 'true') {
    
                $completedArray [] = $todo['id'];
            }
        } 

        $ids = implode("','", $completedArray);
        $result = TodoItem::clearCompletedTodos($ids);

        if ($result) {
            $this->redirect('/');
        }
        
    }

    public function completed()
    {
        $todosCompleted = TodoItem::findAll();
        $completed = [];
        foreach($todosCompleted as $todo) 
        {
            if ($todo['completed'] === 'true') {
                $completed [] = $todo;
            }
        }


        return $this->view('index', ['todos' => $completed]);
    }   

    public function notcompleted() 
    {
        $todosCompleted = TodoItem::findAll();
        $completed = [];
        foreach($todosCompleted as $todo) 
        {
            if ($todo['completed'] === 'false') {
                $completed [] = $todo;
            }
        }


        return $this->view('index', ['todos' => $completed]);
    }

    public function all() 
    {
        $todosAll = TodoItem::findAll();

        return $this->view('index', ['todos' => $todosAll]);
    }

    public function search() 
    {
        
        /* var_dump($_GET['search']); */

        
        /* $result = TodoItem::search($_GET['search']);

        if ($result) {
            
            var_dump($result);

        } */
        
        
        /* var_dump($_POST); */
        $body = filter_body();
        var_dump($body['title']);
        /* $result = TodoItem::createTodo($body['title']); */
        

        /* if ($result) {
            return $this->view('index', ['todos' => $result]);
            var_dump($result);
        } */
    
    }


}
