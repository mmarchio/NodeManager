<?php

namespace mmarchio\NodeManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * node_test_node_4
 *
 * @ORM\Table(name="node_test_node_4")
 * @ORM\Entity(repositoryClass="mmarchio\NodeManagerBundle\Repository\node_test_node_4Repository")
 */
class node_test_node_4
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false, unique=false)
     */
    private $title;


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
     * Set title
     *
     * @param string $title
     *
     * @return node_test_node_4
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

