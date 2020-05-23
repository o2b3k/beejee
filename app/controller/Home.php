<?php

class Home extends Controller
{

  public function index()
  {
    $tasks = $this->model->getTasks();
    $this->view->tasks = $tasks;
    $this->view->render('home/index');
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $data = $_POST;
      $this->model->createTask($data);
      $this->view->success = true;
      $tasks = $this->model->getTasks();
      $this->view->tasks = $tasks;
      $this->view->render('home/index');
    } else {
      header("Location: " . URL);
    }
  }

  public function admin()
  {
    $tasks = $this->model->getTasks();
    $this->view->tasks = $tasks;
    $this->view->render('home/admin');
  }

  public function edit($id)
  {
    $task = $this->model->edit($id);
    if (!$task) {
      header("Location: " . "/home/error");
    } else {
      $this->view->task = $task;
      $this->view->render('home/edit');
    }
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $data = $_POST;
      $this->model->update($data);
      header("Location" . "/home/admin");
    }
  }

  public function error()
  {
    $this->view->render('home/404');
  }

}