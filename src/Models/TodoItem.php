<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        try{
            print_r($title);
            $query = "INSERT INTO todos (title, created)  
                    VALUES ('$title', NOW())";
            self::$db->query($query);
            $result = self::$db->execute();
            if (!empty($result)) {
                return $result;
            } else {
                return [];
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
        try{
            $query = "UPDATE todos SET title = '$title', completed = '$completed' 
                    WHERE id = '$todoId'";
            self::$db->query($query);
            $result = self::$db->execute();
            if (!empty($result)) {
                return $result;
            } else {
                return [];
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }


    public static function deleteTodo($todoId)
    {
        try{
            $query = "DELETE FROM todos WHERE id = $todoId";
            self::$db->query($query);
            $result = self::$db->execute();
            if (!empty($result)) {
                return $result;
            } else {
                return [];
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }
    
   
    public static function toggleTodos($completed)
    {
        try {
            $query = "UPDATE todos SET completed = '$completed'";
            self::$db->query($query);
            $result = self::$db->execute();
            if (!empty($result)) {
                return $result;
            } else {
                return [];
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    public static function clearCompletedTodos($ids)
    {
        try {
            $query = "DELETE FROM todos WHERE id IN ('".$ids."')";
          
            self::$db->query($query);
            $result = self::$db->execute();
            if (!empty($result)) {
                return $result;
            } else {
                return [];
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }

        
    }

    /* public static function search($params)
    {
        $query = "SELECT * FROM todos WHERE title LIKE '%$params%'";

        self::$db->query($query);
        $result = self::$db->execute();
        return $result;
    } */

}
