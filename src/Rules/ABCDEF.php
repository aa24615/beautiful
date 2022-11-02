<?php


namespace Zyan\Beautiful\Rules;


use Zyan\Beautiful\RulesInterface;

/**
 * Class ABCDEF.
 *
 * @package Zyan\Beautiful\Rules
 *
 * @author 读心印 <aa24615@qq.com>
 */
class ABCDEF implements RulesInterface
{
    public static function go(string $str): bool
    {
        $isMatched = preg_match_all('/^\d(?:(?:0(?=1)|1(?=2)|2(?=3)|3(?=4)|4(?=5)|5(?=6)|6(?=7)|7(?=8)|8(?=9)|9(?=0)){5,})\d/m', $str, $matches);
        return $isMatched>0 ? true : false;
    }
}