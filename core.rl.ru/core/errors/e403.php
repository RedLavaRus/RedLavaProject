<?php

namespace Core\Errors;


use \CFG;
  /*
  отвечает за ошибку 403
  */
class E403
{
    public static function show()
    {
      
        echo "Ошибка 403, нет прав доступа!";
        die();
    }
}