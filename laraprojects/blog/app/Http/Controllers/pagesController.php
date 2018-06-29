<?php
 
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Http\Requests;
 use App\Post;
 use Mail;
 use Session;

 class pagesController extends Controller{

    public function getIndex(){
     $posts = Post::orderBy('created_at','desc')->limit(4)->get();
     return view('pages.welcome')->withPosts($posts);
    }
    
    public function getAbout(){
     $name = 'hari';
     $email = 'abc@abc.com';
     $data = [];
     $data['name']= $name;
     $data['email']= $email;
     return view('pages.about')->withData($data);
    }
    public function getContact(){
     $name = 'hari';
     $email = 'abc@abc.com';
     $data = [];
     $data['name']= $name;
     $data['email']= $email;
     return view('pages.contact')->withData($data);
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('aatish579@hotmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'hurray Its sent ');

        return redirect('/');
    }

 }