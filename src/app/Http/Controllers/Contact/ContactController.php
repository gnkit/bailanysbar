<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Domain\Contact\Actions\Category\GetAllCategoriesAction;
use Domain\Contact\Actions\Contact\GetAllContactsAction;
use Domain\Contact\Actions\Contact\GetOwnContactsAction;
use Domain\Contact\Actions\Contact\UpsertContactAction;
use Domain\Contact\DataTransferObjects\ContactData;
use Domain\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 3;

        if (Auth::user()->isManager()) {
            $contacts = GetAllContactsAction::execute($rows);
        } else {
            $contacts = GetOwnContactsAction::execute($rows);
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
        $categories = GetAllCategoriesAction::execute();

        return view('pages.contact.create', compact('categories'));
    }

    /**
     * @param ContactData $data
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactData $data, Request $request)
    {
        UpsertContactAction::execute($data, $request->user());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param \Domain\Contact\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Domain\Contact\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Domain\Contact\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Domain\Contact\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
