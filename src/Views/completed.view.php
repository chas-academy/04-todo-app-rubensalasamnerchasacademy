<section class="todo-section">
  <ul class="todo-list">
        <form class="view" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="search" placeholder="What do you want to buy?">
            <input type="submit" name="submit" placeholder="submit">
        </form> 

       

    
      <?php foreach($completed as $todo): ?>
        <?= includeWith('/partials/completed.php', compact('todo', $todo)) ?>
      <?php endforeach; ?>

      
  </ul>
</section>