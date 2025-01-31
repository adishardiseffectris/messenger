<?php

namespace RTippin\Messenger\Facades;

use Illuminate\Support\Facades\Facade;
use RTippin\Messenger\Contracts\MessengerProvider;
use RTippin\Messenger\Models\GhostUser;
use RTippin\Messenger\Models\Participant;

/**
 * @method static \RTippin\Messenger\Messenger setProvider($provider = null, bool $scoped = false)
 * @method static \RTippin\Messenger\Messenger setScopedProvider($provider = null)
 * @method static \RTippin\Messenger\Messenger unsetProvider(bool $scoped = false, bool $flush = false)
 * @method static \RTippin\Messenger\Messenger unsetScopedProvider()
 * @method static MessengerProvider|null getProvider(bool $withoutRelations = false)
 * @method static bool isProviderSet()
 * @method static bool isScopedProviderSet()
 * @method static bool isValidMessengerProvider($provider = null)
 * @method static string|null findProviderAlias($provider = null)
 * @method static MessengerProvider|string|null findAliasProvider(string $alias)
 * @method static bool isProviderSearchable($provider = null)
 * @method static bool isProviderFriendable($provider = null)
 * @method static bool isProvidersCached()
 * @method static \RTippin\Messenger\Messenger setConfig(array $params)
 * @method static array getConfig()
 * @method static array getSystemFeatures()
 * @method static array getAllSearchableProviders()
 * @method static array getAllFriendableProviders()
 * @method static array getAllProviders(bool $returnFullClass = false)
 * @method static array getRawProviders()
 * @method static array getAllProvidersWithDevices()
 * @method static int getMessageSizeLimit()
 * @method static \RTippin\Messenger\Messenger setMessageSizeLimit(int $messageSizeLimit)
 * @method static bool isKnockKnockEnabled()
 * @method static \RTippin\Messenger\Messenger setKnockKnock(bool $knockKnock)
 * @method static int getKnockTimeout()
 * @method static \RTippin\Messenger\Messenger setKnockTimeout(int $knockTimeout)
 * @method static \RTippin\Messenger\Messenger disableCallsTemporarily(int $minutesDisabled)
 * @method static bool isCallingTemporarilyDisabled()
 * @method static \RTippin\Messenger\Messenger removeTemporaryCallShutdown()
 * @method static bool isCallingEnabled()
 * @method static \RTippin\Messenger\Messenger setCalling(bool $calling)
 * @method static bool isBotsEnabled()
 * @method static \RTippin\Messenger\Messenger setBots(bool $bots)
 * @method static bool shouldVerifyPrivateThreadFriendship()
 * @method static \RTippin\Messenger\Messenger setVerifyPrivateThreadFriendship(bool $verifyPrivateThreadFriendship)
 * @method static bool shouldVerifyGroupThreadFriendship()
 * @method static \RTippin\Messenger\Messenger setVerifyGroupThreadFriendship(bool $verifyGroupThreadFriendship)
 * @method static bool isSystemMessagesEnabled()
 * @method static \RTippin\Messenger\Messenger setSystemMessages(bool $systemMessages)
 * @method static \RTippin\Messenger\Messenger setThreadInvites(bool $invites)
 * @method static bool isThreadInvitesEnabled()
 * @method static \RTippin\Messenger\Messenger setThreadInvitesMaxCount(int $maxInviteCount)
 * @method static int getThreadMaxInvitesCount()
 * @method static bool isMessageEditsEnabled()
 * @method static \RTippin\Messenger\Messenger setMessageEdits(bool $messageEdits)
 * @method static bool isMessageEditsViewEnabled()
 * @method static \RTippin\Messenger\Messenger setMessageEditsView(bool $messageEditsView)
 * @method static \RTippin\Messenger\Messenger setMessageReactions(bool $messageReactions)
 * @method static bool isMessageReactionsEnabled()
 * @method static int getMessageReactionsMax()
 * @method static \RTippin\Messenger\Messenger setMessageReactionsMax(int $messageReactionsMax)
 * @method static bool isMessageImageUploadEnabled()
 * @method static \RTippin\Messenger\Messenger setMessageImageUpload(bool $messageImageUpload)
 * @method static bool isProviderAvatarEnabled()
 * @method static \RTippin\Messenger\Messenger setProviderAvatars(bool $providerAvatars)
 * @method static bool isThreadAvatarEnabled()
 * @method static \RTippin\Messenger\Messenger setThreadAvatars(bool $threadAvatars)
 * @method static bool isBotAvatarEnabled()
 * @method static \RTippin\Messenger\Messenger setBotAvatars(bool $botAvatars)
 * @method static bool isMessageDocumentUploadEnabled()
 * @method static \RTippin\Messenger\Messenger setMessageDocumentUpload(bool $messageDocumentUpload)
 * @method static bool isOnlineStatusEnabled()
 * @method static \RTippin\Messenger\Messenger setOnlineStatus(bool $onlineStatus)
 * @method static int getOnlineCacheLifetime()
 * @method static \RTippin\Messenger\Messenger setOnlineCacheLifetime(int $onlineCacheLifetime)
 * @method static int getThreadsIndexCount()
 * @method static \RTippin\Messenger\Messenger setThreadsIndexCount(int $threadsIndexCount)
 * @method static int getSearchPageCount()
 * @method static \RTippin\Messenger\Messenger setSearchPageCount(int $searchPageCount)
 * @method static int getThreadsPageCount()
 * @method static \RTippin\Messenger\Messenger setThreadsPageCount(int $threadsPageCount)
 * @method static int getParticipantsIndexCount()
 * @method static \RTippin\Messenger\Messenger setParticipantsIndexCount(int $participantsIndexCount)
 * @method static int getParticipantsPageCount()
 * @method static \RTippin\Messenger\Messenger setParticipantsPageCount(int $participantsPageCount)
 * @method static int getMessagesIndexCount()
 * @method static \RTippin\Messenger\Messenger setMessagesIndexCount(int $messagesIndexCount)
 * @method static int getMessagesPageCount()
 * @method static \RTippin\Messenger\Messenger setMessagesPageCount(int $messagesPageCount)
 * @method static int getCallsIndexCount()
 * @method static \RTippin\Messenger\Messenger setCallsIndexCount(int $callsIndexCount)
 * @method static int getCallsPageCount()
 * @method static \RTippin\Messenger\Messenger setCallsPageCount(int $callsPageCount)
 * @method static array|string getAvatarStorage(string $config = null)
 * @method static array|string getThreadStorage(string $config = null)
 * @method static bool isPushNotificationsEnabled()
 * @method static \RTippin\Messenger\Messenger setPushNotifications(bool $pushNotifications)
 * @method static void setProviderToOnline($provider = null)
 * @method static void setProviderToOffline($provider = null)
 * @method static void setProviderToAway($provider = null)
 * @method static bool isProviderOnline($provider = null)
 * @method static bool isProviderAway($provider = null)
 * @method static int getProviderOnlineStatus($provider = null)
 * @method static \RTippin\Messenger\Models\Messenger|null getProviderMessenger($provider = null)
 * @method static string|null getProviderAlias()
 * @method static bool providerHasFriends()
 * @method static bool providerHasDevices()
 * @method static bool canMessageProviderFirst($provider = null)
 * @method static bool canFriendProvider($provider = null)
 * @method static bool canSearchProvider($provider = null)
 * @method static GhostUser getGhostProvider()
 * @method static GhostUser getGhostBot()
 * @method static Participant getGhostParticipant(string $threadId)
 * @method static array getSearchableForCurrentProvider()
 * @method static string getApiEndpoint()
 * @method static bool isChannelRoutesEnabled()
 * @method static string|null getProviderDefaultAvatarPath(string $alias)
 * @method static string getDefaultThreadAvatar()
 * @method static string getDefaultNotFoundImage()
 * @method static string getDefaultGhostAvatar()
 * @method static string getDefaultBotAvatar()
 * @method static void reset()
 * @method static void registerProviders(array $providers, bool $overwrite = false)
 * @method static array getMessengerProviders()
 * @method static \RTippin\Messenger\Messenger getInstance()
 * @method static void flush()
 * @method static int getApiRateLimit()
 * @method static \RTippin\Messenger\Messenger setApiRateLimit(int $apiRateLimit)
 * @method static int getSearchRateLimit()
 * @method static \RTippin\Messenger\Messenger setSearchRateLimit(int $searchRateLimit)
 * @method static int getMessageRateLimit()
 * @method static \RTippin\Messenger\Messenger setMessageRateLimit(int $messageRateLimit)
 * @method static int getAttachmentRateLimit()
 * @method static \RTippin\Messenger\Messenger setAttachmentRateLimit(int $attachmentRateLimit)
 * @method static \RTippin\Messenger\Messenger setBroadcastDriver(string $driver)
 * @method static \RTippin\Messenger\Messenger setVideoDriver(string $driver)
 * @method static \RTippin\Messenger\Messenger setFriendDriver(string $driver)
 * @method static int getMessageImageSizeLimit()
 * @method static \RTippin\Messenger\Messenger setMessageImageSizeLimit(int $messageImageSizeLimit)
 * @method static int getMessageDocumentSizeLimit()
 * @method static \RTippin\Messenger\Messenger setMessageDocumentSizeLimit(int $messageDocumentSizeLimit)
 * @method static int getAvatarSizeLimit()
 * @method static \RTippin\Messenger\Messenger setAvatarSizeLimit(int $avatarSizeLimit)
 * @method static string getAvatarMimeTypes()
 * @method static \RTippin\Messenger\Messenger setAvatarMimeTypes(string $avatarMimeTypes)
 * @method static string getMessageDocumentMimeTypes()
 * @method static \RTippin\Messenger\Messenger setMessageDocumentMimeTypes(string $messageDocumentMimeTypes)
 * @method static string getMessageImageMimeTypes()
 * @method static \RTippin\Messenger\Messenger setMessageImageMimeTypes(string $messageImageMimeTypes)
 * @method static bool isMessageAudioUploadEnabled()
 * @method static \RTippin\Messenger\Messenger setMessageAudioUpload(bool $messageAudioUpload)
 * @method static int getMessageAudioSizeLimit()
 * @method static \RTippin\Messenger\Messenger setMessageAudioSizeLimit(int $messageAudioSizeLimit)
 * @method static string getMessageAudioMimeTypes()
 * @method static \RTippin\Messenger\Messenger setMessageAudioMimeTypes(string $messageAudioMimeTypes)
 * @method static bool isMessageVideoUploadEnabled()
 * @method static \RTippin\Messenger\Messenger setMessageVideoUpload(bool $messageVideoUpload)
 * @method static int getMessageVideoSizeLimit()
 * @method static \RTippin\Messenger\Messenger setMessageVideoSizeLimit(int $messageVideoSizeLimit)
 * @method static string getMessageVideoMimeTypes()
 * @method static \RTippin\Messenger\Messenger setMessageVideoMimeTypes(string $messageVideoMimeTypes)
 * @method static bool|string getBotSubscriber(string $option)
 * @method static bool|string getCallSubscriber(string $option)
 * @method static bool|string getSystemMessageSubscriber(string $option)
 * @method static \RTippin\Messenger\Messenger setBotSubscriber(string $option, $value)
 * @method static \RTippin\Messenger\Messenger setCallSubscriber(string $option, $value)
 * @method static \RTippin\Messenger\Messenger setSystemMessageSubscriber(string $option, $value)
 *
 * @mixin \RTippin\Messenger\Messenger
 *
 * @see \RTippin\Messenger\Messenger
 */
class Messenger extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \RTippin\Messenger\Messenger::class;
    }
}
