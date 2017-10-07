<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Customer;
use AppBundle\Entity\Score;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CustomerFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; ++$i) {
            $customer = (new Customer())
                ->setFullName($faker->name)
                ->setEmail($faker->email)
                ->setPhoneNumber($faker->phoneNumber);

            $score = (new Score())
                ->setValue(rand(1, 5))
                ->setRestaurant($this->getReference(sprintf('restaurant-%s', rand(1, 10))))
            ;

            $customer->addScore($score);


            $manager->persist($customer);
            $manager->flush();

            $this->addReference(sprintf('customer-%s', $i), $customer);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            RestaurantFixtures::class,
        );
    }
}
