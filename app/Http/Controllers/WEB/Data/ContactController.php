<?php

namespace App\Http\Controllers\Web\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member\Contact;

class ContactController extends Controller
{
    public function store(Request $request, $id) {
      $request->validate([
        'type' => 'required',
        'field' => 'required'
      ]);

      Contact::create([
        'member_id' => $id,
        'type' => $request->type,
        'field' => $request->field,
      ]);

      return redirect()->back();
    }

    public function destroy(Contact $contact) {
        // return Contact::where('id', $contact->id)->delete();
        $contact->delete();
        return redirect()->back();
    }
}
