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

use Mindplay\Annotation\Core\AnnotationException;

/**
 * Specifies validation of a string against a regular expression pattern.
 */
class MatchAnnotation extends ValidationAnnotationBase
{
	/**
	 * @var string The regular expression pattern to match against.
	 */
	public $pattern;

	/**
	 * Initialize the annotation.
	 */
	public function initAnnotation($properties)
	{
		$this->_map($properties, array('pattern'));

		parent::initAnnotation($properties);

		if (!isset($this->pattern)) {
			throw new AnnotationException('PatternAnnotation requires a pattern property');
		}
	}
}
