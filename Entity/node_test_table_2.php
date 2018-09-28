<?php

namespace mmarchio\NodeManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * node_test_table_2
 *
 * @ORM\Table(name="node_test_table_2")
 * @ORM\Entity(repositoryClass="mmarchio\NodeManagerBundle\Repository\node_test_table_2Repository")
 */
class node_test_table_2
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
     * @ORM\Column(name="title", type="text", nullable=false, unique=false)
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
     * @return node_test_table_2
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

