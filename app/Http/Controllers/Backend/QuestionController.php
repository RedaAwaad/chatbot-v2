<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\QuestionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerQRequest;
use App\Http\Requests\QuestionRequest;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param QuestionsDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(QuestionsDataTable $dataTable)
    {
        return $dataTable->render('backend.questions.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function answers($id)
    {
        $questions = Question::where('id', '<>', $id)->where('user_id', Auth::user()->id)->get();
        $answers = Answer::where('user_id', Auth::user()->id)->get();
        return view('backend.questions.answer', compact('questions', 'answers', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $answers_type = DB::table('answers_type')->get();
        $questions = Question::withoutTrashed()->where('user_id', Auth::user()->id)->get();
        return view('backend.questions.create', compact('answers_type', 'questions'));
    }

    public function answer_delete($id)
    {
        DB::table('questions_answers')->delete($id);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        if ($request->is_entry_point) {
            $q = Question::where('user_id', Auth::user()->id)->where('is_entry_point', 1)->first();
            if ($q) {
                $q->is_entry_point = 0;
                $q->save();
            }
        }
        if ($request->answer_type == "texting") {
            Question::create([
            'text' => $request->text,
            'num_answer' => $request->num_answer,
            'user_id' => Auth::user()->id,
            'answer_type' => $request->answer_type,
            'type_id' => $request->type_id,
            'text_ar' => $request->text_ar,
            'next_question_id' => $request->next_question_id,
            'is_entry_point' => $request->is_entry_point,
            ]);
        } else {
            Question::create([
            'text' => $request->text,
            'num_answer' => $request->num_answer,
            'user_id' => Auth::user()->id,
            'answer_type' => $request->answer_type,
            'text_ar' => $request->text_ar,
            'is_entry_point' => $request->is_entry_point,
        ]);
        }

        $notification = array(
            'message' => __('backend/notify.store_question_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.store_question'),
        );
        return redirect()->route('questions.index')->with($notification);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function answer_store(AnswerQRequest $request)
    {
        DB::table('questions_answers')->insert([
            'question_id' => $request->question_id,
            'user_id' => Auth::user()->id,
            'answer_id' => $request->answer_id,
            'endpoint_message' => $request->endpoint_message,
            'next_question_id' => $request->next_question_id,
            'as_icon' => $request->as_icon,
            'endpoint' => $request->endpoint,
        ]);
        $notification = array(
            'message' => __('backend/notify.store_question_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.store_question'),
        );
        return redirect()->route('questions.show', $request->question_id)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::withTrashed()->find($id);
        return view('backend.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::withoutTrashed()->find($id);
        $answers_type = DB::table('answers_type')->get();
        $questions = Question::withoutTrashed()->where('id', '<>', $id)->where('user_id', Auth::user()->id)->get();
        return view('backend.questions.update', compact('answers_type', 'question', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $question = Question::withoutTrashed()->find($id);
        if ($request->is_entry_point) {
            $q = Question::where('user_id', Auth::user()->id)->where('is_entry_point', 1)->first();
            if ($q) {
                $q->is_entry_point = 0;
                $q->save();
            }
        }

        if ($request->answer_type == "texting") {
            $question->update([
                'text' => $request->text,
                'num_answer' => $request->num_answer,
                'user_id' => Auth::user()->id,
                'answer_type' => $request->answer_type,
                'type_id' => $request->type_id,
                'text_ar' => $request->text_ar,
                'next_question_id' => $request->next_question_id,
                'is_entry_point' => $request->is_entry_point,
            ]);
        }else{
                $question->update([
                'text' => $request->text,
                'num_answer' => $request->num_answer,
                'user_id' => Auth::user()->id,
                'answer_type' => $request->answer_type,
                'text_ar' => $request->text_ar,
                'is_entry_point' => $request->is_entry_point,
            ]);
        }
        $notification = array(
            'message' => __('backend/notify.update_question_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.update_question'),
        );
        return redirect()->route('questions.index')->with($notification);
    }

    public function restore($id)
    {
        $question = Question::onlyTrashed()->find($id);
        $question->restore();
        $notification = array(
            'message' => __('backend/notify.restore_user_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.restore_user'),
        );
        return redirect()->route('questions.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        // dd("df");
        $question = Question::withTrashed()->find($id);
        if ($question->trashed()) {
            $question->forceDelete();
            $notification = array(
                'message' => __('backend/notify.delete_question_successfully'),
                'alert-type' => 'success',
                'title'      => __('notify.delete_question'),
            );
            return redirect()->route('questions.index')->with($notification);
        } else {
            if ($id == Auth::user()->id) {
                $notification = array(
                    'message' => __('backend/notify.delete_question_fail_question_is_login'),
                    'alert-type' => 'error',
                    'title'      => __('notify.delete_question'),
                );
                return redirect()->route('questions.index')->with($notification);
            } else {
                $question->delete();
                $notification = array(
                    'message' => __('backend/notify.deletequestion_successfully'),
                    'alert-type' => 'success',
                    'title'      => __('notify.delete_question'),
                );
                return redirect()->route('questions.index')->with($notification);
            }
        }
    }
}
