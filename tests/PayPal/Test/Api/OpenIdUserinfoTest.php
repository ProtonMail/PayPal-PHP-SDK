<?php

namespace PayPal\Test\Api;

use PayPal\Api\OpenIdUserinfo;
use PHPUnit\Framework\TestCase;

/**
 * Test class for OpenIdUserinfo.
 *
 */
class OpenIdUserinfoTest extends TestCase
{


    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
    }

    /**
     * @test
     */
    public function testSerializationDeserialization()
    {
        $user = new OpenIdUserinfo();
        $user->setAccountType("PERSONAL")->setAgeRange("20-30")->setBirthday("1970-01-01")
            ->setEmail("me@email.com")->setEmailVerified(true)
            ->setFamilyName("Doe")->setMiddleName("A")->setGivenName("John")
            ->setLocale("en-US")->setGender("male")->setName("John A Doe")
            ->setPayerId("A-XZASASA")->setPhoneNumber("1-408-111-1111")
            ->setPicture("http://gravatar.com/me.jpg")
            ->setSub("me@email.com")->setUserId("userId")
            ->setVerified(true)->setVerifiedAccount(true)
            ->setZoneinfo("America/PST")->setLanguage('en_US')
            ->setAddress(OpenIdAddressTest::getTestData());

        $userCopy = new OpenIdUserinfo();
        $userCopy->fromJson($user->toJSON());

        $this->assertEquals($user, $userCopy);
    }

    /**
     * @test
     */
    public function testInvalidParamUserInfoCall()
    {
        $this->expectException('PayPal\Exception\PayPalConnectionException');
        OpenIdUserinfo::getUserinfo(array('access_token' => 'accessToken'));
    }
}
