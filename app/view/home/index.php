<div class="container mt-5 offset-3">
  <div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Добавить
    </button>
  </div>
  <?php if (isset($this->success)): ?>
    <div class="row my-3">
      <div class="col-md-6">
        <div class="alert alert-info">
          <span>Задача успешно сохранено</span>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php foreach ($this->tasks as $task): ?>
    <div class="row my-3">
      <div class="col-md-6">
        <div class="card" style="width: auto;">
          <div class="card-body">
            <h5 class="card-title">@<?= $task->username; ?> <span><?= $task->email; ?></span></h5>
            <p class="card-text"><?= $task->text; ?></p>
            <?php if ($task->status == 'Выполнено'): ?>
              <a href="#" class="btn btn-success">Выполнено</a>
            <?php else: ?>
              <a href="#" class="btn btn-warning">В ходе выполнения</a>
            <?php endif; ?>
            <?php if ($task->changed): ?>
              <smal class="alert alert-info">отредактировано администратором</smal>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<div class="modal fade" tabindex="-1" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Создание таска</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://beejee.loc:8888/home/create" method="post">
          <div class="form-group">
            <label for="username">Имя пользователь</label>
            <input type="text" id="username" name="username" class="form-control" minlength="4" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="text">Текст задачи</label>
            <input type="text" id="text" name="text" class="form-control" minlength="4" required>
          </div>
          <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control">
              <option value="Выполнено">Выполнено</option>
              <option value="В ходе выполнения">В ходе выполнения</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
      </div>
    </div>
  </div>
</div>