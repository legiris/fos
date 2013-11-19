<?php

namespace Acme\BlogBundle\Controller;

class HomepageController extends BaseController
{
	
    /**
     * vybere a zobrazi vsechny clanky
     * @return array
     */
    public function indexAction()
    {	
        return $this->render('AcmeBlogBundle:Homepage:index.html.twig', array(
            'articles' => $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')
                ->findBy(
                    array(),
                    array('id' => 'DESC')
                ),
        ));	
    }

}
 
 	
	
	/*
	public function renderArticle()
	{
		return $this->render('AcmeBlogBundle:Homepage:index.html.twig');
	}
	 * 
	 */
		
		/**
		$array = array(
			'foo'	  => 'bar',
			'bar'	  => 'foo',
			'name'	  => 'Desmond',
			'surname' => 'Cousland'
		)
		 */
		
		//$conn = $this->get('database_connection');
		//$rows = $conn->fetchAll('SELECT * FROM article');
		//var_dump($rows);
		
        //return $this->render('AcmeBlogBundle:Blog:index.html.twig');
			