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
			for ($j = 10; $j > 0; $j--) {
				// empty
			}
		}
		if (TRUE) echo 'yes';
		else if (FALSE) {
			++$i;
		} else if (1) {
			--$i;
		} else if ('string') {}
		else if ("string") {}
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

	public function prematureExit() {
		exit('qwerty');
		'some other code after exit';
	}

	public function prematureReturn() {
		return true;
		'some other code after return';
	}

	public function prematureBreakAndContinue() {
		while (true) {
			continue;
			break;
			'some other code after break or continue';
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
}
?>
<?

Bad::asdf();

?>