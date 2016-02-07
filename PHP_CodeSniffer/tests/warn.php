<?php

namespace Sharkodlak\CodingStyle;

define('CONSTANT_NAME', 'Sharkodlak');
define('CONSTANT_ARRAY', ['sword', 'fish']);
define('CONSTANT_HOUR', 60 * 60);

function qwertyuiopAsdfghjklZxcvbnm1234567890QwertyuiopAsdfghjklZxcvbnm1234567890QwertyuiopAsdfghjklZxcvbnm1234567890QwertyuiopAsdfghjkl() {
	$longArraySyntax = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
}

function includeFile() {
	require_once __DIR__ . '/file.php';
}

final class Warn {
	final public $final;

	public function avoidFunctionCallsInForLoopTest() {
		for ($i = 0; $i < count($range); ++$i) {
			doSomethink();
		}
	}

	public function unusedParameters($a = 'default') {
		doSomethink();
	}

	public function expressionElseif() {
		if ($var == 1) {
			doSomethink();
		} elseif ($var > 0) {
			--$i;
		}
	}

	public function sameVariableIsModifiedInBothLoops() {
		for ($i = 0; $i < 10; ++$i) {
			for ($j = 10; $j > 0; $i--) {
				doSomethink();
			}
		}
	}

	private function includeFile() {
		require_once __DIR__ . '/file.php';
	}

	/**
	 * Throws exception, so it shall be documented.
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

	public function prematureBreakAndContinue() {
		while (true) {
			continue;
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
}
