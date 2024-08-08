<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact\Contact;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('contacts.show');
        $contacts = Contact::all()->sortByDesc('created_at');

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * @param Contact $contact
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Contact $contact): View
    {
        $this->authorize('contacts.edit');

        return view('admin.contacts.edit', compact('contact'));
    }
}
