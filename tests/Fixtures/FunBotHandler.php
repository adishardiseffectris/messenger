<?php

namespace RTippin\Messenger\Tests\Fixtures;

use RTippin\Messenger\Actions\Bots\BotActionHandler;
use RTippin\Messenger\MessengerBots;

class FunBotHandler extends BotActionHandler
{
    public static function getSettings(): array
    {
        return [
            'alias' => 'fun_bot',
            'description' => 'This is a fun bot.',
            'name' => 'Fun Bot',
            'triggers' => '!test|!more',
            'match' => MessengerBots::MATCH_EXACT_CASELESS,
        ];
    }

    public function handle(): void
    {
        $this->composer()->message('Testing Fun.');
    }

    public function rules(): array
    {
        return [
            'test' => ['required', 'array', 'min:1'],
            'test.*' => ['required', 'string'],
            'special' => ['nullable', 'boolean'],
        ];
    }
}
