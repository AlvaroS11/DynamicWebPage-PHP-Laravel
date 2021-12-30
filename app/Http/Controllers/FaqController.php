<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //

    public function getfaqs(){
       
       
        return view('faq', ['faqs' => Faq::all()]);

       
    }

    public function edit(Faq $faq){
        return view('edit-questions', ['faq' => Faq::all()]);
    }

    public function update(Faq $faq, Request $request){
       
        
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
       
        $faq->update($data);
        return back()->with('message', 'FAQ Updated successfully');;
    }
}
