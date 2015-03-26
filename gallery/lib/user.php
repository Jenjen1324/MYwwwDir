<?php

define("PATH_USER", "db/users");

class User {
  public $id;
  public $username;
  public $password;
  public $email;
  public $admin;

  public function login($username, $password)
  {
    @session_start();
    $users = User::loadUsers();
    var_dump($users);
    foreach($users as $user)
    {
      echo $user->username;
      if($user->username == $username)
      {
        if(md5($user->password) == $password)
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

    die();
    throw new Exception("Benutzer nicht gefunden");
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

    if(isset($_SESSION['uid']))
    {
      foreach($users as $user)
      {
        if($user->id == $_SESSION['uid'])
          return $user;
      }
    }
    else
    {
      return false;
    }
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

}
