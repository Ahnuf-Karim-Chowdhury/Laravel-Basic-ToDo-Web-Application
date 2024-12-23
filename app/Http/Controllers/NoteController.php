<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{   
    public function security(Note $note){
        if($note->user_id != request()->user()->id){
            abort(403);  
        }
    }

    public function index()
    {   
        $notes = Note::query()
        ->where('user_id',request()->user()->id) 
        ->orderBy("created_at","desc")->paginate();
        //dd($notes);
        return view('note.index',['notes'=>$notes]);
    }


    public function create()
    {
        return view('note.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([  'note' => ['required','string']  ]);
        $data['user_id']=$request->user()->id;
        $note = Note::create($data);
        return to_route('note.show',$note)->with('message','Note Was Forged.');
    }


    public function show(Note $note)
    {   
        $this->security($note);
        return view('note.show',['note'=>$note]);
    }


    public function edit(Note $note)
    {   
        $this->security($note);
        return view('note.edit',['note'=>$note]);
    }


    public function update(Request $request, Note $note)
    {   
        $this->security($note);
        $data = $request->validate([  'note' => ['required','string']  ]);
        
        $note -> update($data);
        return to_route('note.show',$note)->with('message','Note Was Updated.');
    }


    public function destroy(Note $note)
    {   
        $this->security($note);
        $note->delete();
        return to_route('note.index',$note)->with('message','Note Was Deleted.');
    }
}
