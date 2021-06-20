<?php

namespace RTippin\Messenger\Actions\Bots;

use Illuminate\Database\Eloquent\Collection;
use RTippin\Messenger\Actions\BaseMessengerAction;
use RTippin\Messenger\Models\Bot;
use RTippin\Messenger\Services\FileService;

class PurgeBots extends BaseMessengerAction
{
    /**
     * @var FileService
     */
    private FileService $fileService;

    /**
     * PurgeBots constructor.
     *
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Loop through the collection of bots and remove the bots
     * storage directory files, then force delete the bot
     * itself from database.
     *
     * @param mixed ...$parameters
     * @var Collection[0]
     * @return $this
     */
    public function execute(...$parameters): self
    {
        /** @var Collection $bots */
        $bots = $parameters[0];

        $bots->each(fn (Bot $bot) => $this->purge($bot));

        return $this;
    }

    /**
     * @param Bot $bot
     */
    private function purge(Bot $bot): void
    {
        $this->destroyBotAvatar($bot);

        $this->destroyBot($bot);
    }

    /**
     * @param Bot $bot
     */
    private function destroyBotAvatar(Bot $bot): void
    {
        $this->fileService
            ->setDisk($bot->getStorageDisk())
            ->setDirectory($bot->getStorageDirectory())
            ->destroyDirectory();
    }

    /**
     * @param Bot $bot
     */
    private function destroyBot(Bot $bot): void
    {
        $bot->forceDelete();
    }
}
