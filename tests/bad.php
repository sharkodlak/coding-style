<?php

namespace Sharkodlak\CodingStyle;


include_once(__DIR__ . '/file.php');
require_once(__DIR__ . '/file.php');

class  Bad
extends Wrong
	implements Incorrect, Mallformed,
Stupid {
	static protected $own = NULL;
	public $multiline =
		"second line should start wit assignment operator";
	public $first = 1,
		$second = 2;

	static protected function commaSeparatedArguments($start,$end) {
		return range($start,$end);
	}
	static protected function emptyFor() {
		for ($i = 0; $i < 10; ++$i)
		{
			// empty
		}
	}

	static public function bracketsUsage($variable)
	{
		if (TRUE) echo 'yes';
		else if (FALSE) {
			doSomethink();
		} else if (1) {
			doSomethink();
		} else if ('string') {
			doSomethink();
		}
		else if ("string") {
			doSomethink();
		}
		else if ("$variable") {
			doSomethink();
		}
		else if (CONSTANT_EXPRESSION) {}
		else
		{
			// empty
		}
		return FALSE;
	}

	protected function multilineCondition($first, $second) {
		if ($first > 7 &&
			$second < 9)
		{
			doSomethink();
		}
	}

	public function gotoDisallowedInHighLevelLanguages() {
		goto label;
	}

	function missingVisibility() {
		doSomethink();
	}

	public function spaceIndentation() {
 		thereIsASpaceAndTabs();
	}

	protected function anonymousFunction() {
		function() use($self) {
			return $this->first;
		};
	}

	public function closingBraceIndentation() {
		doSomethink();
		}

	public function scopeIndentation($var) {
	if ($var) {
	doSomethink();
	}
	}
}

interface RiverBank {
	public function getRiverName();
}

trait RiverSide {
	public function getSide() {
		return 'right';
	}
}

class AbstractRiverBank implements RiverBank {
	use RiverSide;
	abstract public function getSide();
}

class Second_Class {
	public function parameterDefaultness($first = 'default', $missingDefaultValue) {
		doSomethink($first = 'default', $missingDefaultValue);
	}

	protected function flow() {
		$this->instance->
			do()
		->done();
	}

	public function multilineFunctionCall($first, $second,
		$third
		, $fourth) {
		doSomethink($first, $second, $third, $fourth);
	}

	public function arrayKeyBracesSpacing($array, $key) {
		return $array [ $key ];
	}

	public function classNameAsReference() {
		Second_Class::method();
	}

	public function foreachSpacing($iterator) {
		foreach ($iterator  AS $key=>$value) {
			// empty
		}
		return $value;
	}

	public function echoConstruct() {
		echo ('string should not be in parenthesis');
		echo'missing space';
	}

	public  function  methodDeclarationSpacing() {
		doSomethink();
	}

	public function typeCasting($float) {
		( int ) $float;
	}

	public function semicolonSpacing($var) {
		$var = 'sdfghjk' ;
	}

	# invalid comment
	public function multipleStatements() {
		$number = 1; doSomethink();
		return $number;
	}

	protected function camel_caps() {
		doSomethink();
	}

	protected function nesting($first, $second, $third, $fourth) {
		if ($first) {
			if ($second) {
				if ($third) {
					if ($fourth) {
						doSomethink();
					}
				}
			}
		}
	}
}
?>
Output send
<? // Well it looks like it can't be parsed

Bad::asdf();

?>
<?php
// Ends with closing tag
?>
