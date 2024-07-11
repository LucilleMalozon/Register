<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $contact = $this->createContact(
                $faker->lastName(),
                $faker->firstName(),
                $faker->phoneNumber(),
                $faker->imageUrl(),
                $faker->email()
            );
            $manager->persist($contact);
        }

        $manager->flush();
    }

    private function createContact(string $nom, string $prenom, string $telephone, string $image, string $email): Contact
    {
        $contact = new Contact();
        $contact
            ->setNom($nom)
            ->setPrenom($prenom)
            ->setTelephone($telephone)
            ->setImage($image)
            ->setEmail($email);
        return $contact;
    }
}
