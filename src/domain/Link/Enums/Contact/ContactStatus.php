<?php

namespace Domain\Link\Enums\Contact;


enum ContactStatus: string
{
    case DRAFT = 'draft';
    case PENDING = 'pending';
    case PUBLISHED = 'published';
    case CANCELLED = 'cancelled';
}
