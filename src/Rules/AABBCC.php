<?php

namespace Zyan\Beautiful\Rules;

use Zyan\Beautiful\RulesInterface;

/**
 * Class AABBCC.
 *
 * @package Zyan\Beautiful\Rules
 *
 * @author 读心印 <aa24615@qq.com>
 */
class AABBCC implements RulesInterface
{
    public static function go(string $str): bool
    {
        $isMatched = preg_match_all('/([\d])\1{1}([\d])\2{1}([\d])\3{1}/m', $str, $matches);
        return $isMatched > 0 ? true : false;
    }
}
