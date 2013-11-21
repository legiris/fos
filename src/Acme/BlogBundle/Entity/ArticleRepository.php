<?php

namespace Acme\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Description of ArticleRepository
 *
 * @author Admin
 */
class ArticleRepository extends EntityRepository
{
    /**
     * vybere vsechny clanky
     * @return array
     */
    public function fetchAll()
    {
        return $this->getEntityManager()->getRepository('AcmeBlogBundle:Article')
                ->findBy(
                    array(),
                    array('id' => 'DESC')
                );
    }
    
    /**
     * vybere clanek podle ID
     * @param int $id
     * @return array
     */
    public function findById($id)
    {
        return $this->getEntityManager()
            ->getRepository('AcmeBlogBundle:Article')
            ->findOneBy(array(
                'id' => $id));
    }


    /**
     * vybere nejnovejsi clanky
     * @param int $count
     * @return array
     */
    public function findLatest($count)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT a
                FROM AcmeBlogBundle:Article a
                ORDER BY a.date DESC			
            ')
            ->setMaxResults($count)
            ->getResult();
    }
   
}
