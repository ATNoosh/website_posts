<?php

namespace App\Constants;

abstract class MailStatuses
{
    const RAW = 'raw';

    const QEUEUED = 'queued';

    const SENT = 'sent';

    public static function toArray(): array
    {
        return [self::RAW, self::QEUEUED, self::SENT];
    }
}
