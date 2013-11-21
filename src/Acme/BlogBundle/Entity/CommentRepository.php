<?php

namespace Acme\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Description of CommentRepository
 *
 * @author Admin
 */
class CommentRepository extends EntityRepository
{
    public function fetchAll()
    {
        return $this->getEntityManager()->getRepository('AcmeBlogBundle:Comment')
            ->findBy(
                array(),
                array('id' => 'DESC')
            );
    }
    
}
