<?php

namespace Zyan\Beautiful\Rules;

use Zyan\Beautiful\RulesInterface;

/**
 * Class AAAA.
 *
 * @package Zyan\Beautiful\Rules
 *
 * @author 读心印 <aa24615@qq.com>
 */
class AAAA implements RulesInterface
{
    public static function go(string $str): bool
    {
        $isMatched = preg_match_all('/(\d)\1{3,}/m', $str, $matches);
        return $isMatched > 0 ? true : false;
    }
}
