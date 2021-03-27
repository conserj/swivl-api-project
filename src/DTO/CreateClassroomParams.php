<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CreateClassroomParams
 * @package App\DTO
 */
class CreateClassroomParams
{
    /**
     * @var string|null
     * @Assert\NotNull()
     * @Assert\Regex(pattern="/^\w+/")
     */
    private ?string $name;

    /**
     * @var bool|null
     * @Assert\NotNull()
     */
    private ?bool $active;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return CreateClassroomParams
     */
    public function setName(string $name): CreateClassroomParams
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return CreateClassroomParams
     */
    public function setActive(bool $active): CreateClassroomParams
    {
        $this->active = $active;

        return $this;
    }
}