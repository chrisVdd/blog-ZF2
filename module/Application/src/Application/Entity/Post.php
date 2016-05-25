<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Post
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post extends AbstractEntity
{
    
//    TODO adding the gedmo for slug etc
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    protected $content;


//    TODO: ajouter les auteurs
//    protected $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    protected $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime")
     */
    protected $updateDate;

    /**
     * @var integer
     *
     * @ORM\Column(type="smallint")
     */
    protected $status;

    /**
     * Post constructor - set default values
     */
    public function __construct()
    {
        $this->createDate = new \DateTime();
    }
}