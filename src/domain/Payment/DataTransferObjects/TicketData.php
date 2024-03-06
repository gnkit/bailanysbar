<?php

namespace Domain\Payment\DataTransferObjects;

use Domain\Payment\Enums\Ticket\TicketLimit;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

final class TicketData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?int $user_id,
        public readonly int $limit,
    ) {
    }

    public static function rules(): array
    {
        return [
            'user_id' => ['nullable', 'numeric', 'exists:users,id'],
            'limit' => ['required', 'numeric', 'min:1', 'max:5'],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            'limit' => __('messages.limit'),
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->ticket ?? null,
            'user_id' => $request->user_id,
            'limit' => $request->limit ?? TicketLimit::DEFAULT->value,
        ]);
    }
}
