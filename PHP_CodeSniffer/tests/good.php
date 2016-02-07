<?php

namespace Sharkodlak\CodingStyle;

use SubNameSpace\ClassFirst;
use SubNameSpace\ClassSecond as SecondClass;
use function SubNameSpace\functionFirst;
use function SubNameSpace\functionSecond as secondFunction;
use const SubNameSpace\CONST_FIRST;
use const SubNameSpace\CONST_SECOND as SECOND_CONST;

class Good extends Fine implements Right,
	Correct,
	Straight
{
	use SomeTrait, AnotherTrait {
		SomeTrait::method insteadof AnotherTrait;
		AnotherTrait::method as protected renamedMethod;
	};
	const CONSTANTINOPOLIS_CITY = 'Istanbul';
	const CONSTANT_ARRAY = ['clown', 'fish'];
	const CONSTANT_DAY = 24 * 60 * 60;
	private static $staticAttic = '^';
	protected static $arrayDereferencing = range(0, 9)[7];
	public static $char = 'qwertyuiop'[3];
	private $binary
		= 0b01010101;
	protected $_underscore;

	public static function variableArguments(string $first, int ...$params): string {
		return sprintf($first, array_sum($params), ...$params);
	}

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

	protected function square(int $side): int {
		return $side ** 2;
	}

	private function range($start, $limit, $step = 1) {
		for ($i = $start; $i <= $limit; $i += $step) {
			yield $i;
		}
	};

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
		}
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
}
