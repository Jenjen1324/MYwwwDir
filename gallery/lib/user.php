<?php

define("PATH_USER", "db/users");

class User {
  public $id;
  public $username;
  public $admin;

  public function login($username, $password)
  {
    @session_start();
    $users = loadUsers();
    foreach($users as $user)
    {
      if($user->username == $username)
      {
        if($user->password)
        {
          $_SESSION['uid'] = $user->id;
          return true;
        }
        else
        {
          throw new Exception("Falsches Passwort!");
        }
      }
    }

    throw new Exception("Benutzer nicht gefunden");
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
