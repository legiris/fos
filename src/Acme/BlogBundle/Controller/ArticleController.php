<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

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

    
    /**
     * REST test
     */
    
    // http://localhost/web/fos/web/app_dev.php/show
    public function showAction()
    {
        return new Response('<html><body> show </body></html>');
    }
    
    // http://localhost/web/fos/web/app_dev.php/papers
    public function getPapersAction()
    {
        return new Response('<html><body> get_papers </body></html>');
    }
    
    // http://localhost/web/fos/web/app_dev.php/articles/new
    public function newArticlesAction()
    {
        return new Response('<html><body> new_articles </body></html>');
    }
    
    /**
     * REST API -- zobrazeni vsech clanku
     * http://localhost/web/fos/web/app_dev.php/articles
     * @return array
     */
    public function getArticlesAction()
    {	
        return $this->render('AcmeBlogBundle:Homepage:test.html.twig', array(
            'articles' => $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')
                ->findBy(
                    array(),
                    array('id' => 'DESC')
                ),
        ));	
    }
    
    // http://localhost/web/fos/web/app_dev.php/papers/7
    public function getPaperAction($id)
    {
        return new Response('<html><body> Paper '. $id .'</body></html>');
    }
    
    
    /**
     * REST API -- zobrazeni clanku dle id
     * http://localhost/web/fos/web/app_dev.php/articles/2
     * @param type $id
     * @return type
     */
    public function getArticleAction($id)
    {
        return $this->render('AcmeBlogBundle:Article:test.html.twig', array(
            'article' => $this->getDoctrine()
                ->getRepository('AcmeBlogBundle:Article')
                ->findOneBy(array(
                    'id' => $id)),
            'form' => $this->addForm()
        ));
    }
    
    
}
