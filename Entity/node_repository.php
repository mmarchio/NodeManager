<?php

namespace mmarchio\NodeManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * node_repository
 *
 * @ORM\Table(name="node_repository")
 * @ORM\Entity(repositoryClass="mmarchio\NodeManagerBundle\Repository\node_repositoryRepository")
 */
class node_repository
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="node_name", type="string", length=255)
     */
    private $nodeName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nodeName
     *
     * @param string $nodeName
     *
     * @return node_repository
     */
    public function setNodeName($nodeName)
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * Get nodeName
     *
     * @return string
     */
    public function getNodeName()
    {
        return $this->nodeName;
    }
}

