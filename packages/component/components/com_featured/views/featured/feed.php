<?php

/**
 * Com
 *
 * @author 		Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category	
 * @package 	
 * @subpackage	
 */
 
defined('KOOWA') or die('Restricted Access');

class ComFeaturedViewFeaturedFeed extends KViewAbstract
{
    private function getItem($taxonomy)
    {
        $identifier = (string)'com://site/' . str_replace('com_', '', $taxonomy->option) . '.helper.feed.item';
        try {
            $rss = $this->getService($identifier);
            if (!$rss instanceof ComFeaturedHelperFeedInterface) {
                throw new Exception('Identifier: ' . $identifier . ' does not implement interface ComFeaturedHelperFeedInterface');
            } else {
                return $rss->getItem($taxonomy);
            }

        } catch(Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    public function display()
    {
        $doc = JFactory::getDocument();
        $types = $this->getService('com://site/featured.model.types')->getList();
        $taxonomies = $this->getService('com://site/taxonomy.model.taxonomies')->type($types->titles())->getList();

        foreach($taxonomies as $taxonomy) {
            $item = $this->getItem($taxonomy);
            if($item !== null) {
                $doc->addItem($item);
            }
        }

        return parent::display();
    }
}