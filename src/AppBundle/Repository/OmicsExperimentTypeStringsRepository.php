<?php

namespace AppBundle\Repository;

/**
 * OmicsExperimentTypeStringsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OmicsExperimentTypeStringsRepository extends \Doctrine\ORM\EntityRepository
{
    public function getExpTypeSubTypeRelations()
    {
        $qm = $this->getEntityManager()->createQueryBuilder();
        $qm->select('c', 'p')
            ->from('AppBundle:OmicsExperimentTypeStrings', 'c')
            ->leftJoin('c.omicsExperimentSubTypeStrings', 'p');
        $results = $qm->getQuery()->getArrayResult();

        $res = [];

        foreach($results as $omicsExperimentTypeString) {
            $res[$omicsExperimentTypeString['type']] = [];
            foreach([$omicsExperimentTypeString['omicsExperimentSubTypeStrings']] as $omicsExperimentSubTypeStringArray) {
                foreach ($omicsExperimentSubTypeStringArray as $omicsExperimentSubTypeString) {
                    array_push($res[$omicsExperimentTypeString['type']],$omicsExperimentSubTypeString['type']);
                }
            }
        }
        return $res;
    }
}
