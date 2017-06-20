<?php

namespace AppBundle\Repository;

/**
 * OmicsExperimentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OmicsExperimentRepository extends \Doctrine\ORM\EntityRepository
{
    public function getExport($id, $fields)
    {
        $qm = $this->getEntityManager()->createQueryBuilder();
        $qm->select($fields)
            ->from('AppBundle:OmicsExperiment', 'omics')
            ->leftJoin('omics.statuses', 'stat')
            ->leftJoin('omics.files', 'files')
            ->leftJoin('omics.omicsExperimentTypes', 'exp')
            ->leftJoin('exp.omicsExperimentSubTypes', 'subexp')
            ->leftJoin('subexp.samples', 'sample')
            ->leftJoin('exp.omicsExperimentTypeString', 'expstr')
            ->leftJoin('subexp.omicsExperimentSubTypeString', 'expsubstr')
            ->leftJoin('sample.materialTypeString', 'mattypestr')
            ->where('omics.id = :id')
            ->setParameter('id', $id);
        $results = $qm->getQuery()->getArrayResult();

        $str_result = "";

        foreach ($results as $i => $r) {
            if ($i == 0) {
                foreach (array_keys($r) as $key) {
                    $str_result .= $key . ",";
                }
                $str_result = substr($str_result, 0, -1) . "\n";
            }
            foreach ($r as $field) {
                $str_result .= $field . ",";
            }
            $str_result = substr($str_result, 0, -1) . "\n";
        }

        return $str_result;
    }

    public function getSpecificSample($projectID, $sampleName)
    {
        $qm = $this->getEntityManager()->createQueryBuilder();
        $qm->select('*')
            ->from('AppBundle:OmicsExperiment', 'omics')
            ->leftJoin('omics.omicsExperimentTypes', 'exp')
            ->leftJoin('exp.omicsExperimentSubTypes', 'subexp')
            ->leftJoin('subexp.samples', 'sample')
            ->where('omics.projectID= :projectID AND sample.sampleName = :sampleName')
            ->setParameter('projectID', $projectID)
            ->setParameter('sampleName', $sampleName);
        $results = $qm->getQuery()->getSingleResult();

        return $results;
    }
}
