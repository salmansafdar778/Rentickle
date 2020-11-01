<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\CalendarLinks\Link;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {

//$from = \DateTime::createFromFormat('Y-m-d h:i a', '2020-04-21 09:30 am');
//$to = \DateTime::createFromFormat('Y-m-d h:i a', '2020-05-21 06:30 pm');

//var_dump($from);exit();
//$from = \DateTime::createFromFormat('Y-m-d H:i', '2020-05-05 09:00');
//$to = \DateTime::createFromFormat('Y-m-d H:i', '2020-05-05 11:00');

//\Config::set('app.timezone', 'GMT');
//var_dump(\Config::get('app.timezone'));

$time='01/21/2020 09:00AM';

$timezone = 'Australia/Sydney';
$timezone = 'Europe/Paris';
$timezone = 'Europe/London';
$timezone = 'Asia/Karachi';
$timezone = 'GMT-03:00';

$dt = new \DateTime($time, new \DateTimeZone($timezone));
echo $timezone.' = '.$dt->format('m/d/Y h:i A') . PHP_EOL;

//$from = \DateTime::createFromFormat('Y-m-d H:i', '2020-05-05 09:00');
//$from->setTimezone(new \DateTimeZone('Europe/London'));

//$dt->setTimezone(new \DateTimeZone('Asia/Kolkata'));
//echo $dt->format('Y-m-d H:i:s') . PHP_EOL;
echo '<br>';
$dt->setTimezone(new \DateTimeZone('GMT'));
echo 'GMT = '.$dt->format('m/d/Y h:i A') . PHP_EOL;

echo '<br>';
$dt->setTimezone(new \DateTimeZone('Asia/Karachi'));
echo 'Asia/Karachi = '.$dt->format('m/d/Y h:i A') . PHP_EOL;
//exit();


$start_time = '05/05/2020 09:30AM';
$from = \DateTime::createFromFormat('m/d/Y h:i A', $start_time);

$end_time = '05/06/2020 06:30PM';
$to = \DateTime::createFromFormat('m/d/Y h:i A', $end_time);


$link = Link::create('Test Booking', $from, $to)
    ->description('This isi testgin test')
    ->address('Red Area any where');

// Generate a link to create an event on Google calendar

//echo $link->google();
echo "<br>";
// Generate a link to create an event on Yahoo calendar

//echo $link->yahoo();
echo "<br>";
// Generate a link to create an event on outlook.com calendar

//echo $link->webOutlook();
echo "<br>";
// Generate a data uri for an ics file (for iCal & Outlook)
//echo $link->ics();

$file_name = $link->ics();
$file_name = explode(',',$file_name);

if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $file_name[1])) {
            $file_name = base64_decode($file_name[1]);
        }else{
            $file_name = explode('%0d%0a',$file_name[1]);
            $file_name = implode("\r\n", $file_name);
        }
return $file_name;
$file_name = explode('%0d%0a',$file_name[1]);
$file_name = implode("\r\n", $file_name);

/*foreach ($file_name as $key => $value) {
    echo $value."<br>";
}*/
//exit();
//var_dump($file_name);
$file = public_path().'/calender/test.ics';
$success = file_put_contents($file, $file_name);

//var_dump($success);

exit();

        $zoom = new \MacsiDigital\Zoom\Zoom();

        $users = $zoom->user->all();
var_dump($zoom);exit();

        $zoom = new \MacsiDigital\Zoom\Zoom;
        $meetings = $zoom->user->find('asad@mwanmobile.com')->meetings()->all();

        var_dump($meetings);exit();
        return view('test');
    }//end of test

    public function zoom(Request $request){

        $data = $request->all();

        return $data;
        $zoom = new \MacsiDigital\Zoom\Zoom;
        $users = $zoom->user->all();

        return $users;
    }//end of zoom
}
