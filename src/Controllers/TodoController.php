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
        $body = filter_body();
        
        
        $toggleAll = isset($body['toggle']) ? 'true' : 'false';

        $result = TodoItem::toggleTodos($toggleAll);
  
        if ($result) {
            $this->redirect('/');
        }
        // (OPTIONAL) TODO: This action should toggle all todos to completed, or not completed.

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
      // (OPTIONAL) TODO: This action should remove all completed todos from the table.
    }

}
