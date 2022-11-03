<?php

namespace Zyan\Beautiful;

use Zyan\Beautiful\Exception\HandleException;
use Zyan\Beautiful\Exception\RulesException;
use Zyan\Beautiful\Rules\AAAA;

/**
 * Class Beautiful.
 *
 * @package Zyan\Beautiful
 *
 * @author 读心印 <aa24615@qq.com>
 */

class Beautiful
{
    protected static $rulesClass = [
        'AAAA' => AAAA::class,
    ];

    protected static $handleClass = [

    ];

    protected static $rules = [
        'AAAA'
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
    public static function config($rules,$handle=[])
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
    public static function setConfig($rules,$handle=[])
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
     * go.
     *
     * @param string $str
     * @param array $config
     *
     * @return
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function go(string $str, array $rules = [], array $handle = [])
    {
        $rules = $rules ?: self::$rules;
        $handle = $handle ?: self::$handle;

        $str = self::handle($handle, $str);

        var_dump($str);

        $data = [];
        foreach ($rules as $rule) {
            $ruleName = strtoupper($rule);
            $application = "\\Zyan\\Beautiful\\Rules\\$ruleName";
            try {
                if ($application::go($str)) {
                    $data[] = $ruleName;
                }
            } catch (\Exception $exception) {
                throw new RulesException("Rules class cannot find name: {$application}");
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
            /**
             * @var HandleInterface
             */
            $handleName = ucfirst($name);
            $application = "\\Zyan\\Beautiful\\Handle\\$handleName";
            try {
                $str = $application::handle($str);
            } catch (\Exception $exception) {
                throw new HandleException($application);
            }
        }

        return $str;
    }
}
