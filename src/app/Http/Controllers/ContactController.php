<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {

        $contact = $request->only(['name', 'email' . 'tel', 'content']);
        Contact::create($contact);

        if ($request->input('back') == 'back') {
            return redirect('/')
                ->withInput();
        }
        return view('thanks');
    }

    public function find()
    {
        return view('admin');
    }

    public function search()
    {
    }
}
