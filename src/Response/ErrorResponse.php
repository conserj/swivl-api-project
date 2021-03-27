<?php

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

/**
 * Class ErrorResponse
 * @package App\Response
 */
class ErrorResponse extends JsonResponse
{
    private const STATUS = 'error';

    /**
     * OkResponse constructor.
     *
     * @param Throwable $error
     * @param array     $headers
     */
    public function __construct(Throwable $error, array $headers = [])
    {
        $data = [
            'status' => self::STATUS,
            'data' => null,
            'error' => [
                'code' => $error->getCode(),
            ],
        ];
        parent::__construct($data, self::HTTP_OK, $headers, false);
    }
}
