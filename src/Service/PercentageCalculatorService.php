<?php

namespace App\Service;

use App\Dto\PercentageInputDto;
use App\Dto\PercentageOutputDto;

class PercentageCalculatorService
{
    private float $euroToDollarRate = 1.08;
    private float $dollarToEuroRate = 0.92;

    public function convertEuroToDollar(float $amountEuro): PercentageOutputDto
    {
        $converted = $amountEuro * $this->euroToDollarRate;
        return new PercentageOutputDto($amountEuro, $converted);
    }

    public function convertDollarToEuro(float $amountDollar): PercentageOutputDto
    {
        $converted = $amountDollar * $this->dollarToEuroRate;
        return new PercentageOutputDto($converted, $amountDollar);
    }
}
