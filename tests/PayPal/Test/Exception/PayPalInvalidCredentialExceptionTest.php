<?php
use PayPal\Exception\PayPalInvalidCredentialException;
use PHPUnit\Framework\TestCase;

/**
 * Test class for PayPalInvalidCredentialException.
 *
 */
class PayPalInvalidCredentialExceptionTest extends TestCase
{
    /**
     * @var PayPalInvalidCredentialException
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new PayPalInvalidCredentialException;
    }

    /**
     * @test
     */
    public function testErrorMessage()
    {
        $msg = $this->object->errorMessage();
        $this->assertStringContainsString('Error on line', $msg);
    }
}
