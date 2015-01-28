<?php

/**
 * Com
 *
 * @author 		Jasper van Rijbroek <jasper@moyoweb.nl>
 * @category
 * @package
 * @subpackage
 */

defined('KOOWA') or die('Restricted Access');

class ComFeaturedViewNodesFeed extends KViewAbstract
{
    public function display()
    {
        $items	    = $this->getModel()->limit(20)->getList();
        $doc		= JFactory::getDocument();

        foreach($items as $item) {
            $item       = $this->getService($item->identifier)->id($item->row)->getItem();
            $option     = $item->getIdentifier()->package;
            $view       = KInflector::singularize($item->getIdentifier()->name);

            $feed_item  = new JFeedItem();
            $feed_item->title       = $item->title;
            $feed_item->link        = $this->createRoute('option=com_' . $option . '&view=' . $view . '&id=' . $item->id . '&format=html');
            $feed_item->description = $item->introtext;
            $feed_item->date        = $item->publish_up;

            if($item->isRelationable() && $item->category) {
                $feed_item->category = $item->category->title;
            }

            $doc->addItem($feed_item);
        }

        return parent::display();
    }
}