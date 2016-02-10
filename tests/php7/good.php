<?php

namespace Sharkodlak\CodingStyle\Php7;

use function SubNameSpace\functionFirst;
use function SubNameSpace\functionSecond as secondFunction;
use const SubNameSpace\CONST_FIRST;
use const SubNameSpace\CONST_SECOND as SECOND_CONST;

class Good {
	use SomeTrait, AnotherTrait {
		SomeTrait::method insteadof AnotherTrait;
		AnotherTrait::method as protected renamedMethod;
	};
	const CONSTANT_DAY = 24 * 60 * 60;
	protected static $arrayDereferencing = range(0, 9)[7];

	public static function variableArguments(string $first, int ...$params): string {
		return sprintf($first, array_sum($params), ...$params);
	}

	protected function square(int $side): int {
		return $side ** 2;
	}
}
