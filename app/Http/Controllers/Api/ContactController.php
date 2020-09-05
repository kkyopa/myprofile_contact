<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index(Request $request) {
        $to = $request->input('email');
        $kyopamail = "kkyopa@gmail.com";
        Mail::to($to)->send(new ContactMail(['name' => $request->input('name'), 'email' => $request->input('email'), 'text' => $request->input('text')]));
        Mail::to($kyopamail)->send(new ContactMail(['name' => $request->input('name'), 'email' => $request->input('email'), 'text' => $request->input('text')]));

        return response()->json([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'text' => $request->input('text'),
      ], 200);
      }


      public function test(Request $request) {
        return response()->json([
          'test' => 'test',
          $request->input('name')
      ], 200);
      }
}
