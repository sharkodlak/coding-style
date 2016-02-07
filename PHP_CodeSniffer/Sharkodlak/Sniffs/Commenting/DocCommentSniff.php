<?php
/**
 * Ensures doc blocks follow basic formatting.
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
 * Ensures doc blocks follow basic formatting.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Pavel Štětina <github@shark.kom.cz>
 * @license   https://raw.githubusercontent.com/sharkodlak/coding-style/master/LICENSE MIT Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Sharkodlak_Sniffs_Commenting_DocCommentSniff implements PHP_CodeSniffer_Sniff {
	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var array
	 */
	public $supportedTokenizers = array(
		'PHP',
		'JS',
	);

	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register() {
		return array(T_DOC_COMMENT_OPEN_TAG);
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
		$commentStart = $stackPtr;
		$commentEnd = $tokens[$stackPtr]['comment_closer'];
		$empty = array(
			T_DOC_COMMENT_WHITESPACE,
			T_DOC_COMMENT_STAR,
		);

		$short = $phpcsFile->findNext($empty, ($stackPtr + 1), $commentEnd, true);
		if ($short === false) {
			// No content at all.
			$error = 'Doc comment is empty';
			$phpcsFile->addError($error, $stackPtr, 'Empty');
			return;
		}

		// The first line of the comment should have /** comment openning and short description.
		if ($tokens[$short]['line'] !== $tokens[$stackPtr]['line']) {
			$error = 'Short description must follow doc comment open tag immediatelly';
			$fix = $phpcsFile->addFixableWarning($error, $stackPtr, 'DescriptionAway');
			if ($fix === true) {
				$phpcsFile->fixer->beginChangeset();
				for ($ptr = $stackPtr + 1; $ptr < $short; ++$ptr) {
					$phpcsFile->fixer->replaceToken($ptr, '');
				}
				$phpcsFile->fixer->addContentBefore($short, ' ');
				$phpcsFile->fixer->endChangeset();
			}
		}
	}
}
