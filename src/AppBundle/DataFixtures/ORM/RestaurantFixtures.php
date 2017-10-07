<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; ++$i) {
            $restaurant = (new Restaurant())
                ->setName($faker->name)
                ->setStreet($faker->streetAddress)
                ->setZipCode($faker->postcode)
                ->setCity($faker->city)
                ->setCountry($faker->country)
                ->setGpsLatitude($faker->latitude)
                ->setGpsLongitude($faker->longitude)
                ->addCategory($this->getReference(sprintf('category-%s', rand(0, 56))));

            $manager->persist($restaurant);
            $manager->flush();

            $this->addReference(sprintf('restaurant-%s', $i), $restaurant);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
        );
    }
}
