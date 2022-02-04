<?php

namespace App\Http\Controllers;

use App\Mail\SendSubmittedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\UserData;

class SimpleTestController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // return 
        return view('test');
    }

    /**
     * @return void
     */

    public function read()
    {
        $data = UserData::all();
        return response()->json([
            'status' => 200,
            'datas' => $data
        ]);
    }

    public function store(Request $request)
    {
        // Handle the data here
        $data = new UserData();
        $data->name = $request->name;
        $data->color = $request->color;
        $data->save();
    }

    public function delete($id)
    {
        $data = UserData::where('id', $id)->first();
        $data->delete();
    }

    public function reademail()
    {
        $submittedData = UserData::all();
        
        Mail::send('emails.submitted', compact('submittedData'), function($message){
            $message->to('kanishk17kumar@gmail.com', 'TestMail')->subject('Submitted data');
        });
        return view('emails.submitted', compact('submittedData'));
    }
}
