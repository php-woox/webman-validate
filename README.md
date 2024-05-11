# php-woox/webman-validate

基于ThinkPHP6修改的可用于 [webman](https://www.workerman.net/doc/webman/) 的通用validate数据验证器。

## 安装

```shell
composer require php-woox/webman-validate
```

## 基础用法

~~~php
<?php
namespace app\index\validate;

use Woox\WebmanValidate\Validate;

class UserValidate extends Validate
{
    protected $rule =   [
        'name'  => 'require|max:25',
        'age'   => 'require|number|between:1,120',
        'email' => 'require|email'
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过25个字符',
        'age.require'   => '年龄必须是数字',
        'age.number'   => '年龄必须是数字',
        'age.between'  => '年龄只能在1-120之间',
        'email.require'        => '邮箱必须是数字',
        'email.email'        => '邮箱格式错误'
    ];
}
~~~

验证器调用代码如下：

~~~php
$data = [
    'name'  => 'codeloving',
    'age'  => 24,
    'email' => 'codeloving@163.com'
];
$validate = new app\index\validate\UserValidate;

if (!$validate->check($data)) {
    var_dump($validate->getError());
}
~~~

## 助手函数（推荐）

```php
$data = [
    'name'  => 'codeloving',
    'age'  => 24,
    'email' => 'codeloving@163.com'
];
validate($data, \app\index\validate\UserValidate::class);
```
> 验证错误会自动抛出异常

## 使用面板Facade

```php
$validate = \Woox\WebmanValidate\Facade\Validate::rule('age', 'number|between:1,120')
    ->rule([
        'name'  => 'require|max:25',
        'email' => 'email'
    ]);
$data = [
    'name'  => 'codeloving',
    'email' => 'codeloving@163.com'
];
if (!$validate->check($data)) {
    var_dump($validate->getError());
}
```

更多用法可以参考6.0完全开发手册的[验证](https://www.kancloud.cn/manual/thinkphp6_0/1037623)章节

