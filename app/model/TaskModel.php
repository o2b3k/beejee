<?php

class TaskModel extends Model {
  public function getTasks()
  {
    $sql = "SELECT * FROM `tasks`";
    $todo = $this->db->prepare($sql);
    $todo->execute();
    if ($todo->rowCount() > 0){
      return $todo->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
  }
}