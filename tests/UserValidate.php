<?php
declare (strict_types=1);

namespace Woox\Webman\Validate\Tests;

use Woox\WebmanValidate\Validate;

class UserValidate extends Validate
{
    protected array $rule = [
        'name' => 'require|max:25',
        'age' => 'require|number|between:1,120',
        'email' => 'require|email'
    ];

    protected array $message = [
        'name.require' => '名称必须',
        'name.max' => '名称最多不能超过25个字符',
        'age.require' => '年龄必须是数字',
        'age.number' => '年龄必须是数字',
        'age.between' => '年龄只能在1-120之间',
        'email.require' => '邮箱必须是数字',
        'email.email' => '邮箱格式错误'
    ];
}