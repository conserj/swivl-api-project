<?php

namespace App\Exception;

use InvalidArgumentException;
use Throwable;

/**
 * Class InvalidParamsException
 * @package App\Exception
 */
class InvalidParamsException extends InvalidArgumentException
{
    public const CODE = 100;

    /** @var int */
    public $code = self::CODE;

    /** @var string */
    public $message = 'Invalid params';

    /**
     * InvalidParamsException constructor.
     *
     * @param string         $message
     * @param Throwable|null $previous
     */
    public function __construct($message = "", Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
