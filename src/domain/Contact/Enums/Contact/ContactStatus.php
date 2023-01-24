<?php

namespace Domain\Contact\Enums\Contact;


enum ContactStatus: string
{
	case DRAFT = 'draft';
	case PENDING = 'pending';
	case PUBLISHED = 'published';
}
