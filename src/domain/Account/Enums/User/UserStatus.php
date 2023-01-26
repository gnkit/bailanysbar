<?php

namespace Domain\Account\Enums\User;

enum UserStatus: string
{
    case BAN = 'ban';
    case ACTIVE = 'active';
}
