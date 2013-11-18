<?php
namespace Soneto\Jobs\Fixtures;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadOpportunityData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        \Nelmio\Alice\Fixtures::load(__DIR__.'/../Resources/fixtures/opportunity.yml', $objectManager);
    }
}
