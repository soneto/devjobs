<?php
namespace Soneto\Jobs\Entities;

use Doctrine\ORM\EntityRepository;

class OpportunityRepository extends EntityRepository
{
    public function getRecentOpportunities($maxResults = 10)
    {
        if ($maxResults !== (int) $maxResults) {
            throw new \InvalidArgumentException("maxResults must be an integer");
        }

        return $this->_em->createQuery('SELECT o FROM Soneto\Jobs\Entities\Opportunity o')
                         ->setMaxResults($maxResults)
                         ->getResult();
    }
}
