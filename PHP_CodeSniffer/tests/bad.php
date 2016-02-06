<?php

namespace Sharkodlak\CodingStyle;


use AnotherNameSpace\{ClassFirst, ClassSecond as SecondClass};
use function AnotherNameSpace\{functionFirst, functionSecond as secondFunction};
use const AnotherNameSpace\{CONST_FIRST, CONST_SECOND as SECOND_CONST};

class  Bad
extends Wrong
	implements Incorrect, Mallformed,
Stupid {
	static private $own = NULL;

	static public function asdf()
	{
		$range = range(0,10,1);
		for ($i = 0; $i < count($range); ++$i)
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
		elseif (fn()) {
			--$i;
		}
		else
		{
			// empty
		}
		return FALSE;
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
}
?>
<?

Bad::asdf();

?>
