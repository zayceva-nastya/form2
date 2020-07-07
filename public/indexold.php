<?php
include "../vendor/autoload.php";

use Core\Config;
use TexLab\MyDB\DB;
use TexLab\MyDB\DbEntity;



if (!empty($_POST)) {
  (new DbEntity(
    Config::MYSQL_TABLE,
    DB::Link([
      'host' => Config::MYSQL_HOST,
      'username' => Config::MYSQL_USER_NAME,
      'password' => Config::MYSQL_PASSWORD,
      'dbname' => Config::MYSQL_DATABASE
    ])
  ))->add($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1><?= !empty($_POST) ? "Спасибо за ваш отзыв!" : "" ?></h1>
  <form action="?" method="post">
    <label>Name <input type="text" name='Name'></label>
    <br>
    <label>Email <input type="text" name='Email'></label>
    <br>
    <label>Review <textarea name="Review" cols="20" rows="5"></textarea></label>
    <br>
    <input type="submit" value="отправить">

  </form>
</body>

</html>