<footer class="footer">
    <span class="todo-count"><?= count(array_filter($todos, function($todo) { return $todo['completed'] === "false"; })) ?> item<?= "".count($todos) !== 1 ? "s" : "" ?> left</span>
    <a class="clear-completed" href="/todos/clear-completed" name="clear">Clear completed&nbsp; </a>
    <a class="clear-completed" href="/todos/display-completed" name="displaycompleted">Completed&nbsp; </a> 
    <a class="clear-completed" href="/todos/display-notcompleted" name="displaycompleted">Not Completed&nbsp;</a>
    <a class="clear-completed" href="/todos/display-all" name="displaycompleted">All&nbsp;</a> 
</footer>

</main>

<footer class="site-footer">
    <div class="small-container">
        <p class="text-center">Made by <a href="#">Your Name Here</a></p>
    </div>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>