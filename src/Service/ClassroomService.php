<?php

namespace App\Service;

use App\DTO\CreateClassroomParams;
use App\DTO\GetClassroomListParams;
use App\DTO\UpdateClassroomParams;
use App\Entity\Classroom;
use App\Exception\ClassroomNotFoundException;
use App\Interfaces\ClassroomServiceInterface;
use App\Repository\ClassroomRepository;

/**
 * Class ClassroomService
 * @package App\Service
 */
class ClassroomService implements ClassroomServiceInterface
{
    /** @var ClassroomRepository */
    private ClassroomRepository $repository;

    /**
     * ClassroomService constructor.
     *
     * @param ClassroomRepository $repository
     */
    public function __construct(ClassroomRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     *
     * @return Classroom
     */
    public function getById(int $id): Classroom
    {
        $classroom = $this->repository->find($id);
        if (null === $classroom) {
            throw new ClassroomNotFoundException();
        }

        return $classroom;
    }

    /**
     * @param GetClassroomListParams $params
     *
     * @return array
     */
    public function list(GetClassroomListParams $params): array
    {
        return $this->repository->findBy(
            [],
            ['created' => 'DESC'],
            $params->getLimit(),
            ($params->getPage() - 1) * $params->getLimit()
        );
    }

    /**
     * @param CreateClassroomParams $params
     */
    public function create(CreateClassroomParams $params): void
    {
        $classroom = new Classroom();
        $classroom->setName($params->getName());
        $this->repository->save($classroom);
    }

    /**
     * @param int                   $id
     * @param UpdateClassroomParams $params
     */
    public function update(int $id, UpdateClassroomParams $params): void
    {
        $classroom = $this->repository->find($id);
        if (null !== $params->getName()) {
            $classroom->setName($params->getName());
        }
        $this->repository->save($classroom);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $classroom = $this->getById($id);
        $this->repository->delete($classroom);
    }

    /**
     * @param int $id
     */
    public function toggleActive(int $id): void
    {
        $classroom = $this->getById($id);
        $classroom->setActive(!$classroom->getActive());
        $this->repository->save($classroom);
    }
}
