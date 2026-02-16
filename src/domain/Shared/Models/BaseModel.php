<?php

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory;
}
