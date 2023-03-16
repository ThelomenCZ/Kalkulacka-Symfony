<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\Operace;

class Kalkulacka
{
    public function add(int $PrvniCislo, int $DruheCislo): int
    {
        return $PrvniCislo + $DruheCislo;
    }

    public function subtract(int $PrvniCislo, int $DruheCislo): int
    {
        return $PrvniCislo - $DruheCislo;
    }

    public function multiply(int $PrvniCislo, int $DruheCislo): int
    {
        return $PrvniCislo * $DruheCislo;
    }

    public function divide(int $PrvniCislo, int $DruheCislo): int
    {
        return $PrvniCislo / $DruheCislo;
    }

    const
        ADD = 1,
        SUBSTRACT = 2,
        MULTIPLY = 3,
        DIVIDE = 4;

    public function getOperace(): array
    {
        return[
            'sčítání' => self::ADD,
            'odečítání' => self::SUBSTRACT,
            'násobení' => self::MULTIPLY,
            'dělení' => self::DIVIDE
        ];
    }

    public function vypocitej(Operace $operace): ?int
    {
        $PrvniCislo = $operace->getPrvniCislo();
        $DruheCislo = $operace->getDruheCislo();

        return match ($operace->getOperace()) {
            self::ADD => $this->add($PrvniCislo, $DruheCislo),
            self::SUBSTRACT => $this->subtract($PrvniCislo, $DruheCislo),
            self::MULTIPLY => $this->multiply($PrvniCislo, $DruheCislo),
            self::DIVIDE => $this->divide($PrvniCislo, $DruheCislo),
            default => null,
        };
    }
}