<?php
/**
 * File level comment
 *
 * @package PHPDoctor\Tests\FileLevel
 */

/**
 * This is some text.
 *
 * A link to a fully qualified class {@link PHPDoctor\Tests\FileLevel\aPrivateInterface} somewhere else.
 *
 * A link to a non-qualified class {@link aPrivateInterface} somewhere else.
 *
 * A link to a non-existant class {@link aNonExistantClass} somewhere else.
 *
 * A link to a class in a non-existant package {@link PHPDoctor\aPrivateInterface} somewhere else.
 *
 * A link to an element in a fully qualified class {@link PHPDoctor\Tests\Data\aClass#aVar} somewhere else.
 *
 * A link to an element in a fully qualified class {@link PHPDoctor\Tests\Data\aClass::aVar} (alternative syntax) somewhere else.
 *
 * A link to an element with $ in a fully qualified class {@link PHPDoctor\Tests\Data\aClass#$aVar} somewhere else.
 *
 * A link to a method in a fully qualified class {@link PHPDoctor\Tests\Data\aClass#aFunction} somewhere else.
 *
 * A link to a rooted fully qualified class {@link \PHPDoctor\Tests\Data\aClass} somewhere else.
 *
 * A link to a method with parenthesis in a fully qualified class {@link PHPDoctor\Tests\Data\aClass#aFunction()} somewhere else.
 *
 * A link to a website {@link http://www.google.com} somewhere else.
 *
 * A link to a website {@link http://www.google.com Google} with a name.
 *
 * Another line
 *
 * @package PHPDoctor\Tests\Data
 * @see aPrivateInterface Something else
 * @todo More stuff
 */
interface anInterface {
	
	const aConst = 'const';
	
	/**
	 * Some words about this constant
	 *
	 * @var int
	 */
	const anIntConst = 0;
	
	/**
	 * @var int
	 * @access private
	 */
	const aPrivateIntConst = 0;
	
	const multipleConsts1 = 1, multipleConsts2 = 2, multipleConsts3 = 3;
	
}

/**
 * This is aClass that implements anInterface
 * @package PHPDoctor\Tests\Data
 */
class aClass implements anInterface {
	
	var $aVar;
	
	/**
	 * @var int
	 */
	var $anIntVar;
	
	/**
	 * @var int
	 * @access private
	 */
	var $aPrivateIntVar;
	
	var $multipleVars1 = 1, $multipleVars2, $multipleVars3 = 3;
	
	var $aVarWithValue = 1;
    
    var $aVarWithStringValue = "one";
	
	var $anArrayVar = array(4, 5, 6);
	
	var $varContainingHTMLToEscape = '<strong>Escape me</strong>';
	
	function aClass() {}
	
	/**
	 * This is a method of the class aClass
	 *
	 * @throws Exception
	 */
	function aMethod() {
		/**
		 * @var int
		 */
		define('THREE', 3);
	}
	
	function aMethodWithParams($one, $two) {}
	
	/**
	 * @access private
	 * @param str one
	 * @param int two
	 * @return bool
	 */
	function aPrivateMethodWithParams($one, $two) {}
	
}

/**
 * @package PHPDoctor\Tests\Data
 */
class childClass extends aClass {}

require_once 'php5-test2.php';
class duplicateClass extends PHPDoctor\Tests\MyNamespace\duplicateClass {}


function aFunction() { }
function aFunctionWithParams($one, int $two) { }

/**
 * @namespace PHPDoctor\Tests\Data
 */
class anotherClassWithSameMemberAsAnotherClass {
    var $aVarWithValue = 2;
    
    /**
     * This is a
     * multi-line description
     * @param str foo This
                      is
     **               foo
     * @return str And a multi-line
     *             tag description
     */
    function aFunction($foo) {
	}
}

define('CONSTANT', 1);
define( 'CONSTANT2' , 2 );
define(  'CONSTANT3'  ,  'three'  );

?>
