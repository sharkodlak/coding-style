<?php

namespace Sharkodlak\CodingStyle;

define('CONSTANT_NAME', 'Sharkodlak');
define('CONSTANT_ARRAY', ['sword', 'fish']);
define('CONSTANT_HOUR', 60 * 60);

function qwertyuiopAsdfghjklZxcvbnm1234567890QwertyuiopAsdfghjklZxcvbnm1234567890QwertyuiopAsdfghjklZxcvbnm1234567890QwertyuiopAsdfghjkl() {
	$longArraySyntax = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	return $longArraySyntax;
}

function includeFile() {
	require_once __DIR__ . '/file.php';
}

final class Warn {
	public $final;
	protected $_underscore;

	public function avoidFunctionCallsInForLoopTest() {
		$range = range(0, 9);
		for ($i = 0; $i < count($range); ++$i) {
			doSomethink();
		}
	}

	public function expressionElseif() {
		if ($var == 1) {
			doSomethink();
		} elseif ($var > 0) {
			doSomethinkElse();
		}
	}

	public function sameVariableIsModifiedInBothLoops() {
		for ($i = 0; $i < 10; ++$i) {
			for ($j = 10; $j > 0; $i--) {
				doSomethink();
			}
		}
	}

	public function includeFile() {
		require_once __DIR__ . '/file.php';
	}

	/** Throws exception, so it shall be documented.
	 */
	public function documentExceptionThrow() {
		throw new \Exception("Error Processing Request", 1);
	}

	public function prematureExit() {
		exit('qwerty');
		'some other code after exit';
	}

	public function prematureReturn() {
		return true;
		'some other code after return';
	}

	public function prematureBreakAndContinue($first) {
		while (true) {
			continue;
			'some other code after break or continue';
		}
		while ($first) {
			break;
			'some other code after break or continue';
		}
	}

	public function stringConcat() {
		'asdfghjkl'
		. 'zxcvbnm';
	}

	public function evalUsage() {
		eval('$instance = new Bar'); // warn about each eval usage
	}

	/**
	 * Short description shall be on the opening line so it can be folded and still visible.
	 */
	public function nesting() {
		$first = $second = $third = true;
		if ($first) {
			if ($second) {
				if ($third) {
					doSomethink();
				}
			}
		}
	}

	public function unusedParameters($first, $second) {
		'Text with $first replacement.';
		<<<'NOWDOC'
Text with $second replacement
NOWDOC;
	}

	public function forLoopToWhile($first) {
		for (; true;) {
			doSomethink();
		}
	}

	protected function cyclomaticComplexity($first) {
		switch ($first) {
			case 1:
				doSomethink();
				break;
			default:
				doSomethink();
		}
		if ($first) {
			doSomethink();
		} else if ($first) {
			doSomethink();
		}
		while ($first) {
			for (; $first; $first) {
				doSomethink();
			}
		}
		do {
			for (; true; $first) {
				doSomethink();
			}
		} while ($first);
		if ($first) {
			do {
				doSomethink();
			} while ($first);
		}
	}
}
