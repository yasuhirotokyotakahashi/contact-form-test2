<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('index', compact('contacts'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        if ($request->input('back') == 'back') {
            return redirect('/')
                ->withInput();
        }
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        Contact::create($contact);

        return view('thanks');
    }

    public function find()
    {
        $contacts = Contact::Paginate(5);

        return view('admin', compact('contacts'));
    }

    public function search(Request $request)
    {

        $contacts =
            Contact::fullNameSearch($request->fullname)->genderSearch($request->gender)->startcreated_atSearch($request->created_at)->endcreated_atSearch($request->created_at)->emailSearch($request->email)->paginate(5);

        return view('admin', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('admin');
    }
}
