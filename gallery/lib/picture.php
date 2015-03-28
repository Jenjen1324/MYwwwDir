<?php

define("PATH_PICTURE", "db/pictures");

class Picture {
  public $id;
  public $name;
  public $desc;
  public $filename;

  public $views;
  public $downloads;

  public $comments;

  public static function uploadPicture($_FILE)
  {
    // TODO: Implement!!!!!
    return $picture;
  }

  public function deletePicture($picid)
  {
    $pictures = Picture::loadPictures();
    $newpics = array();
    foreach($pictures as $pic)
    {
      if($picid != $pic->id)
      {
        $newpics[] = $pic;
      }
    }

    Pictures::savePictures($newpics);
  }

  public function comment($text)
  {
    if($user == User::getCurrentUser())
    {
      if(canComment($user))
      {
        $this->comments[] = new Comment($user, $text);
        return true;
      }
    }
    else
    {
      throw new Exception("Du bist nicht eingeloggt!");
    }

    return false;
  }

  public function canComment($user)
  {
    if($user->admin == 1)
      return true;

    foreach($this->comments as $c)
    {
      if($c->user->id == $user->id)
        return false;
    }

    return true;
  }

  public static function loadPictures()
  {
    $data = file_get_contents(PATH_PICTURE);
    $pictures = unserialize($data);
    return $pictures;
  }

  private static function savePictures($pictures)
  {
    $data = serialize($pictures);
    file_put_contents(PATH_PICTURE, $data);
  }
}


class Comment {
  public $user;

  public $text;

  public function __construct($user, $text)
  {
    $this->user = $user;
    $this->text = $text;
  }
}
