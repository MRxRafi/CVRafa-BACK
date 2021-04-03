<?php


namespace App\Controller;


use App\Repository\StudyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class StudyController extends AbstractController
{
    public const RUTA_API = '/studies';

    private StudyRepository $studyRepository;

    public function __construct(StudyRepository $studyRepository) {
        $this->studyRepository = $studyRepository;
    }

    public function cgetAction(): JsonResponse {
        $studies = $this->studyRepository
            ->findAll();
        return new JsonResponse($studies);
    }
}