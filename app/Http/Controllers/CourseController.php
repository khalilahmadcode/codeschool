<?php

namespace App\Http\Controllers;
use App\Course; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class CourseController extends Controller
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
        $courses = DB::table('courses')
        ->join('lecturers', 'lecturers.id', '=', 'courses.lecturer_id')
        ->select('courses.*', 'lecturers.firstName', 'lecturers.lastName')
        ->get();

        // $lecturers = DB::table('lecturers')->select('lastName', 'firstName', 'id')->get();
        return view('courses.index')->with('courses', $courses); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $lecturer = DB::table('lecturers')->select('id', 'firstName', 'lastName')->get();
        return view('courses.create')->with('lecturers', $lecturer); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request); 
        $this->validate($request, [
            'courseName'=>'required', 
            'courseDescription'=>'required', 
            'courseTime'=>'required', 
            'lecturer_id'=>'required', 
            'courseFee'=>'required'
        ]); 

        $addCourse = new Course; 
        $addCourse->courseName = $request->input('courseName'); 
        $addCourse->courseDescription = $request->input('courseDescription'); 
        $addCourse->courseTime = $request->input('courseTime'); 
        $addCourse->lecturer_id = $request->input('lecturer_id'); 
        $addCourse->courseFee = $request->input('courseFee'); 
        $addCourse->save(); 

        return redirect('courses')->with('success', 'Course added successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('courses.id', $id)
        ->join('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
        ->select('courses.*', 'lecturers.*')
        ->get();
        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturers = DB::table('lecturers')->select('id', 'lastName', 'firstName')->get(); 
        $course = Course::find($id);
        return view('courses.edit')->with(
            [
                'course'=>$course, 
                'lecturers'=>$lecturers
            ]
        );
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
        //dd($request); 
        $updateCourse = $request->validate([
            'courseName'=>'required', 
            'courseDescription'=>'required', 
            'courseTime'=>'required', 
            'courseLecturer'=>'required', 
            'courseFee'=>'required'
        ]); 

        Course::whereId($id)->update($updateCourse ); 

        return redirect('courses/'.$id)->with('success', 'Course updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete(); 
        return redirect('courses')->with('success', 'Course is removed successfully.'); 
    }
}
