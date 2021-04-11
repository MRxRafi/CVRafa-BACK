<?php


namespace App\Controller;


use App\Repository\FrameworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class FrameworkController extends AbstractController
{
    // public const RUTA_API = '/framework';

    private FrameworkRepository $frameworkRepository;

    public function __construct(FrameworkRepository $frameworkRepository) {
        $this->frameworkRepository = $frameworkRepository;
    }

    public function cgetAction(): JsonResponse {
        $frameworks = $this->frameworkRepository
            ->findAll();
        return new JsonResponse($frameworks);
    }
}