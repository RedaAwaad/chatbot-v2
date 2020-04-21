<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AnswersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AnswersDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(AnswersDataTable $dataTable)
    {
        return $dataTable->render('backend.answers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.answers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnswerRequest $request)
    {
        Answer::create([
            'text' => $request->text,
            'text_ar' => $request->text_ar,
            'user_id' => Auth::user()->id,
        ]);
        $notification = array(
            'message' => __('backend/notify.store_answer_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.store_answer'),
        );
        return redirect()->route('answers.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = Answer::withTrashed()->find($id);
        return view('backend.answers.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::withoutTrashed()->find($id);
        return view('backend.answers.update', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerRequest $request, $id)
    {
        $answer = Answer::withoutTrashed()->find($id);
        $answer->update([
            'text' => $request->text,
            'text_ar' => $request->text_ar,
            'user_id' => Auth::user()->id,

        ]);
        $notification = array(
            'message' => __('backend/notify.update_answer_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.update_answer'),
        );
        return redirect()->route('answers.index')->with($notification);
    }

    public function restore($id)
    {
        $answer = Answer::onlyTrashed()->find($id);
        $answer->restore();
        $notification = array(
            'message' => __('backend/notify.restore_user_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.restore_user'),
        );
        return redirect()->route('answers.index')->with($notification);
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
        $answer = Answer::withTrashed()->find($id);
        if ($answer->trashed()) {
            $answer->forceDelete();
            $notification = array(
                'message' => __('backend/notify.delete_answer_successfully'),
                'alert-type' => 'success',
                'title'      => __('notify.delete_answer'),
            );
            return redirect()->route('answers.index')->with($notification);
        } else {
            $answer->delete();
            $notification = array(
                    'message' => __('backend/notify.deleteanswer_successfully'),
                    'alert-type' => 'success',
                    'title'      => __('notify.delete_answer'),
                );
            return redirect()->route('answers.index')->with($notification);
        }
    }
}
