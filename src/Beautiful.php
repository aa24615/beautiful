<?php

namespace Zyan\Beautiful;

use Zyan\Beautiful\Handle\Mobile;
use Zyan\Beautiful\Rules\AAA;
use Zyan\Beautiful\Rules\AAAA;
use Zyan\Beautiful\Rules\AAAAA;
use Zyan\Beautiful\Rules\AAAAAA;
use Zyan\Beautiful\Rules\AABB;
use Zyan\Beautiful\Rules\AABBCC;
use Zyan\Beautiful\Rules\AABBCCDD;
use Zyan\Beautiful\Rules\ABABAB;
use Zyan\Beautiful\Rules\ABCABC;
use Zyan\Beautiful\Rules\ABCDABCD;
use Zyan\Beautiful\Rules\ABCDEF;

/**
 * Class Beautiful.
 *
 * @package Zyan\Beautiful
 *
 * @author 读心印 <aa24615@qq.com>
 */

class Beautiful
{
    /**
     * @var array<string,RulesInterface>
     */
    protected static $rulesClass = [
        'AAA' => AAA::class,
        'AAAA' => AAAA::class,
        'AAAAA' => AAAAA::class,
        'AAAAAA' => AAAAAA::class,
        'AABB' => AABB::class,
        'AABBCC' => AABBCC::class,
        'AABBCCDD' => AABBCCDD::class,
        'ABABAB' => ABABAB::class,
        'ABCDEF' => ABCDEF::class,
        'ABCABC' => ABCABC::class,
        'ABCDABCD' => ABCDABCD::class,
    ];

    /**
     * @var array<string,HandleInterface>
     */
    protected static $handleClass = [
        'mobile' => Mobile::class
    ];

    protected static $rules = [
        'AAA',
        'AAAA',
        'AAAAA',
        'AAAAAA',
        'AABB',
        'AABBCC' ,
        'AABBCCDD',
        'ABABAB',
        'ABCDEF',
        'ABCABC',
        'ABCDABCD',
    ];

    protected static $handle = [];
    /**
     * config.
     *
     * @param array $rules
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function config($rules, $handle = [])
    {
        self::$rules = array_merge(self::$rules, $rules);
        self::$handle = array_merge(self::$handle, $handle);
    }

    /**
     * setConfig.
     *
     * @param array $config
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function setConfig($rules, $handle = [])
    {
        self::$rules = $rules;
        self::$handle = $handle;
    }

    /**
     * getConfig.
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function getConfig()
    {
        return [
            'rules' => self::$rules,
            'handle' => self::$handle
        ];
    }

    /**
     * setRules.
     *
     * @param
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function setRules(string $name, RulesInterface $rules)
    {
        self::$rulesClass[$name] = $rules;
    }

    /**
     * go.
     *
     * @param string $str
     * @param array $config
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function go(string $str, array $rules = [], array $handle = [])
    {
        $rules = $rules ?: self::$rules;
        $handle = $handle ?: self::$handle;

        $str = self::handle($handle, $str);

        $data = [];
        foreach ($rules as $rule) {
            $ruleName = strtoupper($rule);
            if (isset(self::$rulesClass[$ruleName])) {
                if (self::$rulesClass[$ruleName]::go($str)) {
                    $data[] = $ruleName;
                }
            } else {
                throw new \Exception("Rules class cannot find name: {$ruleName}");
            }
        }

        return $data;
    }

    /**
     * handle.
     *
     * @param array $handle
     * @param string $str
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    protected static function handle($handle, $str)
    {
        if (!$handle) {
            return $str;
        }

        foreach ($handle as $name) {
            $handleName = strtolower($name);
            if (isset(self::$handleClass[$handleName])) {
                $str = self::$handleClass[$handleName]::handle($str);
            } else {
                throw new \Exception("Handle class cannot find name: {$handleName}");
            }
        }

        return $str;
    }
}
