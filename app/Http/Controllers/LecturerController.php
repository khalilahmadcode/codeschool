<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturer; 

class LecturerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']] );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::orderBy('firstName', 'asc')->get();
        return view('lecturers.index')->with('lecturers', $lecturers); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturers.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName'=>'required', 
            'lastName'=>'required', 
            'nickName'=>'required', 
            'title'=>'required', 
            'email'=>'required', 
            'accessno'=>'required', 
            'about'=>'required'
        ]);

        $addLecturer = new Lecturer; 
        $addLecturer->firstName = $request->input('firstName'); 
        $addLecturer->lastName = $request->input('lastName'); 
        $addLecturer->nickName = $request->input('nickName'); 
        $addLecturer->title = $request->input('title'); 
        $addLecturer->email = $request->input('email');  
        $addLecturer->accessno = $request->input('accessno'); 
        $addLecturer->about = $request->input('about');  
        $addLecturer->save(); 

        return redirect('lecturers')->with('success', 'New lectuer added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturer = Lecturer::find($id); 
        $courses = Lecturer::where('lecturers.id', $id)
        ->join('courses', 'lecturers.id', '=', 'courses.lecturer_id')
        ->select('courses.courseName', 'courses.id as course_id')
        ->get(); 
        return view('lecturers.show')->with(['lecturer'=>$lecturer, 'courses'=>$courses]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::find($id); 
        return view('lecturers.edit')->with('lecturer', $lecturer); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lecturerData = $request->validate([
            'firstName'=>'required', 
            'lastName'=>'required', 
            'nickName'=>'required', 
            'title'=>'required', 
            'email'=>'required', 
            'accessno'=>'required', 
            'about'=>'required'
        ]);

        Lecturer::whereId($id)->update($lecturerData);
        return redirect('lecturers/'.$id)->with('success', 'Lecturer details successfully update.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecture = Lecturer::find($id);
        $lecture->delete();
        return redirect('lecturers')->with('success', 'Lecturer record is successfully removed.'); 
    }
}
