<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UpdateClassroomParams
 * @package App\DTO
 */
class UpdateClassroomParams
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
     * @return UpdateClassroomParams
     */
    public function setName(string $name): UpdateClassroomParams
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
     * @return UpdateClassroomParams
     */
    public function setActive(bool $active): UpdateClassroomParams
    {
        $this->active = $active;

        return $this;
    }
}
