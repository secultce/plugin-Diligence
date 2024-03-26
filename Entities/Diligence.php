<?php
// src/Product.php
namespace Diligence\Entities;

use Doctrine\ORM\Mapping as ORM;
use \MapasCulturais\App;
use DateTime;

/**
 * Diligence 
 * 
 * @ORM\Table(name="diligence")
 * @ORM\Entity
 * @ORM\entity(repositoryClass="MapasCulturais\Repository")
 */
class Diligence extends \MapasCulturais\Entity 
{
    #[ORM\Column(name:"id" , type: "integer")]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy:"SEQUENCE")]
    #[ORM\SequenceGenerator(sequenceName:"diligence_id_seq", allocationSize:1, initialValue:1)]
    protected $id;

    /**
     * @var \MapasCulturais\Entities\Registration
     *
     * @ORM\ManyToOne(targetEntity="MapasCulturais\Entities\Registration")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="registration_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    protected $registration;

    /**
     * @var \MapasCulturais\Entities\Agent
     *
     * @ORM\ManyToOne(targetEntity="MapasCulturais\Entities\Agent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="open_agent_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    protected $openAgent;


    /**
     * @var \MapasCulturais\Entities\Agent
     *
     * @ORM\ManyToOne(targetEntity="MapasCulturais\Entities\Agent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="agent_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    protected $agent;


    #[ORM\Column(type: 'datetime', name: 'create_timestamp', nullable: false)]
    protected $createTimestamp;

    #[ORM\Column(type: 'text', name: 'description', nullable: false)]
    protected $description;

    #[ORM\Column( name: 'description', type:"string", length: 50, nullable: false)]
    protected $status;

    #[ORM\Column( name: 'situation', type:"string", length: 50, nullable: false)]
    protected $situation;

    #[ORM\Column(type: 'integer', name: 'days', nullable: false, options:["default" => 3])]
    protected $days;

    #[ORM\Column( name: 'enable', type:"boolean", nullable: false)]
    protected $enable = false;
}