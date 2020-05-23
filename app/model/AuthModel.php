<?php

class AuthModel extends Model {
  public function register($user)
  {
    $password = $user['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $user['password'] = $hash;
    $sql = "INSERT INTO users (firstname, username, password) VALUES (:firstname, :username, :password)";
    $obj = $this->db->prepare($sql);
    $obj->execute(array(
      'firstname' => $user['firstname'],
      'username' => $user['username'],
      'password' => $user['password'],
    ));
  }

  public function login($user)
  {
    $userObject = $this->getUser($user['username']);
    if (!$user) return false;
    $password = $user['password'];
    $hash = $userObject['password'];
    if (password_verify($password, $hash)) {
      return $userObject;
    }
    return false;
  }

  public function getUser($username)
  {
    $sql = "SELECT * FROM `users` WHERE username = :username";
    $obj = $this->db->prepare($sql);
    $obj->execute(array(
      ':username' => $username,
    ));
    return $obj->fetch(PDO::FETCH_ASSOC);
  }
}