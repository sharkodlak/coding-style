<?php

namespace Sharkodlak\CodingStyle;


include_once(__DIR__ . '/file.php');
require_once(__DIR__ . '/file.php');

use AnotherNameSpace\{ClassFirst, ClassSecond as SecondClass};
use function AnotherNameSpace\{functionFirst, functionSecond as secondFunction};
use const AnotherNameSpace\{CONST_FIRST, CONST_SECOND as SECOND_CONST};

class  Bad
extends Wrong
	implements Incorrect, Mallformed,
Stupid {
	static private $own = NULL;
	public $multiline =
		"second line should start wit assignment operator";
	public $first = 1,
		$second = 2;
	private $a = doSomethink ( $spacedParenthesis ) ;

	static public function asdf()
	{
		$range = range(0,10,1);
		for ($i = 0; $i < 10; ++$i)
		{
			// empty
		}
		if (TRUE) echo 'yes';
		else if (FALSE) {
			++$i;
		} else if (1) {
			--$i;
		} else if ('string') {
			doSomethink();
		}
		else if ("string") {
			doSomethink();
		}
		else if ("$variable") {
			// should warn
		}
		else if (CONSTANT_EXPRESSION) {}
		else
		{
			// empty
		}
		return FALSE;
	}

	protected function multilineCondition() {
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

	protected function closure() {
		$a = function() use($this) {
			return $this->a;
		}
	}

	public function parameterDefaultness($a = 'default', $missingDefaultValue) {
		doSomethink($a = 'default', $missingDefaultValue);
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
	protected function flow() {
		$this->instance->
			do()
		->done();
	}

	public function closingBraceIndentation() {
		doSomethink();
		}

	public function scopeIndentation() {
	if ($var) {
	doSomethink();
	}
	}

	public function multilineFunctionCall($first, $second,
		$third
		, $fourth) {
		doSomethink($first, $second, $third, $fourth);
	}

	public function arrayKeyBracesSpacing() {
		$array [ $key ];
	}

	public function classNameAsReference() {
		Second_Class::method();
	}

	public function foreachSpacing() {
		foreach ($iterator  AS $key=>$value) {

		}
	}

	public function echoConstruct() {
		echo ('string should not be in parenthesis');
		echo'missing space';
	}

	public  function  methodDeclarationSpacing() {
		doSomethink();
	}

	public function typeCasting() {
		( int ) $float;
	}

	public function semicolonSpacing() {
		$var = 'sdfghjk' ;
	}

	# invalid comment
	public function multipleStatements() {
		$a = 1, $b = 2;
		$c = 3; doSomethink();
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
