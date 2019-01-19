<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        print_r($title);
        $query = "INSERT INTO todos (title, created)  
                  VALUES ('$title', NOW())";
        
        self::$db->query($query);
        
        $result = self::$db->execute();

        return $result;

        
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
    // TODO: Implement me!
     // Update a specific todo
     
        $query = "UPDATE todos
                  SET title = '$title',
                      completed = '$completed'
                  WHERE id = '$todoId'";

        self::$db->query($query);

        $result = self::$db->execute();
        
        return $result;
    }


     public static function deleteTodo($todoId)
    {
        
         $query = "DELETE FROM todos WHERE id = $todoId";
         self::$db->query($query);

         $result = self::$db->execute();
         
         return $result;
    }
    
   
    public static function toggleTodos($completed)
    {
       $query = "UPDATE todos
                SET completed = '$completed'
                ";
       self::$db->query($query);

       $result = self::$db->execute();

       return $result;
    }

    public static function clearCompletedTodos($ids)
     {
          $query = "DELETE FROM todos WHERE id IN ('".$ids."')";
          
          self::$db->query($query);
          $result = self::$db->execute();
          return $result;
     }

}
