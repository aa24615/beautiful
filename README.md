

# zyan/beautiful

这是一个通用靓号检测,手机靓号正则规则     
可用于检测手机号,座机号,QQ号等数字类账号

内置规则

- [x] AAA
- [x] AAAA
- [x] AAAAA
- [x] AAAAAA
- [x] AABB
- [x] AABBCC
- [x] AABBCCDD
- [x] ABABAB
- [x] ABCDEF
- [x] ABCABC
- [x] ABCDABCD

## 要求

1. php >= 7.2
2. Composer

## 安装

```shell
composer require zyan/beautiful -vvv
```

## 使用

```php
use Zyan\beautiful\beautiful;

Beautiful::go('15912345678');

```

## 配置

```php

Beautiful::config(
    ['靓号规则 比如 AAAA AABB ABCD...'],
    ['处理类型: mobile为手机号(只取后8位) 不传为通用,也就是对输入源不作任何处理']
);

//合并默认配置规则 也就是默认的规则上加上新的规则
Beautiful::config(['AAAA','AAABBB','AABB'],['mobile']);

//重新设置新规则 会复盖默认的规则
Beautiful::setConfig(['AAAA','AAABBB','AABB'],['mobile']);

//获取当前全局配置
Beautiful::getConfig();

//以上都是全局配置
//如果某对某一次的检测单独设置请传入到后面
Beautiful::go('15912345678',['AAAA','AAABBB','AABB'],['mobile']);

```
## 匹配靓号

```php
Beautiful::go('15912345678');
// ['ABCDEF'] 
```

返回命中规则 多个返回多个 未命中返回空数组

## 实现自已的规则

您需要继承 `Zyan\Beautiful\RulesInterface`   
实现 `public static function go(string $str): bool` 方法   
示例如下:
```php 
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
```

可使用 `Beautiful::setRules(string $name,RulesInterface $value)` 方法进行配置

```php 
Beautiful::setRules('ABCDEF',Zyan/Beautiful/Rules/ABCDEF:class); //这个class取决于您的命名空间
```

接下来您就可以使用了

```php
Beautiful::go('15912345678',['ABCDEF']); //全局配置请用 Beautiful::Config(['ABCDEF'])
// ['ABCDEF']
```

## 参与贡献

1. fork 当前库到你的名下
2. 在你的本地修改完成审阅过后提交到你的仓库
3. 提交 PR 并描述你的修改，等待合并

## License

[MIT license](https://opensource.org/licenses/MIT)
