<?php

defined('KOOWA') or die('Protected resource');

class ComFeaturedDatabaseBehaviorFeatureable extends KDatabaseBehaviorAbstract
{
	/**
	 * Get the methods that are available for mixin based
	 *
	 * This function conditionaly mixes the behavior. Only if the mixer
	 * has a 'featured' property the behavior will be mixed in.
	 *
	 * @param object The mixer requesting the mixable methods.
	 * @return array An array of methods
	 */
	public function getMixableMethods(KObject $mixer = null)
	{
		$methods = array();

		if(isset($mixer->featured)) {
			$methods = parent::getMixableMethods($mixer);
		}

		return $methods;
	}

	protected function _beforeTableUpdate(KCommandContext $context)
	{
		$this->_setFeatured($context);
	}

    /**
     * Delete the node from the featured table in all languages
     *
     * @param KCommandContext $context
     */
    protected function _afterTableDelete(KCommandContext $context)
    {
        $row = $this->getService('com://admin/featured.model.nodes')->row($context->data->id)->table($this->getMixer()->getTable()->getBase())->getItem();
        $this->_remove($row);

        // Remove from other languages
        $table      = $row->getTable();
        $database   = $table->getDatabase();
        $languages	= $this->getLanguages();

        foreach($languages as $language) {
            $iso_code = $language->sef;

            $name = $this->getTableName($iso_code, $table);

            if($name == $table->getName()) {
                continue;
            }

            try {
                if($database->getTableSchema($name)) {
                    $query = $database->getQuery();
                    $query->where('row', '=', $context->data->id);
                    $query->where('table', '=', $this->getMixer()->getTable()->getBase());
                    $database->delete($name, $query);
                }
            } catch(Exception $e) { }
        }
    }

    protected function _remove($row)
    {
        $row->delete();
    }

    /**
     * Add or remove from the featured table.
     *
     * @param $context
     */
	protected function _setFeatured($context)
	{
		if (in_array('featured', $context->data->getModified()) || in_array('enabled', $context->data->getModified()) || in_array('publish_up', $context->data->getModified()) || in_array('created_on', $context->data->getModified())) {
            $row = $this->getService('com://admin/featured.model.nodes')->row($context->data->id)->table($this->getMixer()->getTable()->getBase())->getItem();

            if($context->data->featured && $context->data->enabled) {
				$identifier 				= $context->data->getIdentifier();
				$identifier->application	= 'site';
				$identifier->path 			= array('model');
				$identifier->name 			= KInflector::pluralize($identifier->name);

				$row->setData(array(
					'row'			=> $context->data->id,
					'table'			=> $this->getMixer()->getTable()->getBase(),
					'identifier'	=> (string) $identifier,
					'published_on'	=> $context->data->publish_up ? $context->data->publish_up : $context->data->created_on
				));
				$row->save();
			} else {
                $this->_remove($row);
			}
		}
	}

    /**
     * @return array
     */
    public function getLanguages()
    {
        $languages = JLanguageHelper::getLanguages();
        foreach($languages as $i => &$language) {
            if (!JLanguage::exists($language->lang_code)) {
                unset($languages[$i]);
                continue;
            }
        }

        return $languages;
    }

    /**
     * @param $iso_code
     * @param $table
     * @return string
     */
    public function getTableName($iso_code, $table)
    {
        $name = $table->getBase();

        if($iso_code != 'en') {
            try {
                if($table->getDatabase()->getTableSchema($iso_code.'_'.$name)) {
                    $name = $iso_code.'_'.$name;
                }
            } catch(Exception $e) { }
        }

        return $name;
    }
}