<?php

namespace App\Controller;

use App\Dto\PercentageInputDto;
use App\Service\PercentageCalculatorService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PercentageCalculatorService $converter, Request $request): Response
    {
        $euro = $request->query->get('euro');
        $dollar = $request->query->get('dollar');

        $dto = new PercentageInputDto(
            $euro !== null && is_numeric($euro) ? floatval($euro) : null,
            $dollar !== null && is_numeric($dollar) ? floatval($dollar) : null
        );

        $resultEuroToDollar = null;
        $resultDollarToEuro = null;

        if ($dto->amountEuro !== null) {
            $resultEuroToDollar = $converter->convertEuroToDollar($dto->amountEuro);
        }

        if ($dto->amountDollar !== null) {
            $resultDollarToEuro = $converter->convertDollarToEuro($dto->amountDollar);
        }

        return $this->render('home/home.html.twig', [
            'resultEuroToDollar' => $resultEuroToDollar,
            'resultDollarToEuro' => $resultDollarToEuro,
        ]);
    }
}
