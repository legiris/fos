<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Description of CommentController
 *
 * @author Admin
 */
class CommentController extends BaseController
{
    
    // http://localhost/web/fos/web/app_dev.php/articles/5/comments -- if multiple RESTful (parent :: child)
    public function getCommentsAction($id)
    {
        return new Response('<html><body> get_comments ' . $id . '</body></html>');
    }
    
    // http://localhost/web/fos/web/app_dev.php/articles/lorem%20ipsum/comments/3
    public function getCommentAction($title, $id)
    {
        return new Response('<html><body> get_title_comment | title: ' . $title . ' | comment_id ' . $id . '</body></html>');
    }
    
    
    // http://localhost/web/fos/web/app_dev.php/articles/1/comments -- if single RESTful
    public function getArticlesCommentsAction($id)
    {
        return new Response('<html><body> get_articles_comments ' . $id . '</body></html>');
    }
   
    
}

?>
