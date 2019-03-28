<?php
if (!class_exists("Widget")) {
    return;
}

/**
 * @method Blog Blog()
 *
 * @property int $NumberOfPosts
 */
class BlogRelatedPostsWidget extends BlogRecentPostsWidget
{
    /**
     * @var string
     */
    private static $title = 'Related Posts';

    /**
     * @var string
     */
    private static $cmsTitle = 'Related Posts';

    /**
     * @var string
     */
    private static $description = 'Displays a list of related blog posts.';

    /**
     * {@inheritdoc}
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
		
		$fields->removeByName('BlogID');
		
        return $fields;
    }

    /**
     * @return array
     */
    public function getPosts()
    {
	    $controller = Controller::curr();
		
		if( $controller instanceof BlogPost_Controller && isset($controller->ID) ){
			return $controller->RelatedPosts();
		}
		
		return false;
    }
}

/*
 * Controller
 */ 
class BlogRelatedPostsWidget_Controller extends BlogRecentPostsWidget_Controller
{
}
