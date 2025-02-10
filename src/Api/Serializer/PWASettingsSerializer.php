<?php

/*
 * This file is part of askvortsov/flarum-pwa
 *
 *  Copyright (c) 2021 Alexander Skvortsov.
 *
 *  For detailed copyright and license information, please view the
 *  LICENSE file that was distributed with this source code.
 */

namespace Askvortsov\FlarumPWA\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use InvalidArgumentException;

/**
 * @TODO: Remove this in favor of one of the API resource classes that were added.
 *      Or extend an existing API Resource to add this to.
 *      Or use a vanilla RequestHandlerInterface controller.
 *      @link https://docs.flarum.org/2.x/extend/api#endpoints
 */
class PWASettingsSerializer extends AbstractSerializer
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'pwa-settings';

    /**
     * {@inheritdoc}
     *
     * @param array $settings
     *
     * @throws InvalidArgumentException
     */
    protected function getDefaultAttributes($settings): array
    {
        return [
            'manifest' => $settings['manifest'],
            'sizes' => $settings['sizes'],
            'status_messages' => $settings['status_messages'],
        ];
    }

    public function getId(mixed $model): string
    {
        return 'global';
    }
}
