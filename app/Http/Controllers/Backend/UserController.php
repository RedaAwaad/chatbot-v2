<?php

namespace App\Http\Controllers\Backend;

use App\Chat;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Setting;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UsersDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('backend.users.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param UsersDataTable $dataTable
     * @return \Illuminate\Http\Response
     */

    public function chatbot($slug, $id)
    {
        $chat = Chat::with('user','user.setting')->find($id);
        if ($chat->user->email == "RCH@wakeb.tech") {
            return view('backend.users.rch', compact('chat'));
        } else {
            return view('backend.users.chatbot', compact('chat'));
        }
    }

    public function statistics()
    {
        $user = auth()->user();
        $user_reactions = DB::table('chatbot_reactions')->whereIn('question_id', $user->questions->pluck('id')->toArray())->get();
        $chat_with_date = [];
        $answers_count = $user_reactions->count();
        $report = DB::table('reports')->whereIn('chat_id', $user->chats->pluck('id')->toArray())->get()->count();
        if ($user->questions->count()) {
            $users = DB::table('chatbot_reactions')->where('question_id', $user->questions->pluck('id')->toArray()[0])->get()->count();
            $sessions = DB::table('chatbot_reactions')->where('question_id', $user->questions->pluck('id')->toArray()[0])->get()->count();
        } else {
            $sessions = 0;
            $users = 0;
        }
        $chart1 = $user_reactions->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('Y-m-d');
        });
        foreach ($chart1 as $key => $ur) {
            array_push($chat_with_date, ['date' => $key, 'value' => $ur->count()]);
        }
        return view('backend.users.statistics', compact('user', 'answers_count', 'sessions', 'users', 'report', 'chat_with_date'));
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

    public function resp_stat()
    {
        $user = auth()->user();
        $chats = $user->chats->pluck('id');
        $user_reactions = DB::table('chatbot_reactions')->whereIn('question_id', $user->questions->pluck('id')->toArray())->get();
        $report = DB::table('reports')->whereIn('question_id', $user->questions->pluck('id')->toArray())->get();
        $chat_with_date = [];
        $chat_with_date["chart1"] = [];
        $chat_with_date["chart2"] = [];
        $chat_with_date["chart3"] = [];
        $chat_with_date["chart4"] = [];
        $chat_with_date["chart5"] = [];
        $chat_with_date["chart6"] = [];
        $chat_with_date["chart7"] = [];
        // dd($chats->toArray());
        $locations = DB::table('analysis_chat_locations')->whereIn('chat_id', $chats->toArray())->get();
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
        foreach ($user->chats as $chat) {
            $count = DB::table('chatbot_reactions')->whereIn('question_id', $chat->questions->pluck('id')->toArray())->get()->count();
            array_push($chat_with_date["chart3"], ['country' => $chat->name, 'litres' => $count]);
        }
        return response()->json($chat_with_date);
    }

    public function docs($slug, $id)
    {
        $user = null;
        $chat = Chat::find($id);
        foreach (User::all() as $key => $value) {
            $sluger = $value->slug();
            if ($sluger == $slug) {
                $user = $value;
            }
        }
        $setting = Setting::where('user_id', $user->id)->first();
        if (!$setting) {
            $setting = Setting::find(1);
        }
        return view('docs', compact('user', 'setting', 'chat'));
    }

    public function chatbot_icon($slug, $id)
    {
        $user = null;
        $chat = Chat::find($id);
        foreach (User::all() as $key => $value) {
            $sluger = $value->slug();
            if ($sluger == $slug) {
                $user = $value;
            }
        }
        $setting = Setting::where('user_id', $user->id)->first();
        if (!$setting) {
            $setting = Setting::find(1);
        }
        //dd($user->email);
        if ($user->email == "saudia@wakeb.com") {
            return view('chatbot_icon', compact('user', 'setting', 'chat'));
        } else {
            return view('chatbot_icon', compact('user', 'setting', 'chat'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    public function response(Request $request)
    {

        $data = array(
            'text' => $request->answertext? $request->answertext: "",
            'chat_id' => $request->chat,
            'lang' => $request->lang,
        );
        $url = 'https://chatmatch-api.azurewebsites.net/chatbot/live';

        //create a new cURL resource
        $ch = curl_init($url);

        $payload = json_encode($data);
        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute the POST request
        $result = curl_exec($ch);
        $filterd_data = json_decode($result);
        return Response::json($filterd_data);
    }

    public function question_orders(Request $request)
    {
        foreach ($request->orders as $order) {
            $question = Question::find(str_replace('_', ' ', $order['id']));
            $question->sort = $order['order'];
            $question->save();
        }
    }

    public function store_response(Request $request)
    {
        header('Access-Control-Allow-Origin:  http://chatbotapp-project.azurewebsites.net/chatbot/rchrch/37/store_response');
        header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');
        header('Access-Control-Allow-Methods:  POST, PUT,GET');
        if ($request->id != "entry") {
            DB::table('chatbot_reactions')->insert([
                'question_id' => $request->id,
                'anser' => $request->answertext,
                'ip' => $this->ip_info()['ip'],
                'created_at' => Carbon::now()
            ]);
        }

//        $ip = DB::table('analysis_chat_locations')->where('ip',$this->ip_info()['ip'])->first();
        DB::table('analysis_chat_locations')->insert([
            'chat_id'=> $request->chat,
            'city'=> $this->ip_info()['city'],
            'state'=> $this->ip_info()['state'],
            'ip'=> $this->ip_info()['ip'],
            'country'=> $this->ip_info()['country'],
            'country_code'=> $this->ip_info()['country_code'],
            'continent'=> $this->ip_info()['continent'],
            'continent_code'=> $this->ip_info()['continent_code'],
            'created_at' => Carbon::now()
        ]);
    }

    public function ip_info($ip = null, $purpose = "location", $deep_detect = true)
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $real_ip_adress = $_SERVER['REMOTE_ADDR'];
        }
        $ip = $real_ip_adress;
        if ($real_ip_adress == "127.0.0.1") {
            $ip = "156.215.174.37" ; //$real_ip_adress;
        }
        $output = null;
        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), null, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "ip"             => @$ip,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1) {
                            $address[] = $ipdat->geoplugin_regionName;
                        }
                        if (@strlen($ipdat->geoplugin_city) >= 1) {
                            $address[] = $ipdat->geoplugin_city;
                        }
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'full_name' => $request->first_name . ' ' . $request->last_name,
            'age' => $request->age,
            'sex' => $request->sex,
            'is_admin' => $request->is_admin ? true : false,
            'password' => bcrypt($request->password),
        ]);
        $notification = array(
            'message' => __('backend/notify.store_user_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.store_user'),
        );
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::withTrashed()->find($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *  this function for report a problem
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        if ($request->id == "entry") {
            $request->id  = Question::where('chat_id', $request->chat_id)->where('is_entry_point', 1)->first()->id;
        }
        Report::create([
            'error_text' => $request->chat_message,
            'ip' => $this->ip_info()['ip'],
            "chat_id" => $request->chat_id,
            "type" => $request->chat_type,
            "question_id" => $request->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withoutTrashed()->find($id);
        return view('backend.users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::withoutTrashed()->find($id);
        (!$request->password) ? $request->password = $user->password : ''; // check if the user change the password

        $user->update([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'full_name' => $request->first_name . ' ' . $request->last_name,
            'age' => $request->age,
            'sex' => $request->sex,
            'is_admin' => $request->is_admin ? true : false,
            'password' => bcrypt($request->password),
        ]);
        $notification = array(
            'message' => __('backend/notify.update_user_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.update_user'),
        );
        return redirect()->route('users.index')->with($notification);
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        $notification = array(
            'message' => __('backend/notify.restore_user_successfully'),
            'alert-type' => 'success',
            'title'      => __('notify.restore_user'),
        );
        return redirect()->route('users.index')->with($notification);
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
        $user = User::withTrashed()->find($id);
        if ($user->trashed()) {
            $user->forceDelete();
            $notification = array(
                'message' => __('backend/notify.delete_user_successfully'),
                'alert-type' => 'success',
                'title'      => __('notify.delete_user'),
            );
            return redirect()->route('users.index')->with($notification);
        } else {
            if ($id == Auth::user()->id) {
                $notification = array(
                    'message' => __('backend/notify.delete_user_fail_user_is_login'),
                    'alert-type' => 'error',
                    'title'      => __('notify.delete_user'),
                );
                return redirect()->route('users.index')->with($notification);
            } else {
                $user->delete();
                $notification = array(
                    'message' => __('backend/notify.delete_user_successfully'),
                    'alert-type' => 'success',
                    'title'      => __('notify.delete_user'),
                );
                return redirect()->route('users.index')->with($notification);
            }
        }
    }
}
