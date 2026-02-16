<?php

namespace App\Http\Controllers\Link\Contact;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Category\GetAllParentCategoriesAction;
use Domain\Link\Actions\Contact\DeleteContactAction;
use Domain\Link\Actions\Contact\GetAllContactsPaginationAction;
use Domain\Link\Actions\Contact\GetOwnContactsPaginationAction;
use Domain\Link\Actions\Contact\UpsertContactAction;
use Domain\Link\DataTransferObjects\ContactData;
use Domain\Link\Models\Contact;
use Domain\Link\Services\Image\ImageUploadContactService;
use Domain\Link\Services\Notification\NotificationContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(
        private NotificationContactService $notificationContactService,
        private ImageUploadContactService $imageUploadContactService
    ) {}

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 25;

        if (auth()->user()->isManager()) {
            $contacts = GetAllContactsPaginationAction::execute($rows);
        } else {
            $contacts = GetOwnContactsPaginationAction::execute($rows);
        }

        return view('pages.contact.index', compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.contact.create', compact('categories'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactData $data, Request $request)
    {
        if (! \auth()->user()->isCanPublishContact()) {
            return redirect()->route('contacts.index')->with('error', __('messages.cannot_create_contact.'))->withInput();
        }
        $contact = UpsertContactAction::execute($data, $request->user());
        $this->notificationContactService->sendNotificationContactCreatedToManager($contact);

        return redirect()->route('contacts.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Contact $contact)
    {
        if ($this->notificationContactService->readNotificationContact($contact)) {

            return redirect()->refresh()->with('success', __('messages.contact_read_notice'));
        }

        return view('pages.contact.show', compact('contact'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Contact $contact)
    {
        if ($this->notificationContactService->readNotificationContact($contact)) {

            return redirect()->refresh()->with('success', __('messages.contact_read_notice'));
        }

        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.contact.edit', compact('categories', 'contact'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContactData $data, Request $request)
    {
        $contact = UpsertContactAction::execute($data, $request->user());
        $this->notificationContactService->sendNotificationContactUpdatedToManager($contact);

        return redirect()->route('contacts.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        DeleteContactAction::execute($contact);
        $this->imageUploadContactService->destroy($contact);

        return redirect()->route('contacts.index')->with('success', __('messages.deleted_successfully'));
    }
}
