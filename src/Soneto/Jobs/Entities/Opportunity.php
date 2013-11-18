<?php
namespace Soneto\Jobs\Entities;

/**
 * @Entity(repositoryClass="Soneto\Jobs\Entities\OpportunityRepository")
 * @Table(name="opportunities")
 */
class Opportunity
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string", columnDefinition="VARCHAR(70) NOT NULL") */
    private $title;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Opportunity
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
