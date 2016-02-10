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

	protected static function tcf($condition) {
		try {
			$cmp = 0;
			if ($condition < 0) {
				$cmp = -1;
			} else if ($condition > 0) {
				$cmp = 1;
			}
			throw new \Exception('blah blah blah');
		} catch (\Exception $e) {
			$e->getMessage();
		} finally {
			echo 'finish';
		}
	}

	private static function methodExpression() {
		return self::{'t' . chr(ord('c')) . 'f'}();
	}

	protected function doNotWarnAboutUnusedPrivate() {
		$tcf = self::methodExpression();
		$range = $this->range(0, 9);
		return [self::$staticAttic, $this->binary, $tcf, $range];
	}

	public function instantiationAccess() {
		return (new Instance)->getName();
	}

	private function range($start, $limit, $step = 1) {
		for ($i = $start; $i <= $limit; $i += $step) {
			yield $i;
		}
	}

	protected function multilineCondition($first, $second, $third) {
		if ($first > 7
			&& $second < 9
			|| $third
		) {
			doSomethink();
		}
	}

	public function includeFile() {
		include_once __DIR__ . '/file.php';
	}

	public function closure() {
		$self = $this;
		return function () use ($self) {
			return $self->a;
		};
	}

	public function flow() {
		$this->instance
			->do()
			->done();
	}

	/** Short description on same line as comment openning.
	 */
	public function switchStatement($case) {
		switch ($case) {
			case 'value':
			case 'another value':
				// code...
				break;
			default:
				// code...
		}
	}

	public function unusedParameters($first, $second, $third) {
		"Text with $first replacement.";
		<<<"HEREDOC"
Text with {$second} and ${third} replacement
HEREDOC;
	}

	public function unusedParametersGetArgs($uno, $duo) {
		func_get_args();
	}
}
