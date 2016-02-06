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

	private function includeFile() {
		require_once __DIR__ . '/file.php';
	}

	/**
	 * Throws exception, so it shall be documented.
	 */
	public function documentExceptionThrow() {
		throw new \Exception("Error Processing Request", 1);
	}
}
