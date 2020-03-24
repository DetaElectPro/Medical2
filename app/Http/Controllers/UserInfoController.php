<?php

namespace App\Http\Controllers;

use App\Models\Employ;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employ = Employ::where('user_id', $id)->first();
        return view('web.employ.edit', compact('employ'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employ = Employ::where('user_id', $id)->first();
        return view('web.employ.edit', compact('employ'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cvFile = $this->saveFile($request, $id);
        $employ = Employ::findOrFail($id);
        $employ->fill($request->all());
        $employ->cv = $cvFile;
        $employ->doctor()->update(['status' => 3]);
        $employ->save();
        return $employ->doctor;
//        return view('web.employ.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $request
     * @param $userId
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function saveFile($request, $userId)
    {
        $random = Str::random(10);
        if ($request->hasfile('cv')) {
            $image = $request->file('cv');
            $name = $random . 'cv_' . $userId . ".pdf";
            $image->move(public_path() . '/cv/', $name);
            $name = url("cv/$name");

            return $name;
        }
        return false;
    }
}
