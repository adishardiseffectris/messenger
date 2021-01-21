<?php

namespace RTippin\Messenger\Tests\Actions;

use Exception;
use RTippin\Messenger\Actions\Calls\CallBrokerSetup;
use RTippin\Messenger\Contracts\VideoDriver;
use RTippin\Messenger\Models\Call;
use RTippin\Messenger\Models\Thread;
use RTippin\Messenger\Tests\FeatureTestCase;

class CallBrokerSetupTest extends FeatureTestCase
{
    private Thread $group;

    private Call $call;

    protected function setUp(): void
    {
        parent::setUp();

        $tippin = $this->userTippin();

        $this->group = $this->createGroupThread($tippin);

        $this->call = $this->group->calls()->create([
            'type' => 1,
            'owner_id' => $tippin->getKey(),
            'owner_type' => get_class($tippin),
            'call_ended' => null,
            'setup_complete' => false,
            'room_id' => null,
            'room_pin' => null,
            'room_secret' => null,
            'payload' => null,
        ]);
    }

    /** @test */
    public function call_setup_updates_call()
    {
        $this->mock(VideoDriver::class)->shouldReceive([
            'create' => true,
            'getRoomId' => '123456',
            'getRoomPin' => 'TEST-PIN',
            'getRoomSecret' => 'TEST-SECRET',
            'getExtraPayload' => 'TEST-EXTRA-PAYLOAD',
        ]);

        app(CallBrokerSetup::class)->execute(
            $this->group,
            $this->call
        );

        $this->assertDatabaseHas('calls', [
            'id' => $this->call->id,
            'setup_complete' => true,
            'room_id' => '123456',
            'room_pin' => 'TEST-PIN',
            'room_secret' => 'TEST-SECRET',
            'payload' => 'TEST-EXTRA-PAYLOAD',
        ]);
    }

    /** @test */
    public function call_setup_throws_exception_if_setup_failed()
    {
        $this->mock(VideoDriver::class)->shouldReceive([
            'create' => false,
        ]);

        $this->expectException(Exception::class);

        app(CallBrokerSetup::class)->execute(
            $this->group,
            $this->call
        );
    }

    /** @test */
    public function call_setup_throws_exception_if_call_ended()
    {
        $this->call->update([
            'call_ended' => now(),
        ]);

        $this->expectException(Exception::class);

        app(CallBrokerSetup::class)->execute(
            $this->group,
            $this->call
        );
    }

    /** @test */
    public function call_setup_throws_exception_if_call_already_setup()
    {
        $this->call->update([
            'setup_complete' => true,
        ]);

        $this->expectException(Exception::class);

        app(CallBrokerSetup::class)->execute(
            $this->group,
            $this->call
        );
    }
}
