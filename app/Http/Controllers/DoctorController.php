<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['datas'] = Doctor::get();
        return view('pages.doctor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.doctor.create');
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
        $req = [
            'name' => $request-> name,
            'email' => $request -> email,
            'address' => $request -> address,
            'gender' => $request -> gender,
            'phone' => $request -> phone
        ];

        $data = Doctor::create($req);
        
        return redirect() -> route('doctor.index');
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
        $data['doctor'] = Doctor::find($id);
        return view('pages.doctor.edit', $data);
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
        $req = [
            'name' => $request-> name,
            'email' => $request -> email,
            'address' => $request -> address,
            'gender' => $request -> gender,
            'phone' => $request -> phone
        ];

        $data = Doctor::where('id',$id)->update($req);
        
        return redirect() -> route('doctor.index');
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
        Doctor::where('id',$id)->delete();
        return response()->json($id);
    }
}
