<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Registration;
use App\Doctor;
use App\Patient;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['datas'] = Registration::get();
        return view('pages.registration.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['doctors'] = Doctor::get();
        $data['patients'] = Patient::get();
        return view('pages.registration.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $checkupDate = $request->checkupDate;
        $doctor = $request->doctor;

        $number = DB::table('registrations')
        -> whereDate('checkupDate', $checkupDate) 
        -> where('doctor_id', $doctor) 
        -> orderBy('created_at', 'desc')
        -> value('number');

        if( $number != NULL){
            $number = $number + 1;
        } else {
            $number = 1;
        }

        $req = [
            'number' => $number,
            'checkupDate' => $request->checkupDate,
            'patient_id' => $request->patient,
            'doctor_id' => $request->doctor
        ];

        $data = Registration::create($req);

        return redirect()->route('registration.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['registration'] = Registration::find($id);
        return view('pages.registration.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Registration::where('id',$id)->delete();
        return response()->json($id);
    }
}
