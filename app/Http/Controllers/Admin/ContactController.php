<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function view()
    {
        $data = Contact::orderby('id','desc')->get();
        return view('vendor.backpack.base.contact.list', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = Contact::find($id);
        return view('vendor.backpack.base.contact.detail', ['data' => $data]);
    }

    public function delete($id, Request $request)
    {
        $table = Contact::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('contact_view');
    }
}
