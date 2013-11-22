<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Acme\BlogBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ArticleController
 *
 * @author Admin
 */
class ArticleController extends BaseController
{   
    
    /**
     * vybere a zobrazi vsechny clanky, pro zobrazeni homepage
     * @return array
     */
    public function getAction()
    {	
        return $this->render('AcmeBlogBundle:Article:index.html.twig', array(
            'articles' => $this->getDoctrine()->getEntityManager()
                ->getRepository('AcmeBlogBundle:Article')->fetchAll()
        ));	
    }
   
    /*
     * formular pro pridani komentare
     */
    public function addForm()
    {
        //$comment = new Comment;
        //$comment->setNickname('Seeker');
        //$comment->setText('Dragon Age');
        
        
        $form = $this->createFormBuilder()
            ->add('nickname', 'text')
            ->add('text', 'textarea', array('attr' => array('cols' => 50, 'rows' => 8)))
            ->add('submit', 'submit')
            ->getForm();
        
        return $form->createView();
    }

    /**
     * REST API -- zobrazeni stranky s clankem
     * http://localhost/web/fos/web/app_dev.php/articles/2
     * @param type $id
     * @return type
     */
    public function getArticleAction($id)
    {
        return $this->render('AcmeBlogBundle:Article:article.html.twig', array(
            'article' => $this->getDoctrine()->getEntityManager()
                ->getRepository('AcmeBlogBundle:Article')->findById($id),  
            'comments' => $this->getDoctrine()->getEntityManager()
                ->getRepository('AcmeBlogBundle:Comment')->fetchAll(),
            'form' => $this->addForm()
        ));
    }
    
    
    /**
     * vybere nejnovejsi clanky
     * @param int $count
     * @return array
     */
    public function getLatestAction($count)
    {   
        $em = $this->getDoctrine()->getEntityManager();
        $articles = $em->getRepository('AcmeBlogBundle:Article')->findLatest($count);
        
        return $this->render('AcmeBlogBundle:Article:latestArticles.html.twig',
            array('articles' => $articles)
        );
    }
    
    
    /****************************************************************************************
     * REST test
     ****************************************************************************************/
    
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
    
    public function deleteArticleAction($id)
    {
        return new Response('<html><body> delete_article '. $id .'</body></html>');
    }
    
    // http://localhost/web/fos/web/app_dev.php/papers/7
    public function getPaperAction($id)
    {
        return new Response('<html><body> Paper '. $id .'</body></html>');
    }
    
    /**
     * REST API -- zobrazeni vsech clanku
     * http://localhost/web/fos/web/app_dev.php/articles
     * @return array
     */
    public function getArticlesAction()
    {	
        return $this->render('AcmeBlogBundle:Homepage:article.html.twig', array(
            'articles' => $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')
                ->findBy(
                    array(),
                    array('id' => 'DESC')
                ),
        ));	
    }
    
}