<?php
/**
 * This file is part of the CodeAnalysis add-on for PHP_CodeSniffer.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Pavel Štětina <github@shark.kom.cz>
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Manuel Pichler <mapi@manuel-pichler.de>
 * @copyright 2007-2014 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD License
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Detects unconditional if- and elseif-statements.
 *
 * This rule is based on the PMD rule catalog. The Unconditional If Statement
 * sniff detects statement conditions that are set to constant expression.
 *
 * <code>
 * class Foo {
 *     public function close() {
 *         if ('string') {
 *             // ...
 *         }
 *     }
 * }
 * </code>
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Pavel Štětina <github@shark.kom.cz>
 * @author    Manuel Pichler <mapi@manuel-pichler.de>
 * @copyright 2007-2014 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Sharkodlak_Sniffs_CodeAnalysis_UnconditionalIfStatementSniff implements PHP_CodeSniffer_Sniff {
	/**
	 * Registers the tokens that this sniff wants to listen for.
	 *
	 * @return int[]
	 */
	public function register() {
		return array(
			T_IF,
			T_ELSEIF,
		);
	}

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param int                  $stackPtr  The position of the current token
	 *                                        in the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr) {
		$tokens = $phpcsFile->getTokens();
		$token = $tokens[$stackPtr];
		// Skip for-loop without body.
		if (isset($token['parenthesis_opener']) === false) {
			return;
		}
		$next = ++$token['parenthesis_opener'];
		$end = --$token['parenthesis_closer'];
		$goodCondition = false;
		for (; $next <= $end; ++$next) {
			$code = $tokens[$next]['code'];
			if (isset(PHP_CodeSniffer_Tokens::$emptyTokens[$code])) {
				continue;
			} else if (!in_array($code, array(T_TRUE, T_FALSE, T_LNUMBER, T_CONSTANT_ENCAPSED_STRING, T_STRING))) {
				$goodCondition = true;
				break;
			}
		}
		if (!$goodCondition) {
			$error = 'Avoid IF statements that are always true or false';
			$phpcsFile->addError($error, $stackPtr, 'Found');
		}
	}
}
