<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|max:255',
            'description' => 'max:300',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('Boolfolio@gmail.com')->send(new ContactEmail($new_lead));

        return response()->json([
            'succes' => true
        ]);
    }
}
