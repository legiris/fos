<?php

namespace Acme\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Acme\BlogBundle\Entity\CommentRepository")
 * @ORM\Table(name="comment")
 */
class Comment
{   
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=2500)
     * @var text
     */
    protected $text;

    /**
     * @ORM\Column(type="string", length=30)
     * @var text
     */
    protected $nickname;

    /**
     * @ORM\Column(type="datetime")
     * @var datetime
     */
    protected $date;


    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setArticle(Article $article)
    {
        $this->article = $article;
    }
    
    /**
     * vlastnici strana je ta, kde je vazebni sloupec | table Comment: id --> article_id
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * @var Comment
     */
    protected $comment;

}