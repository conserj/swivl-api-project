<?php

namespace App\Interfaces;

use App\DTO\CreateClassroomParams;
use App\DTO\GetClassroomListParams;
use App\DTO\UpdateClassroomParams;
use App\Entity\Classroom;

/**
 * Interface ClassroomServiceInterface
 * @package App\Interfaces
 */
interface ClassroomServiceInterface
{
    /**
     * @param int $id
     *
     * @return Classroom
     */
    public function getById(int $id): Classroom;

    /**
     * @param GetClassroomListParams $params
     *
     * @return Classroom[]
     */
    public function list(GetClassroomListParams $params): array;

    /**
     * @param CreateClassroomParams $params
     */
    public function create(CreateClassroomParams $params): void;

    /**
     * @param int                   $id
     * @param UpdateClassroomParams $params
     */
    public function update(int $id, UpdateClassroomParams $params): void;

    /**
     * @param int $id
     */
    public function delete(int $id): void;

    /**
     * @param int $id
     */
    public function toggleActive(int $id): void;
}
