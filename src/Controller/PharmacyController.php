<?php

namespace App\Controller;

use App\Entity\Medication;
use App\Entity\Pharmacy;
use App\Repository\PharmacyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PharmacyController extends AbstractController
{
    /**
     * @Route("/pharma", name="pharma")
     * @param PharmacyRepository $pharmacyRepository
     * @return Response
     */
    public function index(PharmacyRepository $pharmacyRepository)
    {
        return $this->render('pharma/index.html.twig', [
            'pharmacy' => $pharmacyRepository->findAll()
        ]);
    }

    /**
     * @Route("/direction", name="direction")
     * @return Response
     */
    public function direction()
    {
        return $this->render('pharma/direction.html.twig');
    }

}
