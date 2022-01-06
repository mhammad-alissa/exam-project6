<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $exams = Exam::all();
        // dd($exams);
        // return view("exam.manage_exam", compact("exams"));

        $exams = DB::table('exams')
        ->select('*')

        ->join('categories', 'categories.category_id', '=', 'exams.category_id')
        ->orderByDesc('exams.created_at')
        ->paginate(5);

        return view('exam.manage_exam', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("exam.manage_exam_create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'exam_name'=>'required',
            'exam_description'=>'required'
        ],
        [
            'exam_name.required'=>'هذا الحقل مطلوب',
            'exam_description.required'=>'هذا الحقل مطلوب'
        ]
);
Exam::create([
            'exam_name'=>$request->exam_name,
            'exam_description'=>$request->exam_description,
            'category_id'=>$request->category_id
        ]);
        $exams = Exam::all();
        return view("exam.manage_exam", compact("exams"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam=Exam::where('exam_id',$id)->first();
        return view("exam.manage_exam_edit",compact("exam"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $request->validate([
            'exam_name'=>'required',
            'exam_description'=>'required'
        ]);

        Exam::where('exam_id',$id)->update([
            'exam_name'=>$request->exam_name,
            'exam_description'=>$request->exam_description,
            'category_id'=>$request->category_id

        ]);
        // $categories = Category::all();
        return redirect('admin/manage_exams');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam)
    {
        Exam::where('exam_id',$exam)->delete();

        return redirect('admin/manage_exams')->with('success','تم حذف الصنف بنجاح');
    }


}
