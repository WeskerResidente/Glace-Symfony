<?php

namespace App\Dto;

class PercentageInputDto
{
    public ?float $amountEuro = null;
    public ?float $amountDollar = null;

    public function __construct(?float $amountEuro = null, ?float $amountDollar = null)
    {
        $this->amountEuro = $amountEuro;
        $this->amountDollar = $amountDollar;
    }
}
