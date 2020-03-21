<div class="id-parent">
    <div class="id-child">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">№</th>
            <th scope="col"><a href="/show-tasks?page=<?php echo $page . '&sort=ByName';?>">Name</th>
            <th scope="col"><a href="/show-tasks?page=<?php echo $page . '&sort=ByEmail';?>">Email</th>
            <th scope="col">Daescription</th>
            <th scope="col"><a href="/show-tasks?page=<?php echo $page . '&sort=ByStatus';?>">Status</a></th>
            <?php if (isset($_SESSION['auth']) && ($_SESSION['roleId'] == 1)): ?>
              <th scope="col">Изменить статус, задачу</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($tasks)): ?>
          <?php foreach ($tasks as $row): ?>
              <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <?php if ($row['status'] == 1): ?>
                      <?php echo "Задача выполнена. Отредактировано администратором"; ?>
                    <?php else: ?>
                      <?php echo "Задача не выполнена"; ?>
                    <?php endif; ?>
                    <i class="fas fa-class-name"></i>
                </td>
                <?php if (isset($_SESSION['auth']) && ($_SESSION['roleId'] == 1)): ?>
                  <td><a href="/edit-task-status/<?php echo $row['id']; ?>"><i class="fa fa-check-square-o fa-fw" aria-hidden="true"></i></a>
                  <a href="/edit-task/<?php echo $row['id']; ?>"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a></td>
                <?php endif; ?>
              </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
 </div>


<a href="/create-task">Создать задачу</a><br>
<div class="btn-group">
  <?php if (isset($page) && $page !== 0): ?>  
    <?php if ($page > 1): ?>
      <?php $backpage2 = '<a class="btn theme-button rounded" href= /show-tasks?page=1><<Первая страница</a>'; ?>
      <?php echo $backpage2 . " "; ?>
    <?php endif; ?> 
    <?php  if ($page > 2): ?>
        <?php $backpage1 = '<a class="btn theme-button rounded" href= /show-tasks?page='. ($page - 1) ."><Предыдущая страница</a>"; ?>
        <?php echo $backpage1 . " "; ?>
    <?php endif; ?> 
    <b><a class="btn theme-button" href="#"><?php echo " " . $page. " "; ?></a></b> 
    <?php if ($page < $total): ?>
      <?php $nextpage1 = '<a class="btn theme-button rounded" href= /show-tasks?page='. ($page + 1) .'>Следующая страница></a>'; ?>
      <?php echo $nextpage1 . " "; ?>
    <?php endif; ?> 
    <?php if ($page < $total-1): ?>
      <?php $nextpage2 = '<a class="btn theme-button rounded" href= /show-tasks?page=' .$total. '>Последняя страница>></a>'; ?> 
      <?php echo $nextpage2; ?>
    <?php endif; ?> 
  <?php endif; ?>
</div> 