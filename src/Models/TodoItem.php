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
    
    // (Optional bonus methods below)
    // public static function toggleTodos($completed)
    // {
    //     // TODO: Implement me!
    //     // This is to toggle all todos either as completed or not completed
    // }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }

}
