<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\Kalkulacka;
use Symfony\Component\Validator\Constraints as Assert;

class Operace
{
    /**
     * @Assert\NotBlank(message = "Tohle pole je povinné.")
     */
    private $operace = Kalkulacka::ADD;

    /**
     * @Assert\NotBlank(message = "Tohle pole je povinné.")
     * @Assert\Type(
     *     type="int",
     *     message="Hodnota {{ value }} není validní číslo."
     * )
     */
    private $PrvniCislo = 0;

    /**
     * @Assert\NotBlank(message = "Tohle pole je povinné.")
     * @Assert\Type(
     *     type="int",
     *     message="Hodnota {{ value }} není validní číslo."
     * )
     */
    private $DruheCislo = 0;


    public function getOperace(): int
    {
        return $this->operace;
    }

    public function setOperace(int $operace): self
    {
        $this->operace = $operace;
        return $this;
    }

    public function getPrvniCislo(): int
    {
        return $this->PrvniCislo;
    }

    public function setPrvniCislo(int $PrvniCislo): self
    {
        $this->PrvniCislo = $PrvniCislo;
        return $this;
    }

    public function getDruheCislo(): int
    {
        return $this->DruheCislo;
    }

    public function setDruheCislo(int $DruheCislo): self
    {
        $this->DruheCislo = $DruheCislo;
        return $this;
    }
}