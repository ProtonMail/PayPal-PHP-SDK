<?php
namespace PayPal\Test\Validation;

use PayPal\Validation\JsonValidator;
use PHPUnit\Framework\TestCase;

class JsonValidatorTest extends TestCase
{

    public static function positiveProvider()
    {
        return array(
            array(null),
            array(''),
            array("{}"),
            array('{"json":"value", "bool":false, "int":1, "float": 0.123, "array": [{"json":"value", "bool":false, "int":1, "float": 0.123},{"json":"value", "bool":false, "int":1, "float": 0.123} ]}')
        );
    }

    public static function invalidProvider()
    {
        return array(
            array('{'),
            array('}'),
            array('     '),
            array('{"json":"value, "bool":false, "int":1, "float": 0.123, "array": [{"json":"value, "bool":false, "int":1, "float": 0.123}"json":"value, "bool":false, "int":1, "float": 0.123} ]}')
        );
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate($input)
    {
        $this->assertTrue(JsonValidator::validate($input));
    }

    /**
     * @dataProvider invalidProvider
     */
    public function testInvalidJson($input)
    {
        $this->expectException(\InvalidArgumentException::class);
        JsonValidator::validate($input);
    }

    /**
     *
     * @dataProvider invalidProvider
     */
    public function testInvalidJsonSilent($input)
    {
        $this->assertFalse(JsonValidator::validate($input, true));
    }
}
