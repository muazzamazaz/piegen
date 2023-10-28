<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Season;


/**
 * Description of SeasonController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SeasonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view('pages.season.index', ['records' => Season::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Season $season)
    {
        return view('pages.season.show', [
                'record' =>$season,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.season.create', [
            'model' => new Season,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Season;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Season saved successfully');
            return redirect()->route('season.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Season');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Season $season)
    {

        return view('pages.season.edit', [
            'model' => $season,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Season $season)
    {
        $season->fill($request->all());

        if ($season->save()) {
            
            session()->flash('app_message', 'Season successfully updated');
            return redirect()->route('season.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Season');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Season  $season
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Season $season)
    {
        if ($season->delete()) {
                session()->flash('app_message', 'Season successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Season');
            }

        return redirect()->back();
    }
}
