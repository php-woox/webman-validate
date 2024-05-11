<?php

declare (strict_types=1);

namespace Woox\WebmanValidate\Exception;

use function is_array;
use function implode;

/**
 * 数据验证异常
 */
class ValidateException extends \RuntimeException
{
    protected string|array $error;

    public function __construct($error)
    {
        parent::__construct();
        $this->error = $error;
        $this->message = is_array($error) ? implode(PHP_EOL, $error) : $error;
    }

    /**
     * 获取验证错误信息
     * @access public
     * @return array|string
     */
    public function getError(): array|string
    {
        return $this->error;
    }
}