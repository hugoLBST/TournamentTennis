<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Match;
use App\Entity\Set;
use App\Entity\Tour;
use App\Entity\Tournoi;
use App\Entity\Utilisateur;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR'); // create a French faker
        // On crée 2 utilisateurs (minimum pour 1 match)
        $user1 = new Utilisateur();
        $user1->setNom("Lecourt");
        $user1->setPrenom("Leo");
        $user1->setDateNaissance("05/12/2000");
        $user1->setEmail("leo.lecourt@hotmail.com");
        $user1->setTelephone("0671487442");
        $user1->setNiveau("30/1");
        $manager->persist($user1);

        $user2 = new Utilisateur();
        $user2->setNom("Bouchet");
        $user2->setPrenom("Thomas");
        $user2->setDateNaissance("04/10/2000");
        $user2->setEmail("toto@gmail.com");
        $user2->setTelephone("0565717414");
        $user2->setNiveau("30/1");
        $manager->persist($user2);

        // On crée un tournoi
        $tournoi = new Tournoi();
        $tournoi->setNom("Tournoi Bayonne");
        $tournoi->setAdresse("2 allée de Plaisance, 64600, Anglet");
        $tournoi->setDateDebutTournoi("01/02/2020");
        $tournoi->setDateFinTournoi("01/03/2020");
        $tournoi->setEstVisible(TRUE);
        $tournoi->setSurface("Gazon");
        $tournoi->setCategorieAge("14/16");
        $tournoi->setGenreHomme(FALSE);
        $tournoi->setDescription("Venez nombreux !");
        $tournoi->setDateDebutInscription("15/01/2020");
        $tournoi->setDateFinInscription("20/01/2020");
        $tournoi->setInscriptionManuelle(FALSE);
        $tournoi->setNombrePlaces(10);
        $tournoi->setMotDePasse("azerty");
        $tournoi->setValidationInscriptions(FALSE);
        $tournoi->setNbSetsGagnants(2);
        $manager->persist($tournoi);
        // Ajout de tours dans ce tournoi
        $nbTours=$faker->numberBetween(1,2);
            for($i=1; $i<=$nbTours; $i++){
                $tour = new Tour();
                $tour->setType("Intermédiaire");
                $tour->setDateFin(date($format = 'Y/m/d', $startdate = 'now'));
                $tour->setStatut("Organisation");
                $tour->setNumero($i);
                $tour->setTournoi($tournoi);
                $tournoi->addTour($tour);
                $manager->persist($tour);
                // Ajout de matchs dans chaque tour
                $nbMatchs=$faker->numberBetween(1,2);
                for($j=1; $j<=$nbMatchs; $j++){
                    $match = new Match();
                    $match->setEtat("Pas encore joué");
                    $match->setTour($tour);
                    $match->addUtilisateur($user1);
                    $match->addUtilisateur($user2);
                    $tour->addMatch($match);
                    $manager->persist($match);
                    // 2 sets gagnants donc on crée 3 sets / matchs
                    for($k=1; $k<=3; $k++){
                        $set = new Set();
                        $set->setNbJeuDuGagnant(6);
                        $set->setNbJeuDuPerdant($faker->numberBetween(0,4));
                        $set->setUtilisateurGagnant($user1);
                        $set->setUtilisateurPerdant($user2);
                        $set->setUnMatch($match);
                        $match->addSet($set);
                        $manager->persist($set);

                    }
                }
            }
        $manager->flush();
    }
}
