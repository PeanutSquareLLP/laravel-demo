<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('Subject.index');
    }
    public function fetchSubjectData(){
        $subject=Subject::get();
        return $subject;
    }
    public function create()
    {
        $data = [
            'scope' => 'create'
        ];
        return view('Subject.subject')->with($data);
    }

    public function store(Request $request)
    {
        $subject = Subject::create([
            'name' => $request->name
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'subject save successfully',
        ]);
    }
}
