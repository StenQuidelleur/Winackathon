<?php

namespace App\Controller;

use App\Entity\Medication;
use App\Entity\Pharmacy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PharmMedicController extends AbstractController
{
    /**
     * @Route("/pharm/medic", name="pharm_medic")
     */
    public function index()
    {
        $pharmacy = $this->getDoctrine()
            ->getRepository(Pharmacy::class)
            ->findAll();

        $medication = $this->getDoctrine()
            ->getRepository(Medication::class)
            ->findAll();
        return $this->render('pharm_medic/index.html.twig', [
            'pharmacy' => $pharmacy,
            'medication' => $medication
        ]);
    }
}
