<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GetClassroomListParams
 * @package App\DTO
 */
class GetClassroomListParams
{
    private const DEFAULT_LIMIT = 20;

    /**
     * @var int
     * @Assert\NotBlank
     * @Assert\GreaterThan(value="0")
     */
    private int $page = 1;

    /**
     * @var int
     * @Assert\NotBlank
     * @Assert\GreaterThan(value="0")
     */
    private int $limit = self::DEFAULT_LIMIT;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     *
     * @return GetClassroomListParams
     */
    public function setPage(int $page): GetClassroomListParams
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return GetClassroomListParams
     */
    public function setLimit(int $limit): GetClassroomListParams
    {
        $this->limit = $limit;

        return $this;
    }
}