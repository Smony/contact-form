<?php

namespace Smony\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Smony\Contact\Http\Requests\ContactRequest;
use Smony\Contact\Mail\ContactMailable;
use Smony\Contact\Models\Contact;

/**
 * Class ContactController
 * @package Smony\Contact\Http\Controllers
 */
class ContactController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contact::contact');
    }

    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(ContactRequest $request)
    {
        $attributes = $request->validated();

        if ($attributes) {
            Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));
            Contact::create($attributes);
//            return response()->json(['success' => 'Added new records.']);
            return redirect(route('contact'));
        }
    }
}
