<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentCard;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentCard
 *
 * @package PayPal\Test\Api
 */
class PaymentCardTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentCard
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","number":"TestSample","type":"TestSample","expire_month":"123","expire_year":"123","start_month":"TestSample","start_year":"TestSample","cvv2":"TestSample","first_name":"TestSample","last_name":"TestSample","billing_country":"TestSample","billing_address":' .AddressTest::getJson() . ',"external_customer_id":"TestSample","status":"TestSample","card_product_class":"TestSample","valid_until":"TestSample","issue_number":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentCard
     */
    public static function getObject()
    {
        return new PaymentCard(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentCard
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentCard(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getNumber());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getExpireMonth());
        $this->assertNotNull($obj->getExpireYear());
        $this->assertNotNull($obj->getStartMonth());
        $this->assertNotNull($obj->getStartYear());
        $this->assertNotNull($obj->getCvv2());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBillingCountry());
        $this->assertNotNull($obj->getBillingAddress());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getStatus());
        $this->assertNotNull($obj->getCardProductClass());
        $this->assertNotNull($obj->getValidUntil());
        $this->assertNotNull($obj->getIssueNumber());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCard $obj
     */
    public function testGetters($obj)
    {
        $this->assertSame($obj->getId(), "TestSample");
        $this->assertSame($obj->getNumber(), "TestSample");
        $this->assertSame($obj->getType(), "TestSample");
        $this->assertSame($obj->getExpireMonth(), "123");
        $this->assertSame($obj->getExpireYear(), "123");
        $this->assertSame($obj->getStartMonth(), "TestSample");
        $this->assertSame($obj->getStartYear(), "TestSample");
        $this->assertSame($obj->getCvv2(), "TestSample");
        $this->assertSame($obj->getFirstName(), "TestSample");
        $this->assertSame($obj->getLastName(), "TestSample");
        $this->assertSame($obj->getBillingCountry(), "TestSample");
        $this->assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        $this->assertSame($obj->getExternalCustomerId(), "TestSample");
        $this->assertSame($obj->getStatus(), "TestSample");
        $this->assertSame($obj->getCardProductClass(), "TestSample");
        $this->assertSame($obj->getValidUntil(), "TestSample");
        $this->assertSame($obj->getIssueNumber(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
