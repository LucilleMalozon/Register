<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class AnnuaireController extends AbstractController
{
    #[Route('/', name: 'app_annuaire')]
    public function index(): Response
    {
        $contacts = [
            $this->createContact('Dupont', 'Jean', '0123456789'),
            $this->createContact('Durand', 'Marie', '0123456789'),
            $this->createContact('Bouhadana', 'Mohammed', '0123456789')
        ];
        return $this->render('annuaire/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    private function createContact(string $nom, string $prenom, string $telephone): Contact
    {
        $contact = new Contact();
        $contact
            ->setNom($nom)
            ->setPrenom($prenom)
            ->setTelephone($telephone);
        return $contact;
    }
}