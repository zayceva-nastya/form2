<?php

namespace Core;

use TexLab\MyDB\DbEntity;

class Authorization extends DbEntity
{
    public function getAuthorization( array $condition)
    {
        if (!empty($this->get($condition))) {
            echo "<h1>Добро пожаловать!!</h1>";
        } else {
            echo "<h1>Такого пользователя не существует</h1>";
        }
        return $this;
    }
}
