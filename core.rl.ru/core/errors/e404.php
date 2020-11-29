<?php

namespace Core\Errors;


use \CFG;
  /*
  отвечает за ошибку 404
  */
class E404
{
    public static function show()
    {
        echo "Ошибка 404, страница не найдена!";
        die();
    }
}