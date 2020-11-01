<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ZoomController extends Controller
{
    public function zoom(Request $request){

    	$data = $request->all();
  
    	$user = \Zoom::user();

    	$id = 'y7GuVfp0TbG9Oc6qV_ryxw';

      $settings = [
      'approval_type' => 2,
      'panelists_video'=>true,
      'host_video'=>true,
      'audio'=>'both',
      'question_answer'=>true,
      'practice_session'=>true,
      'auto_recording'=>'none',
      'meeting_authentication'=>true,
    ];

    $webData = [
      'topic' => "Test webinar",
      'agenda' => "This is test webinar created by mwan.",
      'type' => 1,
      'start_time' => new Carbon("2020-08-12 10:00:00"),//2020-08-12 10:00:00
      'duration' => 40,
      'timezone'=> 'America/Los_Angeles',
      'password'=>'Test1234',
        ];

    $webinar = \Zoom::webinar()->make($webData);

    $webinar->settings()->make($settings);

    //$user->webinars()->save($webinar);
    $webinar->save();
return $webinar;
    	//$user = \Zoom::user()->find('asad@mwanmobile.com');

    	//find is login user is valid zoom user.
    	//$user = \Zoom::user()->where('email','asad@mwanmobile.com')->where('status','active')->first();

    	//create zoom user

    	/*$user = \Zoom::user()->create([
    		"email"=> "salmansafdar778@gmail.com",
    "type"=> 1,
    "first_name"=> "Sallu",
    "last_name"=> "Safdar"
    	]);
    	return $user;
    	$users = \Zoom::user()->all();*/

//return $user->meetings()->all();

    	$mId = '71731373954';



    	//$meeting = Zoom::meeting();
    	//var_dump(\Zoom::meeting()->find($mId));exit();

    	/*$meeting = \Zoom::meeting()->find($mId)->update([
    	 	'topic'=>"Update Test Meeting",
    	 	'duration'=>45,
    	 	'agenda'=>'Update by salman'
    	 ]);*/

    	 $meeting = \Zoom::meeting()->find($mId);
    	 return $meeting->registrants()->get();
    	 $registrant = $meeting->registrants()->create([
    	 	"email"=> "salmansafdar778@gmail.com",
  			"first_name"=> "salman",
  			"last_name"=> "safdar",
  			"address"=> "mwan PWD",
  			"city"=> "ISB",
  			"country"=> "PAK",
  			"zip"=> "11371",
  			"state"=> "NY",
  			"phone"=> "00000000",
  			"industry"=> "IT",
  			"org"=> "MWAN",
  			"job_title"=> "QA",
    	 ]);
    	 return $registrant;
    	//var_dump($users->toArray());exit();

    	// HTTP Request returned Status Code 400. Registration has not been enabled for this meeting: 71731373954. 
    	return $users->toArray();

    }
}
