<?php

namespace App\Controller;

use App\DTO\PercentageInputDto;
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

        $resultEuroToDollar = null;
        $resultDollarToEuro = null;

                if ($euro !== null && is_numeric($euro)) {
            $resultEuroToDollar = $converter->convertEuroToDollar(floatval($euro));
        }

        if ($dollar !== null && is_numeric($dollar)) {
            $resultDollarToEuro = $converter->convertDollarToEuro(floatval($dollar));
        }

        return $this->render('home/home.html.twig', [
            'resultEuroToDollar' => $resultEuroToDollar,
            'resultDollarToEuro' => $resultDollarToEuro,
        ]);
    }
}
