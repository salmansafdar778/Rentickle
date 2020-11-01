<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challan;
use App\Concession;
use App\Generate_Challan;
use Auth;

class TestController extends Controller
{
    /**
     * Combine firstname and lastname
     *
     * @param Request $request
     * @return Response|string
     */
    public function create(Request $request)
    {
        $userData = $request->only([
            'firstname',
            'lastname',
        ]);

        if (empty($userData['firstname']) && empty($userData['lastname'])) {
            return new \Exception('Missing data', 404);
        }

        return $userData['firstname'] . ' ' . $userData['lastname'];
    }

    public function challan(Request $request){

        $data = $request->all();

        $challans = Challan::all();
        $gChallans = Generate_Challan::all();
        $concessions = Concession::where('isActive',1)->get();
        return view('challan',compact(['challans','concessions','gChallans']));

    }//end of challan

    public function create_challan(Request $request){

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        if ($data['tType'] == 'challan') {
            
            $record = Challan::create($data);
        }else{
            
            $record = Concession::create($data);
            $record->challan = $record->concession_challan;
        }

        return $record;

    }//end of create_challan

    public function consession(Request $request){

        $data = $request->all();
        return view('consession');

    }//end of consession

    public function delete_challan(Request $request){

        $data = $request->all();
        $id = 0;

        if (isset($data['id'])) {
            $id = $data['id'];
        }

        $record = Concession::where('id',$id)->where('isActive',1)->first();
        if (!empty($record)) {
            $record->isActive = 0;
            $record->save();
        }
        
        return $data;
    }//end of delete challan

    public function generate_challan(Request $request){

        $data = $request->all();
        $total = 0;
        $challans = \DB::select('SELECT t1.id,t1.name,t1.fee,t1.id as cid,t2.priority,t2.concession,t2.challan_id FROM challans AS t1
LEFT JOIN 
(SELECT * FROM consessions A WHERE priority = (SELECT MAX(b.priority) FROM consessions B WHERE b.challan_id = a.challan_id AND b.isActive =1)) 
AS t2 ON t1.id = t2.challan_id');


        if (!empty($challans)) {
            foreach ($challans as $key => $challan) {
                
                if (!empty($challan->concession)) {

                    $concession = $challan->fee - (($challan->concession / 100) * $challan->fee);

                    //$challans[$key]['subTotal'] = $concession;

                    $total +=$concession;
                }else{
                    $total +=$challan->fee;

                    //$challans[$key]['subTotal'] = $fee;
                }
            }
        }

        $nData = array(
            'challans'=>$challans,
            'total'=>$total
        );
        $nData = json_encode($nData);
        $gChallan = Generate_Challan::create([
            'concession'=>$nData
        ]);
        return ['gChallan'=>$gChallan,'challans'=>$challans , 'total'=>$total];
    }//end of generate challan
}
