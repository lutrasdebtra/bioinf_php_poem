<?php

// src/AppBundle/DataFixtures/ORM/Real/LoadOmicsExperimentTypeStrings.php

namespace AppBundle\DataFixtures\ORM\Real;

use AppBundle\Entity\OmicsExperimentTypeStrings;
use Composer\Installer\PackageEvent;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadOmicsExperimentTypeStrings extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $omicsExperimentTypes = [
            "Transcriptomics" => ["Time Course", "Differential Expression"],
            "Proteomics" => ["Standard"],
            "Metabolomics" => ["Standard"],
            "Genomics" => ["Time Course", "Strain", "Contamination Check", "De Novo Assembly"]
        ];

        foreach ($omicsExperimentTypes as $experimentType => $children) {
            $omicsExperimentTypeString = $manager
                ->getRepository('AppBundle:OmicsExperimentTypeStrings')
                ->findOneBy(array('type' => $experimentType));
            if ($omicsExperimentTypeString == null) {
                $omicsExperimentTypeString = new OmicsExperimentTypeStrings();
                $omicsExperimentTypeString->setType($experimentType);
            }

            $omicsExperimentTypeString->removeAllOmicsExperimentSubTypeStrings();

            foreach ($children as $experimentSubType) {
                $omicsExperimentTypeString->addOmicsExperimentSubTypeString($this->getReference($experimentType . ":" . $experimentSubType));
            }
            $this->addReference($experimentType, $omicsExperimentTypeString);
            $manager->persist($omicsExperimentTypeString);
        }
        $manager->flush();
    }

    // Must be loaded before LoadOmicsExperimentSubTypeStrings.
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
}