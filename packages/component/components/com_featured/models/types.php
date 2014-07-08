<?php

/**
 * ComFeatured
 *
 * @author 		Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category
 * @package
 * @subpackage
 */

defined('KOOWA') or die('Restricted Access');

class ComFeaturedModelTypes extends ComDefaultModelDefault
{
    /**
     * @param KDatabaseQuery $query
     */
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        parent::_buildQueryWhere($query);

        $query->where('tbl.enabled', '=', 1);
    }
}