<?php

namespace Askvortsov\FlarumPWA\Api\Controller;

use Askvortsov\FlarumPWA\Api\Serializer\FirebasePushSubscriptionSerializer;
use Askvortsov\FlarumPWA\FirebasePushSubscription;
use Flarum\Http\RequestUtil;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddFirebasePushSubscriptionController implements RequestHandlerInterface
{
    public $serializer = FirebasePushSubscriptionSerializer::class;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $actor = RequestUtil::getActor($request);
        $actor->assertRegistered();

        return FirebasePushSubscription::updateOrCreate([
            'user_id' => $actor->id,
            'token' => Arr::get($request->getParsedBody(), 'token', []),
        ]);
    }
}
