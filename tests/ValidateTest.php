<?php
namespace Woox\Webman\Validate\Tests;

use PHPUnit\Framework\TestCase;

class ValidateTest extends TestCase
{
    /**
     * @desc: 基础测试
     */
    public function testBasic()
    {
        $data = [
            'name' => 'codeloving',
            'age' => 24,
            'email' => 'codeloving@163.com'
        ];
        $validate = new UserValidate();
        self::assertIsBool($validate->check($data));
        self::assertTrue($validate->check($data));
    }

    /**
     * @desc: 助手函数测试
     */
    public function testHelper()
    {
        $data = [
            'name' => 'codeloving',
            'age' => 24,
            'email' => 'codeloving@163.com'
        ];
        self::assertIsBool(validate($data, UserValidate::class));
        self::assertTrue(validate($data, UserValidate::class));
    }

    /**
     * @desc: 助手面板
     */
    public function testFacade()
    {
        $validate = \Woox\WebmanValidate\Facade\Validate::rule('age', 'number|between:1,120')
            ->rule([
                'name' => 'require|max:25',
                'email' => 'email'
            ]);
        $data = [
            'name' => 'codeloving',
            'email' => 'codeloving@163.com'
        ];
        self::assertIsBool($validate->check($data));
    }
}