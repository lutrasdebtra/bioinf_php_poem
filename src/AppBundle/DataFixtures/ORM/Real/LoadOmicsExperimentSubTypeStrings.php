<?php

// src/AppBundle/DataFixtures/ORM/Real/LoadOmicsExperimentSubTypeStrings.php

namespace AppBundle\DataFixtures\ORM\Real;

use AppBundle\Entity\OmicsExperimentSubTypeStrings;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadOmicsExperimentSubTypeStrings extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $omicsExperimentSubTypes = [
            "Mutation Analysis",
            "Contamination Analysis",
            "Genome Assembly",
            "Time Course",
            "Differential Expression",
            "Standard",
            "New Strain Genome Sequencing",
            "Construct Sequencing"
        ];


        foreach ($omicsExperimentSubTypes as $experimentSubType) {
            $omicsExperimentSubTypeString = new OmicsExperimentSubTypeStrings();
            $omicsExperimentSubTypeString->setType($experimentSubType);
            // Reference to object via type string for use in LoadOmicsExperimentTypeStrings.
            $this->addReference($experimentSubType, $omicsExperimentSubTypeString);
            $manager->persist($omicsExperimentSubTypeString);
        }

        $manager->flush();
    }

    // Must be loaded after LoadOmicsExperimentTypeStrings.
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}