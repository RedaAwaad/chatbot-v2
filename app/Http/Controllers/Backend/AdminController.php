<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $user_reactions = DB::table('chatbot_reactions')->whereIn('question_id', auth()->user()->questions->pluck('id')->toArray())->get();
        $answers_count = $user_reactions->count();
        $report = DB::table('reports')->whereIn('chat_id', auth()->user()->chats->pluck('id')->toArray())->get()->count();
        $users = DB::table('chatbot_reactions')->where('question_id', isset(auth()->user()->questions->pluck('id')->toArray()[0])?auth()->user()->questions->pluck('id')->toArray()[0]:['0'])->get()->count();
        $sessions = $users;
        return view('backend.home', compact('user', 'answers_count', 'sessions', 'users', 'report'));
    }

    public function public_email() {
        $data = ['name'=>'هذه رسالة موجهة من الموقع<br>'.request()->name .'<br>'.request()->email.'<br>'.request()->message];
        Mail::send('mail', $data, function($message) {
            $message->from(request()->email,request()->email);
            $message->to('info@wakeb.tech', 'Wakeb Company')->subject(request()->name);
        });
        Mail::send('mail', $data, function($message) {
            $message->from(request()->email,request()->email);
            $message->to('Ktolba@wakeb.tech', 'Wakeb Company')->subject(request()->name);
        });
        notify()->success('Your request Sent', 'Send Successfully');
        return redirect()->back();

    }

}
