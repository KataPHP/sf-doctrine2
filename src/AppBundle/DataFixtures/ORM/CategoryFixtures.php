<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {

        $categories = [
            'Albanaise',
            'Allemande',
            'Américaine',
            'Amérique centrale',
            'Argentine',
            'Asiatique',
            'Asie centrale',
            'Australienne',
            'Bar',
            'Bar à vins',
            'Barbecue/Grillades',
            'Brasserie gastronomique',
            'Britannique',
            'Café',
            'Caraïbes',
            'Chinoise',
            'coréenne',
            'Cuisine de rue (street food)',
            'Delicatessen',
            'Diner',
            'Écossaise',
            'Espagnole',
            'Europe centrale',
            'Européenne',
            'Française',
            'Fruits de mer & Poisson',
            'Fusion',
            'Grecque',
            'Grillades',
            'Indienne',
            'Indonésienne',
            'Internationale',
            'Irlandaise',
            'Italienne',
            'Jamaïcaine',
            'Japonaise',
            'Latino',
            'Malaisienne',
            'Méditerranéenne',
            'Mexicaine',
            'Moderne',
            'Moyen-Orient',
            'Néo-zélandaise',
            'Pizza',
            'Pub',
            'Restauration rapide',
            'Saine',
            'Singapourienne',
            'Soupes',
            'Steakhouse',
            'Sud-américaine',
            'Sud-Ouest américain',
            'Suisse',
            'Sushi',
            'Thaï',
            'Turque',
            'Vietnamienne',
        ];

        foreach ($categories as $key => $category) {
            $entity = new Category();
            $entity->setName($category);

            $manager->persist($entity);
            $manager->flush();

            $this->addReference(sprintf('category-%s', $key), $entity);
        }
    }
}
