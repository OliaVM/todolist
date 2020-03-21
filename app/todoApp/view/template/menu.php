<div class="btn-group">
	<a class="btn rounded theme-button" href="/">Главная</a>
	<?php if (!isset($_SESSION['auth'])): ?>
		<a class="btn rounded theme-button" href="/authentication">Войти</a>
	<?php else: ?>
		<a class="btn rounded theme-button" href="/logout">Выход</a>
	<?php endif; ?>
	<a class="btn rounded theme-button" href="/show-tasks">Список задач</a>
	<a class="btn rounded theme-button" href="/create-task">Создать задачу</a>
</div>
	