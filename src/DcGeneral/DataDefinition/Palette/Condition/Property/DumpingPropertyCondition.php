<?php
/**
 * PHP version 5
 * @package    generalDriver
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @copyright  The MetaModels team.
 * @license    LGPL.
 * @filesource
 */

namespace DcGeneral\DataDefinition\Palette\Condition\Property;

use DcGeneral\Data\ModelInterface;
use DcGeneral\Data\PropertyValueBag;
use DcGeneral\DataDefinition\ConditionInterface;

/**
 * Only for debugging purpose. Call the match() method on the wrapped condition and
 * dump the result with a backtrace.
 */
class DumpingPropertyCondition implements PropertyConditionInterface
{
	/**
	 * @var PropertyConditionInterface
	 */
	protected $propertyCondition;

	function __construct($propertyCondition)
	{
		$this->propertyCondition = $propertyCondition;
	}

	/**
	 * {@inheritdoc}
	 */
	public function match(ModelInterface $model = null, PropertyValueBag $input = null)
	{
		$result = $this->propertyCondition->match($model, $input);

		echo '<pre>$condition: </pre>';
		var_dump($this->propertyCondition);
		echo '<pre>$model: </pre>';
		var_dump($model);
		echo '<pre>$input: </pre>';
		var_dump($input);
		echo '<pre>$condition->match() result: </pre>';
		var_dump($result);
		echo '<pre>';
		debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
		echo '</pre>';

		return $result;
	}

	/**
	 * {@inheritdoc}
	 */
	public function __clone()
	{
		$this->propertyCondition = clone $this->propertyCondition;
	}
}
