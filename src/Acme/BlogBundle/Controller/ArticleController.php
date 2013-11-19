<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ArticleController
 *
 * @author Admin
 */
class ArticleController extends BaseController
{
    /**
     * zobrazi detail clanku a formular
     * @param int $id
     * @return array
     */
    public function ArticleAction($id)
    {
        //return new Response('<html><body>Hello ' . $id . '</body></html>');
        return $this->render('AcmeBlogBundle:Article:article.html.twig', array(
            'article' => $this->getDoctrine()
                ->getRepository('AcmeBlogBundle:Article')
                ->findOneBy(array(
                    'id' => $id)),
            'form' => $this->addForm()
        ));
    }
	
    /**
     * vybere nejnovejsi clanky
     * @param int $count
     * @return array
     */
    public function latestArticlesAction($count)
    {
        $articles = $this->getDoctrine()->getManager()->createQuery('
            SELECT a
            FROM AcmeBlogBundle:Article a
            ORDER BY a.date DESC			
        ')->setMaxResults($count)->getResult();
		
        return $this->render('AcmeBlogBundle:Article:latestArticles.html.twig',
            array('news' => $articles)
        );
    }
	
    public function addForm()
    {
        $form = $this->createFormBuilder()
            ->add('nickname', 'text')
            ->add('text', 'textarea', array('attr' => array('cols' => 50, 'rows' => 8)))
            ->add('submit', 'submit')
            ->getForm();
        
        return $form->createView();
    }

}


