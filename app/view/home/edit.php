<div class="container mt-5 offset-3">
  <div class="row my-3">
    <div class="col-md-6">
      <form action="/home/update" method="post">
        <input type="hidden" name="task_id" value="<?= $this->task['id'] ?>">
        <div class="form-group">
          <label for="username">Имя пользователь</label>
          <input type="text" id="username" name="username" class="form-control" value="<?= $this->task['username'] ?>" minlength="4" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" value="<?= $this->task['email'] ?>" required>
        </div>
        <div class="form-group">
          <label for="text">Текст задачи</label>
          <input type="text" id="text" name="text" class="form-control" value="<?= $this->task['text'] ?>" minlength="4" required>
        </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <select name="status" id="status" class="form-control">
            <option value="<?= $this->task['status'] ?>"><?= $this->task['status'] ?> (текущий)</option>
            <option value="Выполнено">Выполнено</option>
            <option value="В ходе выполнения">В ходе выполнения</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary float-right">Сохранить</button>
      </form>
    </div>
  </div>
</div>