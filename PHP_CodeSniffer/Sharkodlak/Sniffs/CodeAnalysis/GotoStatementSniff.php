<?php
/**
 * This file is part of the CodeAnalysis add-on for PHP_CodeSniffer.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Pavel Štětina <github@shark.kom.cz>
 * @license   https://raw.githubusercontent.com/sharkodlak/coding-style/master/LICENSE MIT Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Detects GOTO-statements usage.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Pavel Štětina <github@shark.kom.cz>
 * @license   https://raw.githubusercontent.com/sharkodlak/coding-style/master/LICENSE MIT Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Sharkodlak_Sniffs_CodeAnalysis_GotoStatementSniff implements PHP_CodeSniffer_Sniff {
	/**
	 * Registers the tokens that this sniff wants to listen for.
	 *
	 * @return int[]
	 */
	public function register() {
		return array(
			T_GOTO,
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
		$error = "Avoid GOTO, deprecated in high level langs.";
		$phpcsFile->addError($error, $stackPtr, 'Found');
	}
}
