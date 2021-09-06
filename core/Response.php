<?php

namespace app\core;

/**
 * Class Response
 * 
 * @author gyan
 * @package app\core;
 */

class Response
{
    public function setStatusCode(int $int)
    {
        http_response_code($int);
    }
}