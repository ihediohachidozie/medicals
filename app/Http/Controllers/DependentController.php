<?php

namespace App\Http\Controllers;

use App\Dependent;

use Auth;
use Illuminate\Http\Request;

class DependentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:patient');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patient= Auth::user()->id;
        $dependents = Dependent::where('patient_id', $patient )->get();

        $relationships = $this->relationship();

        return view('dependent.index', compact('dependents', 'relationships'));
    }
    private function relationship()
    {
        return array('Parent', 'Sibling', 'Friend', 'Child' );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dependent = new Dependent();
        $relationships = $this->relationship();

        return view('dependent.create', compact('dependent', 'relationships'));
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
        //dd($request);
        $data = request()->validate([
            'patient_id' => 'required',
            'name' => 'required',
            'dob' => 'required',
            'relationship' => 'required',
        ]);

        $dependent = Dependent::create($data);

        return redirect('patient/dependent')->withStatus(__('Dependent successfully saved.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function show(Dependent $dependent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependent $dependent)
    {
        //
        $relationships = $this->relationship();
        return view('dependent.edit', compact('dependent', 'relationships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependent $dependent)
    {
        $data = request()->validate([
            'patient_id' => 'required',
            'name' => 'required',
            'dob' => 'required',
            'relationship' => 'required',
            ]);
            $dependent->update($data);

            return redirect('patient/dependent')->withStatus(__('Dependent successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $dependent = Dependent::find($id);
        $dependent->delete();
  
        return redirect('patient/dependent')->withStatus(__('Dependent successfully deleted.'));
    }
}
