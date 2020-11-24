<?php
namespace Libs\GuardPassHash;

class HasherRL
{
    public static function startHash($url)
    {
        $pass = $url["post"]["pass"];
        $login = $url["post"]["login"];
        $passHash = hash('sha256', $pass);
        $loginHash = hash('sha256', $login);
        $hashlvl1 = hash('sha256', $passHash.$loginHash.\CFG::$salt);
        $hashlvl2 = hash('sha256', $passHash.$loginHash.$hashlvl1);
        return $hashlvl2;
    }

}


?>