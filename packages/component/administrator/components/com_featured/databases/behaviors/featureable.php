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

	protected function _beforeTableInsert(KCommandContext $context)
	{
//		die('test');
	}

	/**
	 * @param KCommandContext $context
	 */
	protected function _afterTableInsert(KCommandContext $context)
	{
//		die('test');
	}

	protected function _beforeTableUpdate(KCommandContext $context)
	{
		$this->_setFeatured($context);
	}

	protected function _setFeatured($context)
	{
		if (in_array('featured', $context->data->getModified())) {
			if($context->data->featured) {
				$identifier 				= $context->data->getIdentifier();
				$identifier->application	= 'site';
				$identifier->path 			= array('model');
				$identifier->name 			= KInflector::pluralize($identifier->name);

				$row = $this->getService('com://admin/featured.model.nodes')->row($context->data->id)->table($this->getMixer()->getTable()->getBase())->getItem();
				$row->setData(array(
					'row'			=> $context->data->id,
					'table'			=> $this->getMixer()->getTable()->getBase(),
					'identifier'	=> (string) $identifier,
					'published_on'	=> $context->data->publish_up ? $context->data->publish_up : $context->data->created_on
				));
				$row->save();
			} else {
				$this->getService('com://admin/featured.model.nodes')->row($context->data->id)->table($this->getMixer()->getTable()->getBase())->getItem()->delete();
			}
		}
	}
}