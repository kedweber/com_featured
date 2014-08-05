<?php

defined('KOOWA') or die('Restricted Access');

class ComFeaturedModelNodes extends ComDefaultModelDefault
{
	/**
	 * @param KConfig $config
	 */
	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('sort'     		, 'cmd', 'published_on')
			->insert('direction'		, 'word', 'desc')
		;
	}

    /**
     * @param KDatabaseQuery $query
     */
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        parent::_buildQueryWhere($query);

//        $query->where('tbl.enabled', '=', 1);
    }
}