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

class ComFeaturedViewFeaturedHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $offset = $this->getModel()->getState()->offset;
        $limit = $this->getModel()->getState()->limit;
        $types = $this->getService('com://site/featured.model.types')->getList();
        $taxonomies = $this->getService('com://admin/taxonomy.model.taxonomies')->limit($limit)->offset($offset)->type(array('article'))->getList();

        $this->assign('taxonomies', $taxonomies);
        $this->assign('limit', $limit);
        $this->assign('total', $this->getService('com://site/taxonomy.model.taxonomies')->type(array('article'))->getTotal());
        $this->assign('link', '?option=com_featured&view=featured&layout=default_items&format=raw&type[]=' . implode('&type[]=', array('article')));

        return parent::display();
    }
}