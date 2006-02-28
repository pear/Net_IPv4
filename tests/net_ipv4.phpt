--TEST--
PEAR::Net_IPv4
--FILE--
require_once 'IPv4Test.php';
require_once 'SimpleTestListener.php';
require_once 'PHPUnit2/Framework/TestResult.php';
require_once 'PHPUnit2/Framework/TestSuite.php';

$suite = new PHPUnit2_Framework_TestSuite('IPv4Test');
$result = new PHPUnit2_Framework_TestResult;
$result->addListener(new SimpleTestListener);
$suite->run($result);
--EXPECT--
TestSuite 'IPv4Test' started.
Test 'test_atoh' started.
Test 'test_atoh' ended.
Test 'test_htoa' started.
Test 'test_htoa' ended.
Test 'test_validateIP' started.
Test 'test_validateIP' ended.
Test 'test_ip2double' started.
Test 'test_ip2double' ended.
TestSuite 'IPv4Test' ended.