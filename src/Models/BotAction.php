<?php

namespace RTippin\Messenger\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Cache;
use RTippin\Messenger\Actions\Bots\BotActionHandler;
use RTippin\Messenger\Contracts\ActionHandler;
use RTippin\Messenger\Contracts\MessengerProvider;
use RTippin\Messenger\Database\Factories\BotActionFactory;
use RTippin\Messenger\Facades\Messenger;
use RTippin\Messenger\Facades\MessengerBots;
use RTippin\Messenger\Traits\Uuids;

/**
 * @property string $id
 * @property string $bot_id
 * @property string|int $owner_id
 * @property string $owner_type
 * @property string|ActionHandler|BotActionHandler $handler
 * @property string $triggers
 * @property string|null $payload
 * @property bool $admin_only
 * @property string $match
 * @property int $cooldown
 * @property bool $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin Model|\Eloquent
 * @property-read Model|Bot $bot
 * @property-read Model|MessengerProvider $owner
 * @method static Builder|BotAction enabled()
 * @method static Builder|BotAction validHandler()
 * @method static Builder|BotAction handler(string $handler)
 * @method static Builder|BotAction hasEnabledBotFromThread(string $threadId)
 */
class BotAction extends Model
{
    use HasFactory;
    use Uuids;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bot_actions';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    public $keyType = 'string';

    /**
     * The attributes that can be set with Mass Assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'admin_only' => 'boolean',
        'enabled' => 'boolean',
    ];

    /**
     * @return BelongsTo|Bot
     */
    public function bot(): BelongsTo
    {
        return $this->belongsTo(Bot::class);
    }

    /**
     * @return MorphTo|MessengerProvider
     */
    public function owner(): MorphTo
    {
        return $this->morphTo()->withDefault(function () {
            return Messenger::getGhostProvider();
        });
    }

    /**
     * Scope actions that are enabled.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeEnabled(Builder $query): Builder
    {
        return $query->where('enabled', '=', true);
    }

    /**
     * Scope actions that have a valid handler set.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeValidHandler(Builder $query): Builder
    {
        return $query->whereIn('handler', MessengerBots::getHandlerClasses());
    }

    /**
     * Scope actions that have a valid handler set.
     *
     * @param Builder $query
     * @param string $handler
     * @return Builder
     */
    public function scopeHandler(Builder $query, string $handler): Builder
    {
        return $query->where('handler', '=', $handler);
    }

    /**
     * Scope actions that belong to a bot using thread id, and is enabled.
     *
     * @param Builder $query
     * @param string $threadId
     * @return Builder
     */
    public function scopeHasEnabledBotFromThread(Builder $query, string $threadId): Builder
    {
        return $query->whereHas('bot', function (Builder $query) use ($threadId) {
            return $query->where('thread_id', '=', $threadId)
                ->where('enabled', '=', true);
        });
    }

    /**
     * Get all triggers for the action.
     *
     * @return array
     */
    public function getTriggers(): array
    {
        return explode('|', $this->triggers);
    }

    /**
     * Get the handler settings.
     *
     * @return array|null
     */
    public function getDetails(): ?array
    {
        return MessengerBots::getHandlerSettings($this->handler);
    }

    /**
     * @return array|null
     */
    public function getPayload(): ?array
    {
        return is_null($this->payload)
            ? null
            : json_decode($this->payload, true);
    }

    /**
     * Does the action have an active cooldown?
     *
     * @return bool
     */
    public function hasCooldown(): bool
    {
        return Cache::has("bot:$this->bot_id:$this->id:cooldown");
    }

    /**
     * Does the action or the actions bot have an active cooldown?
     *
     * @return bool
     */
    public function hasAnyCooldown(): bool
    {
        return $this->hasCooldown() || $this->bot->hasCooldown();
    }

    /**
     * Set the action cooldown.
     */
    public function startCooldown(): void
    {
        Cache::put("bot:$this->bot_id:$this->id:cooldown", true, now()->addSeconds($this->cooldown));
    }

    /**
     * Release the action cooldown.
     */
    public function releaseCooldown(): void
    {
        Cache::forget("bot:$this->bot_id:$this->id:cooldown");
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return BotActionFactory::new();
    }
}
