## Please visit our [API-Explorer](https://tippindev.com/api-explorer) for the most up to date data.

### GET `/api/messenger/threads/{thread}/messages` | *api.messenger.threads.messages.index*
#### Response:
```json
{
    "data": [
        {
            "id": "923151bb-d14c-4f6a-986e-6aa017fbc9fa",
            "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
            "owner_id": "922f8476-c5f4-4024-8ba2-1a0d1cd22d71",
            "owner_type": "App\\Models\\User",
            "owner": {
                "name": "Jane Doe",
                "route": null,
                "provider_id": "922f8476-c5f4-4024-8ba2-1a0d1cd22d71",
                "provider_alias": "user",
                "base": {
                    "id": "922f8476-c5f4-4024-8ba2-1a0d1cd22d71",
                    "name": "Jane Doe",
                    "avatar": null,
                    "created_at": "2020-12-07T07:57:14.000000Z",
                    "updated_at": "2020-12-08T05:27:53.000000Z"
                },
                "avatar": {
                    "sm": "/messenger/assets/provider/user/922f8476-c5f4-4024-8ba2-1a0d1cd22d71/sm/default.png",
                    "md": "/messenger/assets/provider/user/922f8476-c5f4-4024-8ba2-1a0d1cd22d71/md/default.png",
                    "lg": "/messenger/assets/provider/user/922f8476-c5f4-4024-8ba2-1a0d1cd22d71/lg/default.png"
                }
            },
            "type": 1,
            "type_verbose": "IMAGE_MESSAGE",
            "system_message": false,
            "body": "img_5fcf0ea71dcb17.99881745.jpg",
            "edited": false,
            "embeds": true,
            "extra": null,
            "reacted": false,
            "created_at": "2020-12-08T05:27:03.000000Z",
            "updated_at": "2020-12-08T05:27:03.000000Z",
            "meta": {
                "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
                "thread_type": 1,
                "thread_type_verbose": "PRIVATE"
            },
            "image": {
                "sm": "/messenger/assets/threads/923135d4-bcaa-4aa7-83a9-cc9765866b19/gallery/923151bb-d14c-4f6a-986e-6aa017fbc9fa/sm/img_5fcf0ea71dcb17.99881745.jpg",
                "md": "/messenger/assets/threads/923135d4-bcaa-4aa7-83a9-cc9765866b19/gallery/923151bb-d14c-4f6a-986e-6aa017fbc9fa/md/img_5fcf0ea71dcb17.99881745.jpg",
                "lg": "/messenger/assets/threads/923135d4-bcaa-4aa7-83a9-cc9765866b19/gallery/923151bb-d14c-4f6a-986e-6aa017fbc9fa/lg/img_5fcf0ea71dcb17.99881745.jpg"
            }
        },
        {
            "id": "923135d4-c478-46aa-aed3-7013d9609e1d",
            "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
            "owner_id": "922f8476-bdda-4ebd-b283-be23602c658d",
            "owner_type": "App\\Models\\User",
            "owner": {
                "name": "John Doe",
                "route": null,
                "provider_id": "922f8476-bdda-4ebd-b283-be23602c658d",
                "provider_alias": "user",
                "base": {
                    "id": "922f8476-bdda-4ebd-b283-be23602c658d",
                    "name": "John Doe",
                    "avatar": "img_5fcee7c1e64404.55920965.jpg",
                    "created_at": "2020-12-07T07:57:14.000000Z",
                    "updated_at": "2020-12-08T05:27:07.000000Z"
                },
                "avatar": {
                    "sm": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/sm/img_5fcee7c1e64404.55920965.jpg",
                    "md": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/md/img_5fcee7c1e64404.55920965.jpg",
                    "lg": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/lg/img_5fcee7c1e64404.55920965.jpg"
                }
            },
            "type": 0,
            "type_verbose": "MESSAGE",
            "system_message": false,
            "body": "Hello!",
            "edited": false,
            "embeds": true,
            "extra": null,
            "reacted": false,
            "created_at": "2020-12-08T04:09:01.000000Z",
            "updated_at": "2020-12-08T04:09:01.000000Z",
            "meta": {
                "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
                "thread_type": 1,
                "thread_type_verbose": "PRIVATE"
            }
        }
    ],
    "meta": {
        "index": true,
        "page_id": null,
        "next_page_id": null,
        "next_page_route": null,
        "final_page": true,
        "per_page": 50,
        "results": 2,
        "total": 2
    }
}
```
---
### GET `/api/messenger/threads/{thread}/messages/{message}` | *api.messenger.threads.messages.show*
#### Response:
```json
{
  "id": "923135d4-c478-46aa-aed3-7013d9609e1d",
  "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
  "owner_id": "922f8476-bdda-4ebd-b283-be23602c658d",
  "owner_type": "App\\Models\\User",
  "owner": {
    "name": "John Doe",
    "route": null,
    "provider_id": "922f8476-bdda-4ebd-b283-be23602c658d",
    "provider_alias": "user",
    "base": {
      "id": "922f8476-bdda-4ebd-b283-be23602c658d",
      "name": "John Doe",
      "avatar": "img_5fcee7c1e64404.55920965.jpg",
      "created_at": "2020-12-07T07:57:14.000000Z",
      "updated_at": "2020-12-08T05:31:08.000000Z"
    },
    "avatar": {
      "sm": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/sm/img_5fcee7c1e64404.55920965.jpg",
      "md": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/md/img_5fcee7c1e64404.55920965.jpg",
      "lg": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/lg/img_5fcee7c1e64404.55920965.jpg"
    }
  },
  "type": 0,
  "type_verbose": "MESSAGE",
  "system_message": false,
  "body": "Hello!",
  "edited": false,
  "embeds": true,
  "extra": null,
  "reacted": false,
  "created_at": "2020-12-08T04:09:01.000000Z",
  "updated_at": "2020-12-08T04:09:01.000000Z",
  "meta": {
    "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
    "thread_type": 1,
    "thread_type_verbose": "PRIVATE"
  }
}
```
---
### GET `/api/messenger/threads/{thread}/messages/{message}/history` | *api.messenger.threads.messages.history*
#### Response:
```json
[
  {
    "body": "yes",
    "edited_at": "2021-02-07T07:02:05.000000Z"
  },
  {
    "body": "yes edited",
    "edited_at": "2021-02-07T07:02:15.000000Z"
  }
]
```
---
### POST `/api/messenger/threads/{thread}/messages` | *api.messenger.threads.messages.store*
#### Payload:
```json
{
  "message" : "Testing :100:",
  "temporary_id" : "34e70b00-3917-11eb-985e-e58d0602db52",
  "reply_to_id" : "nullable|string",
  "extra" : "nullable|array|json"
}
```
#### Response:
```json
{
  "id": "923154d1-217f-42a4-aa2c-ba41b330a9e0",
  "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
  "owner_id": "922f8476-bdda-4ebd-b283-be23602c658d",
  "owner_type": "App\\Models\\User",
  "owner": {
    "name": "John Doe",
    "route": null,
    "provider_id": "922f8476-bdda-4ebd-b283-be23602c658d",
    "provider_alias": "user",
    "base": {
      "id": "922f8476-bdda-4ebd-b283-be23602c658d",
      "name": "John Doe",
      "avatar": "img_5fcee7c1e64404.55920965.jpg",
      "created_at": "2020-12-07T07:57:14.000000Z",
      "updated_at": "2020-12-08T05:35:08.000000Z"
    },
    "avatar": {
      "sm": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/sm/img_5fcee7c1e64404.55920965.jpg",
      "md": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/md/img_5fcee7c1e64404.55920965.jpg",
      "lg": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/lg/img_5fcee7c1e64404.55920965.jpg"
    }
  },
  "type": 0,
  "type_verbose": "MESSAGE",
  "system_message": false,
  "body": "Testing :100:",
  "edited": false,
  "embeds": true,
  "extra": null,
  "reacted": false,
  "created_at": "2020-12-08T05:35:40.000000Z",
  "updated_at": "2020-12-08T05:35:40.000000Z",
  "meta": {
    "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
    "thread_type": 1,
    "thread_type_verbose": "PRIVATE"
  },
  "temporary_id": "34e70b00-3917-11eb-985e-e58d0602db52"
}
```
---
### PUT `/api/messenger/threads/{thread}/messages/{message}` | *api.messenger.threads.messages.update*
#### Payload:
```json
{
  "message" : "Edited Message",
}
```
#### Response:
```json
{
  "id": "923154d1-217f-42a4-aa2c-ba41b330a9e0",
  "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
  "owner_id": "922f8476-bdda-4ebd-b283-be23602c658d",
  "owner_type": "App\\Models\\User",
  "owner": {
    "name": "John Doe",
    "route": null,
    "provider_id": "922f8476-bdda-4ebd-b283-be23602c658d",
    "provider_alias": "user",
    "base": {
      "id": "922f8476-bdda-4ebd-b283-be23602c658d",
      "name": "John Doe",
      "avatar": "img_5fcee7c1e64404.55920965.jpg",
      "created_at": "2020-12-07T07:57:14.000000Z",
      "updated_at": "2020-12-08T05:35:08.000000Z"
    },
    "avatar": {
      "sm": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/sm/img_5fcee7c1e64404.55920965.jpg",
      "md": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/md/img_5fcee7c1e64404.55920965.jpg",
      "lg": "/messenger/assets/provider/user/922f8476-bdda-4ebd-b283-be23602c658d/lg/img_5fcee7c1e64404.55920965.jpg"
    }
  },
  "type": 0,
  "type_verbose": "MESSAGE",
  "system_message": false,
  "body": "Edited Message",
  "edited": true,
  "embeds": true,
  "extra": null,
  "reacted": false,
  "created_at": "2020-12-08T05:35:40.000000Z",
  "updated_at": "2020-12-08T05:35:40.000000Z",
  "meta": {
    "thread_id": "923135d4-bcaa-4aa7-83a9-cc9765866b19",
    "thread_type": 1,
    "thread_type_verbose": "PRIVATE"
  },
  "temporary_id": "34e70b00-3917-11eb-985e-e58d0602db52"
}
```
---
### DELETE `/api/messenger/threads/{thread}/messages/{message}` | *api.messenger.threads.messages.destroy*
#### Response:
```json
{
  "message": "success"
}
```
---
### DELETE `/api/messenger/threads/{thread}/messages/{message}/embeds` | *api.messenger.threads.messages.embeds.destroy*
#### Response:
```json
{
  "message": "success"
}
```