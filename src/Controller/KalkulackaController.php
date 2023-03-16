<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Operace;
use App\Model\Kalkulacka;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class KalkulackaController extends  AbstractController
{
    #[Route('/kalkulacka', name:'kalkulacka')]
    public function index(Request $request, Kalkulacka $kalkulacka): Response
    {
        $kalkulackaForm = $this->createFormBuilder(new Operace())
            ->add('operace', ChoiceType::class, [
                'label' => 'Operace:',
                 'choices' => $kalkulacka->getOperace(),
                 'expanded'=>true,
                 'multiple'=>false
                ])
            ->add('PrvniCislo', null, ['label' => 'První číslo'])
            ->add('DruheCislo', null, ['label' => 'Druhé číslo'])
            ->add('vypocitej', SubmitType::class, ['label' => 'Spočítej výsledek'])
            ->getForm();
        $kalkulackaForm->handleRequest($request);
        if ($kalkulackaForm->isSubmitted() && $kalkulackaForm->isValid())
            $vysledek = $kalkulacka->vypocitej($kalkulackaForm->getData());

        return $this->render('Kalkulator/index.html.twig', [
            'kalkulackaForm' => $kalkulackaForm->createView(),
            'vysledek' => isset($vysledek) ? $vysledek : null
    ]);
    }
}