<?php

namespace Askvortsov\FlarumPWA\Api\Controller;

use Flarum\Settings\SettingsRepositoryInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddFirebaseConfigController implements RequestHandlerInterface
{

    public function __construct(private SettingsRepositoryInterface $settings)
    {
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $files = $request->getUploadedFiles();

        /** @var \Laminas\Diactoros\UploadedFile $config */
        $config = $files['file'];

        $this->settings->set(
            'askvortsov-pwa.firebaseConfig',
            $config->getStream()->getContents(),
        );

        return new JsonResponse(["data" => null]);
    }
}
