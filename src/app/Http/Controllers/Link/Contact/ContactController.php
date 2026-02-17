<?php

namespace App\Http\Controllers\Link\Contact;

use App\Http\Controllers\Controller;
use Domain\Account\Models\User;
use Domain\Link\Actions\Category\GetAllParentCategoriesAction;
use Domain\Link\Actions\Contact\DeleteContactAction;
use Domain\Link\Actions\Contact\GetAllContactsPaginationAction;
use Domain\Link\Actions\Contact\GetOwnContactsPaginationAction;
use Domain\Link\Actions\Contact\UpsertContactAction;
use Domain\Link\DataTransferObjects\ContactData;
use Domain\Link\Models\Contact;
use Domain\Link\Services\Image\ImageUploadContactService;
use Domain\Link\Services\Notification\NotificationContactService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(
        private readonly NotificationContactService $notificationContactService,
        private readonly ImageUploadContactService $imageUploadContactService
    ) {}

    public function index(Request $request): View
    {
        $rows = 25;

        /** @var User $user */
        $user = $request->user();

        if ($user->isManager()) {
            $contacts = GetAllContactsPaginationAction::execute($rows);
        } else {
            $contacts = GetOwnContactsPaginationAction::execute($rows);
        }

        return view('pages.contact.index', compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    public function create(): View
    {
        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.contact.create', compact('categories'));
    }

    public function store(ContactData $data, Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        if (! $user->isCanPublishContact()) {
            return redirect()->route('contacts.index')->with('error', __('messages.cannot_create_contact.'))->withInput();
        }
        $contact = UpsertContactAction::execute($data, $user);
        $this->notificationContactService->sendNotificationContactCreatedToManager($contact);

        return redirect()->route('contacts.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    public function show(Contact $contact): View|RedirectResponse
    {
        if ($this->notificationContactService->readNotificationContact($contact)) {

            return redirect()->refresh()->with('success', __('messages.contact_read_notice'));
        }

        return view('pages.contact.show', compact('contact'));
    }

    public function edit(Contact $contact): View|RedirectResponse
    {
        $this->authorize('update', $contact);

        if ($this->notificationContactService->readNotificationContact($contact)) {

            return redirect()->refresh()->with('success', __('messages.contact_read_notice'));
        }

        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.contact.edit', compact('categories', 'contact'));
    }

    public function update(ContactData $data, Request $request, Contact $contact): RedirectResponse
    {
        $this->authorize('update', $contact);

        /** @var User $user */
        $user = $request->user();
        $updatedContact = UpsertContactAction::execute($data, $user);

        $this->notificationContactService->sendNotificationContactUpdatedToManager($updatedContact);

        return redirect()->route('contacts.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $this->authorize('delete', $contact);

        DeleteContactAction::execute($contact);
        $this->imageUploadContactService->destroy($contact);

        return redirect()->route('contacts.index')->with('success', __('messages.deleted_successfully'));
    }
}
