<?php

namespace Domain\Link\DataTransferObjects;

use App\Rules\Base64Image;
use Domain\Account\Models\User;
use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Link\Models\Category;
use Domain\Link\Models\Contact;
use Domain\Link\Services\Image\ImageUploadContactService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;

final class ContactData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $title,
        public readonly ?string $name,
        public readonly ?string $description,
        public readonly ?string $address,
        public readonly string $phone,
        public readonly ?string $instagram,
        public readonly ?string $telegram,
        public readonly ?string $whatsapp,
        public readonly ?string $site,
        #[Enum(ContactStatus::class)]
        public readonly ContactStatus $status,
        #[Exists(User::class)]
        public readonly ?int $user_id,
        #[Exists(Category::class)]
        public readonly int $category_id,
        public readonly string $image,
    ) {}

    /** @return array<string, array<int, mixed>> */
    public static function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('contacts', 'title')->ignore(request('contact'))],
            'name' => ['nullable', 'sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'sometimes', 'string', 'max:4096'],
            'address' => ['nullable', 'sometimes', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^\+?77(\d{9})$/', 'max:12'],
            'instagram' => ['nullable', 'sometimes', 'string', 'regex:/^[a-zA-Z0-9._]+$/', 'max:255'],
            'telegram' => ['nullable', 'sometimes', 'string', 'regex:/^[a-zA-Z0-9._]+$/', 'max:255'],
            'whatsapp' => ['nullable', 'sometimes', 'string', 'regex:/^[a-zA-Z0-9._]+$/', 'max:255'],
            'site' => ['nullable', 'sometimes', 'string', 'active_url', 'max:255'],
            'status' => ['sometimes', new Enum(ContactStatus::class)],
            'user_id' => ['sometimes'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['sometimes', 'nullable', new Base64Image],
        ];
    }

    /**
     * @param  mixed  ...$args
     * @return array<string, string>
     */
    public static function attributes(...$args): array
    {
        return [
            'title' => __('messages.title'),
            'phone' => __('messages.phone'),
            'category_id' => __('messages.category'),
        ];
    }

    public static function fromRequest(Request $request): self
    {
        $contact = Contact::where('id', $request->contact)->first();

        return self::from([
            'id' => $request->contact->id ?? null,
            'title' => $request->title,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'instagram' => $request->instagram,
            'telegram' => $request->telegram,
            'whatsapp' => $request->whatsapp,
            'site' => $request->site,
            'status' => $request->status,
            'user_id' => $contact->user->id ?? null,
            'category_id' => $request->category_id,
            'image' => (new ImageUploadContactService)->upload($request, $contact),
        ]);
    }
}
