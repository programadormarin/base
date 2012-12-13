<?php

/*
 * This file is part of the php-annotation framework.
 *
 * (c) Rasmus Schultz <rasmus@mindplay.dk>
 *
 * This software is licensed under the GNU LGPL license
 * for more information, please see:
 *
 * <http://code.google.com/p/php-annotations>
 */

namespace Mindplay\Annotation\Standard;

use Mindplay\Annotation\Core\Annotation;

/**
 * Defines display-related metadata.
 *
 * @usage('class'=>true, 'property'=>true, 'inherited'=>true)
 */
class DisplayAnnotation extends Annotation
{
	/**
	 * @var string A group name - for use with helpers that render multiple fields as a group.
	 */
	public $group;

	/**
	 * @var integer Order index - for use with helpers that render multiple fields. Fields are sorted in ascending order.
	 */
	public $order;

	/**
	 * Initialize the annotation.
	 */
	public function initAnnotation($properties)
	{
		$this->_map($properties, array('order'));

		parent::initAnnotation($properties);
	}
}
