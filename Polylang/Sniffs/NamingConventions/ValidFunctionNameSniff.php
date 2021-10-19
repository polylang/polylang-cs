<?php
/**
 * Ensures method names are correct.
 * php version 5.6
 *
 * @package WP_Syntex\PolylangCS
 */

namespace WP_Syntex\PolylangCS\Polylang\Sniffs\NamingConventions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\NamingConventions\ValidFunctionNameSniff as SquizValidFunctionNameSniff;
use PHP_CodeSniffer\Util\Common;

/**
 * Sniff that ensures method names are correct.
 * This version allows to ignore some method names that are imposed to us.
 */
class ValidFunctionNameSniff extends SquizValidFunctionNameSniff {

	/**
	 * Method names to ignore.
	 *
	 * @var array<string>
	 */
	public $ignoreMethods = [
		'set_up_before_class',
		'set_up',
		'assert_pre_conditions',
		'assert_post_conditions',
		'tear_down',
		'tear_down_after_class',
	];

	/**
	 * Processes the tokens within the scope.
	 *
	 * @param  File $phpcsFile The file being processed.
	 * @param  int  $stackPtr  The position where this token was found.
	 * @param  int  $currScope The position of the current scope.
	 * @return void
	 */
	protected function processTokenWithinScope( File $phpcsFile, $stackPtr, $currScope ) {
		$tokens = $phpcsFile->getTokens();

		// Determine if this is a function which needs to be examined.
		$conditions = $tokens[ $stackPtr ]['conditions'];
		end( $conditions );
		$deepestScope = key( $conditions );

		if ( $deepestScope !== $currScope ) {
			return;
		}

		$methodName = $phpcsFile->getDeclarationName( $stackPtr );

		if ( null === $methodName ) {
			// Ignore closures.
			return;
		}

		if ( in_array( $methodName, $this->ignoreMethods, true ) ) {
			return;
		}

		parent::processTokenWithinScope( $phpcsFile, $stackPtr, $currScope );
	}
}
