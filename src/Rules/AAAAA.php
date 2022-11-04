<?php

namespace Zyan\Beautiful\Rules;

use Zyan\Beautiful\RulesInterface;

/**
 * Class AAAAA.
 *
 * @package Zyan\Beautiful\Rules
 *
 * @author 读心印 <aa24615@qq.com>
 */
class AAAAA implements RulesInterface
{
    public static function go(string $str): bool
    {
        $isMatched = preg_match_all('/(\d)\1{4,}/m', $str, $matches);
        return $isMatched > 0 ? true : false;
    }
}
