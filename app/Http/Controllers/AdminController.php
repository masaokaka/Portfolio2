<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(){
        $title = 'シンプルな掲示板';
        $messages = \App\Message::all();
        return view('messages.index',[
            'title' => $title,
            'messages' => $messages,
        ]);

    }
    
    public function create(Request $request){
        //バリデーション
        $request ->validate([
            //'name' => 'required|max:20',
            'body' => 'required|max:100',
            'image' => [
                'file',
                'image',
                'mimes:jpeg,png',
                'dimensions:min_width=100,min_height=100,max_width=600,max_height=600',
            ],
        ]);

        $filename ='';
        $image = $request->file('image');
        if(isset($image)===true){
            $ext = $image->guessExtension();
            $filename = str_random(20) . "{$ext}";
            $path = $image->storeAs('photos', $filename, 'public');
        }
        $message = new \App\Message;
        $message->name = \Auth::user()->name;
        $message->body = $request->body;
        $message->image = $filename;
        $message->save();
        return redirect('/messages');

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
