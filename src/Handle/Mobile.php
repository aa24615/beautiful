<?php

namespace Zyan\Beautiful\Handle;

use Zyan\Beautiful\HandleInterface;

class Mobile implements HandleInterface
{
    public static function handle(string $str): string
    {
        return substr($str, -8, 8);
    }
}
