<?php

namespace App\Http\Controllers\Person;

use App\Application;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::get();
        return view('auth.application.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        return view('auth.application.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image')->getClientOriginalName();
        Application::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'email' => $request->email,
            'weight' => $request->weight,
            'sample' => $request->sample,
            'description' => $request->description,
            'image' => '/storage/applications/' . $file,
        ]);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->move(public_path('/storage/applications'),$file);
        }

        return redirect()->route('application.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return view('auth.application.show',compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $categories=Category::get();
        return view('auth.application.form',compact('application','categories'));
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
        $file = $request->file('image')->getClientOriginalName();
        Application::find($id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'email' => $request->email,
            'weight' => $request->weight,
            'sample' => $request->sample,
            'description' => $request->description,
            'image' => '/storage/applications/' . $file,
        ]);
        if ($request->has('image')){
            $path=$request->file('image')->move(public_path('/storage/applications'),$file);
            $params['image']=$path;
        }
        return redirect()->route('application.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('application.index');
    }
}
