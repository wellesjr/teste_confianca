<?php

namespace lib;

class Environment
{

    /*---------------------------------------------------------------------------------------------------
     *                  Método responsável por carregar as variaveis de ambiente do projeto
     * ---------------------------------------------------------------------------------------------------*/
    public static function load($dir)
    {

        if (!file_exists($dir . '/.env')) {
            return false;
        }

        $lines = file($dir . '/.env');
        foreach ($lines as $line) {
            putenv(trim($line));
        }
    }
}
