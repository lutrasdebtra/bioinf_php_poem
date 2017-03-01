<?php

// src/AppBundle/DataFixtures/ORM/Test/LoadOmicsExperimentSubTypes.php

namespace AppBundle\DataFixtures\ORM\Test;

use AppBundle\Entity\OmicsExperimentSubType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadOmicsExperimentSubTypes extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 6;
    }
}