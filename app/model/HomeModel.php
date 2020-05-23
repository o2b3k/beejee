<?php

class HomeModel extends Model {
  public function getTasks()
  {
    $sql = "SELECT * FROM `tasks` ORDER BY status DESC";
    $todo = $this->db->prepare($sql);
    $todo->execute();
    if ($todo->rowCount() > 0){
      return $todo->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
  }

  public function createTask($data)
  {
    $sql = "INSERT INTO tasks(username, email, text, status) VALUES(:username, :email, :text, :status)";
    $obj = $this->db->prepare($sql);
    $obj->execute(array(
      ':username' => $data['username'],
      ':email' => $data['email'],
      ':text' => htmlentities($data['text']),
      ':status' => $data['status'],
    ));
    return true;
  }

  public function edit($id)
  {
    $sql = "SELECT * FROM `tasks` WHERE id=:id";
    $task = $this->db->prepare($sql);
    $task->execute(array(
      ':id' => $id
    ));
    return $task->fetch(PDO::FETCH_ASSOC);
  }

  public function update($task)
  {
    $sql = "UPDATE tasks SET username=:username, email=:email, text=:text, status=:status, changed=1 WHERE id=:id";
    $obj = $this->db->prepare($sql);
    $obj->execute(array(
      ':username' => $task['username'],
      ':email' => $task['email'],
      ':text' => $task['text'],
      ':status' => $task['status'],
      ':id' => $task['task_id'],
    ));
    return true;
  }

}