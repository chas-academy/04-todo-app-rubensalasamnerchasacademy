<header class="header">
    <h1>todos</h1>
    <!-- <form class="view" method="GET" action="/todos/search">
        <input type="text" name="search" placeholder="Search for todos?">
        <input type="submit" name="submit" placeholder="submit">
    </form>  -->
    <form id="view" method="get" action="/todos/search">
        <input name="search" value="test" placeholder="Search for todos" autofocus>
        <input type="submit" name="submit" placeholder="submit">
    </form>

   
    <form id="create-todo" method="post" action="/todos">
        <input name="title" class="new-todo" placeholder="What needs to be done?" autofocus>
    </form>
</header>

<section class="main">
    <form class="view" method="POST" action="/todos/toggle-all">
        <input name="toggle" id="toggle-all" class="toggle-all" type="checkbox" onChange="submit();">
        <label for="toggle-all">Mark all as complete</label>
    </form>
</section>

