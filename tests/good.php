<?php

namespace Sharkodlak\CodingStyle;

use SubNameSpace\ClassFirst;
use SubNameSpace\ClassSecond as SecondClass;

class Good extends Fine implements Right,
	Correct,
	Straight
{
	use SomeTrait;
	const CONSTANTINOPOLIS_CITY = 'Istanbul';
	const CONSTANT_ARRAY = ['clown', 'fish'];
	private static $staticAttic = '^';
	public static $char = 'qwertyuiop'[3];
	private $binary
		= 0b01010101;
	protected $_underscore;

	protected static function tcf() {
		try {
			if ($condition < 0) {
				$cmp = -1;
			} else if ($condition > 0) {
				$cmp = 1;
			} else {
				$cmp = 0;
			}
			throw new \Exception('blah blah blah');
		} catch (\Exception $e) {
			$ex = $e;
		} finally {
			echo 'finish';
		}
	}

	private static function methodExpression() {
		return self::{'t' . chr(ord('c')) . 'f'}();
	}

	public function instantiationAccess() {
		return (new Instance)->getName();
	}

	private function range($start, $limit, $step = 1) {
		for ($i = $start; $i <= $limit; $i += $step) {
			yield $i;
		}
	}

	protected function multilineCondition() {
		if ($first > 7
			&& $second < 9
			|| $third
		) {
			doSomethink();
		}
	}

	private function includeFile() {
		include_once __DIR__ . '/file.php';
	}

	protected function closure() {
		$a = function () use ($this) {
			return $this->a;
		};
	}

	protected function flow() {
		$this->instance
			->do()
			->done();
	}

	/** Short description on same line as comment openning.
	 */
	public function switchStatement() {
		switch ($variable) {
			case 'value':
			case 'another value':
				// code...
				break;
			default:
				// code...
		}
	}

	public function unusedParameters($a, $b, $c) {
		"Text with $a replacement.";
		<<<"HEREDOC"
Text with {$b} and ${c} replacement
HEREDOC;
	}

	public function unusedParametersGetArgs($d, $e) {
		func_get_args();
	}
}
