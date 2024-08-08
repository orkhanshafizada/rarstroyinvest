<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('front.contact.contact');
    }

    /**
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);

        return redirect()->route('contact.index')
                         ->with('message', __('Thank you! We will contact you'))
                         ->with('message-alert', 'success');
    }
}
