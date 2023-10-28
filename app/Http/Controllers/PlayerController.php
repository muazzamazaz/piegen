<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player;


/**
 * Description of PlayerController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PlayerController extends Controller
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
        return view('pages.players.index', ['records' => Player::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Player $player)
    {
        return view('pages.players.show', [
                'record' =>$player,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.players.create', [
            'model' => new Player,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Player;
      //   $file = $request->file('picture');
      //  $name=$file->getClientOriginalName();
      //  $request->picture->store('images', 'public');
         $success = $request->move('images');
         
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Player saved successfully');
            return redirect()->route('players.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Player');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Player $player)
    {

        return view('pages.players.edit', [
            'model' => $player,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Player $player)
    {
        
    $player->fill($request->all());

    $photo = $request->file('picture')->getClientOriginalName();    
    $destination = public_path() . '/images';
    $request->file('picture')->move($destination, $photo);
    $player->picture=$photo;
    
        if ($player->save()) {
            
            session()->flash('app_message', 'Player successfully updated');
            return redirect()->route('players.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Player');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Player  $player
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Player $player)
    {
        if ($player->delete()) {
                session()->flash('app_message', 'Player successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Player');
            }

        return redirect()->back();
    }
}
