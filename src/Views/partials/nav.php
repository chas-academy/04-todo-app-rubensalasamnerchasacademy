<header class="header">
    <h1>todos</h1>
    <form id="create-todo" method="post" action="todos">
      <input name="title" class="new-todo" placeholder="What needs to be done?" autofocus>
    </form>
</header>

<section class="main">
    <form class="view" method="POST" action="/todos/toggle-all">
    <input name="toggle" id="toggle-all" class="toggle-all" type="checkbox" 
    <?php foreach($todos as $todo) {
        $todo['completed'] === "false" ? 'checked="true"' : "";
    }  ?>
    
    
    onChange="submit();"
    
    >
    <label for="toggle-all">Mark all as complete</label>
    </form>
</section>

