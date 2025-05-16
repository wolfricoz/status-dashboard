<?php

namespace App\Controller;

use App\Service\AgeVerifierApi;
use App\Service\BanwatchApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_dashboard')]
    public function index(): Response
    {

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'banwatch' => (new BanwatchApi())->send_request('/ping', method: 'POST'),
            'ageverifier' => (new AgeVerifierApi())->send_request('/ping', method: 'POST'),
        ]);
    }
}
