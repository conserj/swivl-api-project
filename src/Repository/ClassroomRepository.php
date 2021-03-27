<?php

namespace App\Repository;

use App\Entity\Classroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Classroom|null              find($id, $lockMode = null, $lockVersion = null)
 * @method Classroom|null              findOneBy(array $criteria, array $orderBy = null)
 * @method Classroom[]|ArrayCollection findAll()
 * @method Classroom[]|ArrayCollection findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassroomRepository extends ServiceEntityRepository
{
    /** @var EntityManagerInterface */
    private EntityManagerInterface $manager;

    /**
     * ClassroomRepository constructor.
     *
     * @param ManagerRegistry        $registry
     * @param EntityManagerInterface $manager
     */
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Classroom::class);
        $this->manager = $manager;
    }

    /**
     * @param Classroom $classroom
     */
    public function save(Classroom $classroom): void
    {
        $this->manager->persist($classroom);
        $this->manager->flush();
    }

    /**
     * @param Classroom $classroom
     */
    public function delete(Classroom $classroom): void
    {
        $this->manager->remove($classroom);
        $this->manager->flush();
    }
}
