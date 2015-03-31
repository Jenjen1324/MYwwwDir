<?php

define("PATH_PICTURE", "db/pictures");
define("PATH_PFILES", "img/gpics/");

class Picture {
  public $id;
  public $name;
  public $desc;
  public $filename;

  public $views;
  public $downloads;

  public $comments;

  public function __construct()
  {
    $this->views = 0;
    $this->downloads = 0;
    $this->comments = array();
  }

  public static function uploadPicture($title, $_FILE, $desc = "")
  {
    $picture = new Picture();

    $pics = Picture::loadPictures();
    if(sizeof($pics) < 1)
      $picture->id = 0;
    else
      $picture->id = $pics[sizeof($pics) - 1]->id + 1;
    $picture->name = $title;
    $picture->desc = $desc;
    $tmp = explode('.', $_FILE['name']);
    $ext = $tmp[sizeof($tmp) - 1];
    $picture->filename = md5($_FILE['name']) . "." . $ext;
    move_uploaded_file($_FILE['tmp_name'], PATH_PFILES . $picture->filename);

    $pics[] = $picture;

    Picture::savePictures($pics);

    return $picture;
  }

  public static function getPictureById($id)
  {
    $pics = Picture::loadPictures();
    foreach($pics as $p)
    {
      if($p->id == $id)
        return $p;
    }
    return false;
  }

  public function getExt()
  {
    $tmp = explode('.', $this->filename);
    return $tmp[sizeof($tmp) - 1];
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
    if($user = User::getCurrentUser())
    {
      if($this->canComment($user))
      {
        $this->comments[] = new Comment($user->id, $text, date('Y-m-d H:i:s'));
        Picture::editPicture($this);
        return true;
      }
      else
      {
        throw new Exception("Du kannst nicht kommentieren!");
      }
    }
    else
    {
      throw new Exception("Du bist nicht angemeldet!");
    }

    return false;
  }

  public function canComment($user)
  {
    if($user->admin == 1)

      return true;

    foreach($this->comments as $c)
    {
      if($c->uid == $user->id)
        return false;
    }

    return true;
  }

  public static function editPicture($pic)
  {
    $pics = Picture::loadPictures();
    $final = array();
    foreach($pics as $p)
    {
      if($p->id == $pic->id)
        $final[] = $pic;
      else
        $final[] = $p;
    }
    Picture::savePictures($final);
  }

  public static function loadPictures()
  {
    $data = file_get_contents(PATH_PICTURE);
    $pictures = unserialize($data);
    if(!$pictures)
      $pictures = array();
    return $pictures;
  }

  private static function savePictures($pictures)
  {
    $data = serialize($pictures);
    file_put_contents(PATH_PICTURE, $data);
  }
}


class Comment {
  public $uid;

  public $text;
  public $date;

  public function __construct($uid, $text, $date)
  {
    $this->user = $uid;
    $this->text = $text;
    $this->date = $date;
  }
}
