<?php

namespace App\Exception;

use LogicException;
use Throwable;

/**
 * Class ClassroomNotFoundException
 * @package App\Exception
 */
class ClassroomNotFoundException extends LogicException
{
    public const CODE = 101;

    /** @var int */
    public $code = self::CODE;

    /** @var string */
    public $message = 'Classroom not found';

    /**
     * ClassroomNotFoundException constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('', 0, $previous);
    }
}
