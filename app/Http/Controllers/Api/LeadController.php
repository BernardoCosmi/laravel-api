<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;



class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required|email',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors,
            ]);
        }
        $new_lead = new Lead();
        $new_lead = fill($data);
        $new_lead = save();

        Mail::to('info@boolpress.com')->send(new NewContact($new_lead));
    
        return response()->json([
            'success' => true,
        ]);
    }
}
