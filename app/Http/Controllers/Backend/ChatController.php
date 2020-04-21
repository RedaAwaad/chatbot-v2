<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerQRequest;
use App\Http\Requests\ChatRequest;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\UpdateChatReques;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::where('user_id', Auth::user()->id)->get();
        return view('backend.chats.index', compact('chats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChatRequest $request)
    {
        cache()->forget('chat_data');
        if ($request->image) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            $path = '/upload/chats/' . $imageName;
            request()->image->move(base_path('upload/chats'), $imageName);
        }
        $chat = Chat::create([
            'name' => $request->name,
            'subhead' => $request->subhead,
            'desc' => $request->desc,
            'image' => $path,
            'user_id' => Auth::user()->id
        ]);
        DB::table('errors')->insert([
            'message'=>$request->error_message,
            'error_id'=> 1,
            'user_id'=> auth()->user()->id,
            'chat_id'=>$chat->id
        ]);
        notify()->success('Your new chatbot created', 'Store Successfully');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, $id)
    {
        cache()->forget('chat_data');
        $chat = Chat::find($id);
        $path = $request->oldlogo;
        if ($request->image) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            $path = '/upload/chats/' . $imageName;
            request()->image->move(base_path('upload/chats'), $imageName);
        }
        $chat->update([
            'name' => $request->name,
            'subhead' => $request->subhead,
            'desc' => $request->desc,
            'image' => $path,
            'user_id' => Auth::user()->id
        ]);
        $error = DB::table('errors')->where('chat_id',$chat->id)->first();
        if($error){
            DB::table('errors')->where('chat_id',$chat->id)->update(array(
                'message'=>$request->error_message,
            ));
        }else{
            DB::table('errors')->insert([
                'message'=>$request->error_message,
                'error_id'=> 1,
                'user_id'=> auth()->user()->id,
                'chat_id'=>$chat->id
            ]);
        }
        notify()->success('Your  chatbot Updated', 'Update Successfully');
        return redirect()->route('chats.index');
    }

    public function build($id)
    {

        $chat = Chat::with('questions','user')->find($id);
        $chat->updated_at = now();
        $chat->save();
        if ($chat->user_id != auth()->user()->id) {
            return redirect()->to('/');
        }
        return view('backend.chats.build', compact('chat'));
    }

    public function entry_question(Request $request)
    {
        if($request->status){
            $question = Question::with('answers')->where('chat_id', $request->chat)->where('is_entry_point', '1')->first();
            $answers = [];
            foreach ($question->answers as $answer) {
                array_push($answers, [
                    "an_text"          =>($request->lang =="ar")? $answer->text_ar : $answer->text,
                    "endpoint_message" => "",
                    "id"               => $answer->id,
                    "isendpoint"       => 0
                ]);
            }
            $data = [
                "question" => [
                    ["id" => $question->id,
                        "text" => ($request->lang =="ar")? $question->text_ar : $question->text]
                ],
                "avilable_options" => $answers,
                "meta" => (object)[
                    "answer_type" => null,
                    "flag"        => "normal",
                    "message"     => "",
                    "type"        => "choices"
                ],
            ];
            return $data;
        }
    }
    public function select_next_question(Request $request)
    {
        $next_question = DB::select('SELECT next_question_id as id FROM questions_answers where answer_id ='.$request->a_id);
        if($request->status){
            $all = DB::select('SELECT
                     q.id AS q_id,
                     q.text AS en_question,
                     q.text_ar AS ar_question,
                     qn.answer_id,
                     an.text as en_answer,
                     an.text_ar AS ar_answer,
                     qn.endpoint,
                     qn.as_icon,
                     qn.endpoint_message
                    FROM questions q
                    INNER JOIN questions_answers qn
                    ON q.id = qn.question_id
                    INNER join answers an
                    ON qn.answer_id = an.id
                    WHERE q.id = '.$next_question[0]->id);
            $answers = [];
            foreach ($all as $answer) {
                if($answer->as_icon){
                    array_push($answers, [
                        "an_text"          =>($request->lang =="ar")? $answer->ar_answer : $answer->en_answer,
                        "endpoint_message" => $answer->endpoint_message,
                        "id"               => $answer->answer_id,
                        "isendpoint"       => $answer->endpoint
                    ]);
                }
            }
            $data = [
                "question" => [
                    ["id" => $all[0]->q_id,
                        "text" => ($request->lang =="ar")? $all[0]->ar_question : $all[0]->en_question]
                ],
                "avilable_options" => $answers,
                "meta" => (object)[
                    "answer_type" => null,
                    "flag"        => "normal",
                    "message"     => "",
                    "type"        => "choices"
                ],
            ];
            return $data;
        }
    }
    public function activation($id)
    {
        $chat = Chat::where('id', $id)->first();
        if ($chat->status) {
            $chat->status = 0;
            $chat->save();
        } else {
            $chat->status = 1;
            $chat->save();
        }

        notify()->success('Status of your chatbot changed', 'Change Successfully');
        return redirect()->back();
    }

    public function history($id)
    {
        $data = DB::table('questions')
            ->where('chat_id', $id)
            ->join('chatbot_reactions', 'chatbot_reactions.question_id', 'questions.id')
            ->join('chats', 'chats.id', 'questions.chat_id')
            ->select('questions.text', 'chats.name', 'chatbot_reactions.anser', 'chatbot_reactions.ip', 'chatbot_reactions.created_at')
            ->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.chats.history', compact('data'));
    }

    public function edit($id)
    {
        $chat = Chat::find($id);
        $error = DB::table('errors')->where('chat_id',$chat->id)->first();
        return view('backend.chats.edit', compact('chat','error'));
    }

    public function support($id)
    {
        $chat = Chat::find($id);
        $data = Report::where('chat_id', $id)->get();
        return view('backend.chats.support', compact('chat', 'data'));
    }

    public function statistics($id)
    {
        $chat = Chat::find($id);
        $answers_count = DB::table('chatbot_reactions')->whereIn('question_id', $chat->questions->pluck('id')->toArray())->get()->count();
        $report = DB::table('reports')->where('chat_id', $chat->id)->get()->count();
        if ($chat->questions->count()) {
            $users = DB::table('chatbot_reactions')->where('question_id', $chat->questions->pluck('id')->toArray()[0])->get()->count();
            $sessions = DB::table('chatbot_reactions')->where('question_id', $chat->questions->pluck('id')->toArray()[0])->get()->count();
        } else {
            $sessions = 0;
            $users = 0;
        }
        return view('backend.chats.statistics', compact('chat', 'answers_count', 'sessions', 'users', 'report'));
    }

    public function count_location($array)
    {
        $total = [];
        foreach ($array as $key => $arr) {
            if ($key != "") {
                array_push($total, ['val' => $key, 'count' => $arr->count()]);
            }
        }
        return $total;
    }

    public function resp_stat($id)
    {
        $user = auth()->user();
        $chat = Chat::find($id);
        $user_reactions = DB::table('chatbot_reactions')->where('question_id', $chat->questions->pluck('id')->toArray())->get();
        $report = DB::table('reports')->whereIn('question_id', $chat->questions->pluck('id')->toArray())->get();
        $chat_with_date = [];
        $chat_with_date["chart1"] = [];
        $chat_with_date["chart2"] = [];
        $chat_with_date["chart3"] = [];
        $chat_with_date["chart4"] = [];
        $chat_with_date["chart5"] = [];
        $chat_with_date["chart6"] = [];
        $chat_with_date["chart7"] = [];
        $locations = DB::table('analysis_chat_locations')->where('chat_id', $chat->id)->get();
        $cities = $locations->groupBy('city');
        $city_array = $this->count_location($cities);
        $countries = $locations->groupBy('country');
        $country_array = $this->count_location($countries);
        $states = $locations->groupBy('state');
        $state_array = $this->count_location($states);
        $continents = $locations->groupBy('continent');
        $continent_array = $this->count_location($continents);
        foreach ($city_array as $city) {
            array_push($chat_with_date["chart7"], ['country' => $city['val'], 'visits' => $city['count']]);
        }
        foreach ($country_array as $country) {
            array_push($chat_with_date["chart6"], ['country' => $country['val'], 'visits' => $country['count']]);
        }
        $questions = DB::table('top_questions')->whereIn('q_id', $user->questions->pluck('id')->toArray())->get();
        foreach ($questions as $key => $q) {
            if ($key < 4) {
                array_push($chat_with_date["chart5"], ['country' => $q->q_name, 'litres' => $q->q_count]);
            }
        }
        $chart = $user_reactions->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('Y-m-d');
        });
        $error = $report->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('Y-m-d');
        });
        foreach ($chart as $key => $ur) {
            array_push($chat_with_date["chart1"], ['date' => $key, 'value' => $ur->count()]);
            array_push($chat_with_date["chart2"], ['date' => $key, 'price' => $ur->count()]);
        }
        foreach ($error as $key => $ur) {
            array_push($chat_with_date["chart4"], ['date' => $key, 'value' => $ur->count()]);
        }

        $count = DB::table('chatbot_reactions')->whereIn('question_id', $chat->questions->pluck('id')->toArray())->get()->count();
        array_push($chat_with_date["chart3"], ['country' => $chat->name, 'litres' => $count]);

        return response()->json($chat_with_date);
    }

    public function questions($id)
    {
        $q = [];
        $a = [];
        $order = 'desc';
        $questions = Question::with('answers')
            ->where('chat_id', $id)
            ->orderBy('questions.sort', $order)
            ->get();
        foreach ($questions->sortBy('sort') as $question) {
            foreach ($question->answers as $answer) {
                $a_text = Session::get('locale') == 'en' ? $answer->text : $answer->text_ar ;

                array_push($a, ['title' => '<span class="content"><div id="uploadStatus'.$answer->id.'" style="text-align: center;"></div>' . $a_text . '</span><i class="flaticon2-contract edit-task mx-2" data-label="' . $question->id . '" data-id="' . $answer->id . '"></i><i class="flaticon-circle remove-answer mx-1" data-toggle="modal" data-target="#kt_modal_remove_answer" data-label="' . $question->id . '" data-id="' . $answer->id . '"></i>']);
            }
            $q_text = Session::get('locale') == 'en' ? $question->text : $question->text_ar ;
            array_push($q, ['id' => "_$question->id",'sort'=>$question->sort, 'title' => $q_text, 'item' => $a]);
            $a = [];
        }
        return $q;
    }

    public function url_edit_answers(Request $request)
    {
        $array = [];
        $answer = Answer::find($request->answer_id);
        $answer_question = DB::table('questions_answers')->where('question_id', $request->question_id)->where('answer_id', $request->answer_id)->first();
        if ($request->text) {
            $answer->text = $request->text;
            $answer->user_id = auth()->user()->id;
            $answer->text_ar = $request->text_ar;
            $answer->save();
            DB::table('questions_answers')->where('answer_id', $request->answer_id)->where('question_id', $request->question_id)
                ->update(array(
                    'next_question_id' => str_replace('_', '',$request->next_question_id),
                    'endpoint_message' => $request->endpoint_message,
                    'as_icon' => $request->as_icon,
                    'endpoint' => $request->endpoint,
                    'created_at' => Carbon::now(),
                ));
            DB::delete('delete from faq where answer_id = ?', [$request->answer_id]);
            if ($request->items) {
                foreach (json_decode($request->items) as $fqa) {
                    DB::table('faq')->insert([
                        'Answer_id' => $answer->id,
                        'text' => $fqa->value,
                        'user_id' => Auth::user()->id
                    ]);
                }
            }
            return response()->json("Done");
        }
        $array['items'] = "";
        $i = "";
        $faq = DB::table('faq')->where('answer_id', $request->answer_id)->get();
        if ($faq) {
            foreach ($faq as $f) {
                $array['items'] .= $f->text . ",";
            }
        }
        $array['id'] = 0;
        $array['id'] = $answer->id;
        $array['text'] = 0;
        $array['text'] = $answer->text;
        $array['text_ar'] = 0;
        $array['text_ar'] = $answer->text_ar;
        $array['next_question'] = 0;
        $array['next_question'] = $answer_question->next_question_id;
        $array['as_icon'] = 0;
        $array['as_icon'] = $answer_question->as_icon;
        $array['endpoint'] = 0;
        $array['endpoint'] = $answer_question->endpoint ? "on" : "off";
        $array['endpoint_message'] = 0;
        $array['endpoint_message'] = $answer_question->endpoint_message;
        return response()->json($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_questions(QuestionRequest $request)
    {
        if ($request->is_entry_point) {
            $q = Question::where('user_id', Auth::user()->id)->where('chat_id', $request->chat_id)->where('is_entry_point', 1)->first();
            if ($q) {
                $q->is_entry_point = 0;
                $q->save();
            }
        }

        if ($request->answer_type == "texting") {
            $qu = Question::create([
                'text' =>str_replace("&nbsp;", "", $request->text),
                'num_answer' => 4,
                'user_id' => Auth::user()->id,
                'answer_type' => $request->answer_type,
                'type_id' => $request->type_id,
                'text_ar' => str_replace("&nbsp;", "", $request->text_ar),
                'next_question_id' => $request->next_question_id,
                'is_entry_point' => $request->is_entry_point,
                'chat_id' => $request->chat_id,
            ]);
        } else {
            $qu = Question::create([
                'text' => str_replace("&nbsp;", "", $request->text),
                'num_answer' => 4,
                'user_id' => Auth::user()->id,
                'answer_type' => $request->answer_type,
                'text_ar' => str_replace("&nbsp;", "", $request->text_ar),
                'is_entry_point' => $request->is_entry_point,
                'chat_id' => $request->chat_id,
            ]);
        }

        $notification = array(
            'message' => __('backend/notify.store_question_successfully'),
            'alert-type' => 'success',
            'title' => __('notify.store_question'),
        );
        return response()->json($qu->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_answers(AnswerQRequest $request)
    {
        $answer = Answer::create([
            'text' => str_replace("&nbsp;", "", $request->text),
            'text_ar' => str_replace("&nbsp;", "", $request->text_ar),
            'user_id' => Auth::user()->id,
        ]);

        DB::table('questions_answers')->insert([
            'question_id' => $request->question_id,
            'user_id' => Auth::user()->id,
            'answer_id' => $answer->id,
            'endpoint_message' => $request->endpoint_message,
            'next_question_id' => str_replace('_', '', $request->next_question_id),
            'as_icon' => $request->as_icon,
            'endpoint' => $request->endpoint,
        ]);
        if ($request->fqa) {
            foreach (json_decode($request->fqa) as $fqa) {
                DB::table('faq')->insert([
                    'Answer_id' => $answer->id,
                    'text' => $fqa->value,
                    'user_id' => Auth::user()->id
                ]);
            }
        }
        return response()->json($answer->id);
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
        $chat = Chat::find($id);
        $chat->delete();
        $notification = array(
            'message' => __('backend/notify.delete_chat_successfully'),
            'alert-type' => 'success',
            'title' => __('notify.delete_chat'),
        );
        notify()->success('Your chatbot deleted ', 'Delete Successfully');
        return redirect()->route('chats.index')->with($notification);
    }

    public function edit_question(Request $request)
    {
        $question = Question::where('id', $request->id)->first();

        if ($request->text) {
            $question->update([
                'text' => $request->text,
                'text_ar' => $request->text_ar,
                'answer_type' => $request->answer_type ? $request->answer_type : $question->answer_type,
                'next_question_id' => $request->next_question_id ? $request->next_question_id : $question->next_question_id,
                'type_id' => $request->type_id ? $request->type_id : $question->type_id,
                'is_entry_point' => $request->is_entry_point,
                'chat_id' => $question->chat_id,
                'num_answer' => $question->num_answer,
                'user_id' => $question->user_id,
            ]);
            return response()->json("Done");
        } else {
            return response()->json($question);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function delete_answers(Request $request)
    {
        $answer = DB::table('questions_answers')->where('question_id', $request->question_id)->where('answer_id', $request->answer_id);
        $answer->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function url_delete_question(Request $request)
    {
        $q = Question::find($request->id);
        DB::table('questions_answers')->where('next_question_id', $request->id)->delete();
        $q->delete();
    }
}
