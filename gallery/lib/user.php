<?php

define("PATH_USER", "db/users");

class User {
  public $id;
  public $username;
  public $password;
  public $email;
  public $admin;

  public static function login($username, $password)
  {
    @session_start();
    $users = User::loadUsers();
    foreach($users as $user)
    {
      if($user->username == $username)
      {
        if($user->password == md5($password))
        {
          $_SESSION['uid'] = $user->id;
          return true;
        }
        else
        {
          throw new Exception("PASSWORT FALSCH DU MONGO!");
        }
      }
    }

    throw new Exception("Benutzer nicht gefunden");
  }

  public static function logout()
  {
    @session_start();
    unset($_SESSION['uid']);
    session_destroy();
  }

  public static function register_user($username, $email, $password)
  {
      $user = new User();
      $user->username = $username;
      $user->email = $email;
      $user->password = md5($password);

      $users = User::loadUsers();
      $lastuser = $users[sizeof($users) - 1];
      if($lastuser)
      {
        $user->id = $lastuser->id + 1;
      }
      else
      {
        $user->id = 0;
      }
      $users[] = $user;
      User::saveUsers($users);
  }

  public static function getCurrentUser()
  {
    @session_start();

    $users = User::loadUsers();

    if(!isset($_SESSION['uid']))
      return false;

    return User::getUserById($_SESSION['uid']);
  }

  public static function getUserById($id)
  {
    $users = User::loadUsers();
    foreach($users as $user)
    {
      if($user->id == $id)
        return $user;
    }
    return false;
  }

  public static function loadUsers()
  {
    $data = file_get_contents(PATH_USER);
    $users = unserialize($data);
    return $users;
  }

  private static function saveUsers($users)
  {
    $data = serialize($users);
    file_put_contents(PATH_USER, $data);
  }

  public static function deleteUser($user)
  {
    $finalusers = array();
    $users = User::loadUsers();
    foreach($users as $u)
    {
      if($u->id != $user->id)
        $finalusers[] = $u;
    }
    User::saveUsers($finalusers);
  }

  public static function editUser($user)
  {
    $finalusers = array();
    $users = User::loadUsers();
    foreach($users as $u)
    {
      if($u->id == $user->id)
      {
        $finalusers[] = $user;
      }
      else
      {
        $finalusers[] = $u;
      }
    }
    User::saveUsers($finalusers);
  }

}
