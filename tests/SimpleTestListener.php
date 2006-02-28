<?php
require_once 'PHPUnit2/Framework/TestListener.php';
 
class SimpleTestListener
implements PHPUnit2_Framework_TestListener
{
  public function
  addError(PHPUnit2_Framework_Test $test, Exception $e)
  {
    printf(
      "Error while running test '%s'.\n",
      $test->getName()
    );
  }
 
  public function
  addFailure(PHPUnit2_Framework_Test $test,
             PHPUnit2_Framework_AssertionFailedError $e)
  {
    printf(
      "Test '%s' failed.\n",
      $test->getName()
    );
  }
 
  public function
  addIncompleteTest(PHPUnit2_Framework_Test $test,
                    Exception $e)
  {
    printf(
      "Test '%s' is incomplete.\n",
      $test->getName()
    );
  }
 
  public function
  addSkippedTest(PHPUnit2_Framework_Test $test,
                 Exception $e)
  {
    printf(
      "Test '%s' has been skipped.\n",
      $test->getName()
    );
  }
 
  public function startTest(PHPUnit2_Framework_Test $test)
  {
    printf(
      "Test '%s' started.\n",
      $test->getName()
    );
  }
 
  public function endTest(PHPUnit2_Framework_Test $test)
  {
    printf(
      "Test '%s' ended.\n",
      $test->getName()
    );
  }
 
  public function
  startTestSuite(PHPUnit2_Framework_TestSuite $suite)
  {
    printf(
      "TestSuite '%s' started.\n",
      $suite->getName()
    );
  }
 
  public function
  endTestSuite(PHPUnit2_Framework_TestSuite $suite)
  {
    printf(
      "TestSuite '%s' ended.\n",
      $suite->getName()
    );
  }
}
?>