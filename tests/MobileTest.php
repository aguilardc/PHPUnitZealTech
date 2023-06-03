<?php

namespace Tests;

use App\Mobile;
use App\providers\BitelProvider;
use App\providers\MovistarProvider;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class MobileTest extends TestCase
{

    /** @test */
    public function it_returns_null_when_name_empty()
    {
        $mobile = new Mobile(new BitelProvider());

        $this->assertNull($mobile->makeCallByName(''));
    }

    /** @test */
    public function it_returns_null_when_name_not_found()
    {
        $mobile = new Mobile(new MovistarProvider());

        $this->assertNull($mobile->makeCallByName('Gary'));
    }

    /** @test */
    public function it_returns_call_object_when_send_name()
    {
        $mobile = new Mobile(new BitelProvider());
        $this->assertIsObject($mobile->makeCallByName('Debbie'));
    }

    /** @test */
    public function it_returns_null_when_sms_name_empty()
    {
        $mobile = new Mobile(new MovistarProvider());

        $this->assertNull($mobile->sendSMS('', 'hello world'));
    }

    /** @test */
    public function it_returns_null_when_sms_message_empty()
    {
        $mobile = new Mobile(new MovistarProvider());

        $this->assertNull($mobile->sendSMS('Debbie', ''));
    }

    /** @test */
    public function it_returns_null_when_number_is_invalid()
    {
        $mobile = new Mobile(new MovistarProvider());

        $this->assertNull($mobile->sendSMS('Bruce', 'Hello World'));
    }

    /** @test  */
    public function it_returns_string_when_send_sms(){
        $mobile = new Mobile(new MovistarProvider());
        $this->assertEquals("Hi Debbie, this is a message: Hello everybody", $mobile->sendSMS('Debbie', 'Hello everybody'));

    }

}
