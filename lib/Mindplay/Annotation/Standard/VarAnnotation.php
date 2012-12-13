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
use Mindplay\Annotation\Core\IAnnotationParser;
use Mindplay\Annotation\Core\Annotation;

/**
 * Specifies the required data-type of a property.
 *
 * @usage('property'=>true, 'inherited'=>true)
 */
class VarAnnotation extends Annotation implements IAnnotationParser
{
	/**
	 * @var string Specifies the type of value (e.g. for validation, for
	 * parsing or conversion purposes; case insensitive)
	 *
	 * The following type-names are recommended:
	 *
	 * bool
	 * int
	 * float
	 * string
	 * mixed
	 * object
	 * resource
	 * array
	 * callback (e.g. array($object|$class, $method') or 'function-name')
	 *
	 * The following aliases are also acceptable:
	 *
	 * number (float)
	 * res (resource)
	 * boolean (bool)
	 * integer (int)
	 * double (float)
	 */
	public $type;

	/**
	 * Parse the standard PHP-DOC @var annotation
	 */
	public static function parseAnnotation($value)
	{
		$parts = explode(' ', trim($value), 2);

		return array('type' => array_shift($parts));
	}

	/**
	 * Initialize the annotation.
	 */
	public function initAnnotation($properties)
	{
		$this->_map($properties, array('type'));

		parent::initAnnotation($properties);

		if (!isset($this->type)) {
			throw new AnnotationException('VarAnnotation requires a type property');
		}
	}
}
