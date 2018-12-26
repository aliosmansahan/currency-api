<?php

namespace App\Controller;

use App\Service\ExchangeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(ExchangeService $service)
    {

        return $this->render(
            '@App/Exchange/index.html.twig',
            [
                'exchanges' => $service->getCheapestExchangeRateList(),
            ]
        );
    }

}
