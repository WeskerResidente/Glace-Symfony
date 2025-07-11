<?php

namespace App\Dto;

class PercentageOutputDto
{
    private ?float $amountEuro;
    private ?float $amountDollar;

    public function __construct(?float $amountEuro = null, ?float $amountDollar = null)
    {
        $this->amountEuro = $amountEuro;
        $this->amountDollar = $amountDollar;
    }

    public function getAmountEuro(): ?float
    {
        return $this->amountEuro;
    }

    public function getAmountDollar(): ?float
    {
        return $this->amountDollar;
    }
}
