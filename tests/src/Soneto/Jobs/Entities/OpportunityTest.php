<?php
namespace Soneto\Jobs\Entities;

use Soneto\Jobs\Entities\Opportunity;

class OpportunityTest extends \PHPUnit_Framework_TestCase
{

    public function testFindOpportunityById()
    {
        $opportunity = $this->getMock('Soneto\Jobs\Entities\Opportunity');
        $opportunity->expects($this->once())
            ->method('getId')
            ->will($this->returnValue(5));

        $opportunityRepository = $this->getMockBuilder('Soneto\Jobs\Entities\OpportunityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $opportunityRepository->expects($this->once())
            ->method('find')
            ->will($this->returnValue($opportunity));

        $entityManager = $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')
            ->disableOriginalConstructor()
            ->getMock();

        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($opportunityRepository));

        $opportunityRepository = $entityManager->getRepository('Soneto\Jobs\Entities\Opportunity');
        $opportunity = $opportunityRepository->find(5);
        
        $this->assertInstanceOf('Soneto\Jobs\Entities\Opportunity', $opportunity);
        $this->assertTrue(is_int($opportunity->getId()));
    }

    public function testAddOpportunityShouldWork()
    {
        $faker = \Faker\Factory::create();
        $title = $faker->text(70);

        $opportunity = $this->getMock('Soneto\Jobs\Entities\Opportunity');

        $opportunity->expects($this->once())
            ->method('setTitle')
            ->will($this->returnValue(null));

        $opportunity->expects($this->once())
            ->method('getId')
            ->will($this->returnValue(5));

        $opportunity->expects($this->once())
            ->method('getTitle')
            ->will($this->returnValue($title));

        $opportunity->setTitle($title);

        $entityManager = $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')
            ->disableOriginalConstructor()
            ->getMock();

        $entityManager->expects($this->once())
            ->method('persist')
            ->will($this->returnValue(null));

        $entityManager->expects($this->once())
            ->method('flush')
            ->will($this->returnValue(true));

        $entityManager->persist($opportunity);
        $entityManager->flush();
        
        $this->assertTrue(is_int($opportunity->getId()));
        $this->assertEquals($opportunity->getTitle(), $title);
    }

    public function testRemoveOpportunity()
    {
        $opportunity = $this->getMock('Soneto\Jobs\Entities\Opportunity');
        $opportunity->expects($this->once())
            ->method('getId')
            ->will($this->returnValue(null));

        $entityManager = $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')
            ->disableOriginalConstructor()
            ->getMock();

        $entityManager->expects($this->once())
            ->method('remove')
            ->will($this->returnValue(null));

        $entityManager->expects($this->once())
            ->method('flush')
            ->will($this->returnValue(true));

        $opportunityRepository = $this->getMockBuilder('Soneto\Jobs\Entities\OpportunityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $opportunityRepository->expects($this->once())
            ->method('find')
            ->will($this->returnValue(null));

        $entityManager->remove($opportunity);
        $entityManager->flush();


        $this->assertTrue(is_null($opportunity->getId()));
        $this->assertTrue(is_null($opportunityRepository->find(5)));
    }
}
