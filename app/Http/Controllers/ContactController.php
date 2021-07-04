<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index() {
        $users = [];
        foreach (user::all() as $user) {
            $users[$user->id]['name'] = $user->name;
            $users[$user->id]['email'] = $user->email;
        }
        $contacts = [];
        foreach (Contact::orderBy('send_datetime', 'desc')->get() as $contact) {
            $contacts[$contact->id]['name'] = $users[$contact->user_id]['name'];
            $contacts[$contact->id]['email'] = $users[$contact->user_id]['email'];
            $contacts[$contact->id]['content'] = $contact['content'];
            $contacts[$contact->id]['send_datetime'] = date('Y年m月d日 H時i分', strtotime($contact['send_datetime']));
        }

        return view('contact.index', compact('contacts'));
    }

    public function create() {
        return view('contact.create');
    }

    public function store(Request $request) {
        $contact = new Contact();
        $contact->user_id = Auth::user()->id;
        $contact->content = $request->content;
        $contact->send_datetime = date('Y-m-d H:i');
        $contact->save();

        return view('contact.create', ['done' => 1]);
    }


}
