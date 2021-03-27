<?php

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class OkResponse
 * @package App\Response
 */
class OkResponse extends JsonResponse
{
    private const STATUS = 'ok';

    /**
     * OkResponse constructor.
     *
     * @param array|null $data
     * @param array      $headers
     */
    public function __construct($data = null, array $headers = [])
    {
        $data = [
            'status' => self::STATUS,
            'data' => $data,
            'error' => null,
        ];
        parent::__construct($data, static::HTTP_OK, $headers, false);
    }
}
