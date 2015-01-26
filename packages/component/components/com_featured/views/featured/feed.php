<?php

class ComFeaturedViewFeaturedFeed extends KViewAbstract
{
    public function display()
    {
        $items	    = $this->getService('com://site/featured.model.nodes')->limit(20)->getList();
        $doc		= JFactory::getDocument();

        foreach($items as $item) {
            $item       = $this->getService($item->identifier)->id($item->row)->getItem();
            $option     = $item->getIdentifier()->package;
            $view       = KInflector::singularize($item->getIdentifier()->name);

            $feed_item  = new JFeedItem();
            $feed_item->title       = $item->title;
            $feed_item->link        = $this->createRoute('option=com_' . $option . '&view=' . $view . '&date=' . date('Y-m-d', strtotime($item->publish_up)) . '&id=' . $item->id . '&slug=' . $item->slug . '&format=html');
            $feed_item->description = $item->introtext;
            $feed_item->date        = $item->publish_up;

            $category = json_decode($item->ancestors)->category;

            if(is_numeric($category)) {
                $feed_item->category = $this->getService('com://site/makundi.model.categories')->id($category)->getItem()->title;
            }

            $doc->addItem($feed_item);
        }

        return parent::display();
    }
}