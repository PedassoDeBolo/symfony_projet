<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Creation d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        $nbEntreprises = $faker->numberBetween($min = 10, $max = 13);
        

        $dutInfo = new Formation();
        $dutInfo->setIntitule("DUT Informatique");
        $dutInfo->setNiveau("2ème année");
        $dutInfo->setVille($faker->city());
        
        $GIM = new Formation();
        $GIM->setIntitule("GIM EOEL");
        $GIM->setNiveau("1ème année");
        $GIM->setVille($faker->city());

        $dutTIC = new Formation();
        $dutTIC->setIntitule("DUT TIC");
        $dutTIC->setNiveau("2ème année");
        $dutTIC->setVille($faker->city());
        // array avec les id de chaque formation
        $tabFormations = array($dutInfo, $GIM, $dutTIC);

        foreach($tabFormations as $formation)
        {
            $manager->persist($formation);
        }

        for($i = 0; $i <= $nbEntreprises; $i++)
        {
            //creation des entreprises
            $entreprise = new Entreprise();
            $nomEntreprise = $faker->company();
            
            $entreprise = setNom($nomEntreprise);
            $entreprise = setAdresse($faker->address());
            $entreprise = setMilieu($faker->bs());
            $nbStageParEntreprise = $faker->numberBetween($min = 0, $max = 3);

            
            // pour chaque entreprise créée, de 0 à 3 stages peuvent être liés a celle-ci
            for($j = 0; $j <= $nbStageParEntreprise; $j++)
            {
                //creation des stages
                $stage = new Stage();
                $stage->setIntule($faker->refexify('Stage chez '.$nomEntreprise));
                $stage->setDescription($faker->realText($maxNbChars = 255, $indexSize = 2));
                $stage->setDateDebut($faker->dateTimeBetween('now', '+4 months'));

                $dureeStage = $faker->numberBetween($min = 1, $max = 3);
                $stage->setDuree($faker->refexify($dureeStage.' mois'));

                $stage->setCompetencesRequises($faker->realText($maxNbChars = 50, $indexSize = 2));
                $stage->setExperienceRequise($faker->realText($maxNbChars = 100, $indexSize = 2));
                
                // ajout de l'entreprise id et la formation id dans le stage
                $stage->setEntrep($entreprise->getId());

                $uneFormation = $faker->randomElement($tabFormations);
                $stage->setForm($uneFormation->getID());

                //ajout des stages id dans l'entreprise correspondante
                $entreprise->addStage($stage->getId());

                $manager->persist($stage);

            }

            $manager->persist($entreprise);
        }

        $manager->flush();
    }
}
