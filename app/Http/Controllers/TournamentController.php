<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Models\TournamentPlayers;
use App\Models\TournamentDetail;
use App\Models\TournamentPiegens;
use App\Models\Season;
use App\Models\Player;
use Log;
use DB;

/**
 * Description of TournamentController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TournamentController extends Controller
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
        $items=Season::all();
        $players=Player::all();

        return view('pages.tournament.index', ['records' => Tournament::paginate(10),'items'=>$items,'players'=>$players]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tournament $tournament)
    {
        $items=Season::all();
        $players=Player::all();

        foreach($items as $item){
            if($item->id==$tournament->season)
                $season=$item->name;
            else
                $season='';
        }
        return view('pages.tournament.show', [
                'record' =>$tournament,
                'season'=>$season,
                'players'=>$players,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $items=Season::all();
        $players=Player::all();

        return view('pages.tournament.create', [
            'model' => new Tournament,
            'items'=>$items,
            'players'=>$players

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model=new Tournament;        
       // $model->players = implode(',', $request->players);
 $d=       $model->fill($request->all());
 
        if ($model->save()) {
            
         
           
             $i=0;
           foreach ($request->tournament_time as $value) {
                   $tournamentdetail=new TournamentDetail;
                $tournamentdetail->tournament_time=$value;    
                $tournamentdetail->venue=$request->venue[$i];    
                $tournamentdetail->tournament_id=$model->id;
                //$tournamentdetail->timestamps = false;    
     $i++;       
                $tournamentdetail->save();
           } 
            session()->flash('app_message', 'Tournament saved successfully');
            return redirect()->route('tournament.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Tournament');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tournament $tournament)
    {

        $items=Season::all();
        $tournamentdetail=TournamentDetail::where('tournament_id',$tournament->id)->get();
    // dd($tournamentdetail);
        return view('pages.tournament.edit', [
            'model' => $tournament,
            'items' => $items     ,    
            'tournamentdetail' => $tournamentdetail            

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tournament $tournament)
    {
      
      //  $tournament->players = implode(',', $request->players);
    $d = $tournament->fill($request->all());
      
try{
        if ($tournament->save()) {
           
           $i=0;
           
           foreach ($request->tournament_time as $value) {
                
                $tournamentdetail = new TournamentDetail;
                $tournamentdetail->tournament_time=$value;    
                $tournamentdetail->venue=$request->venue[$i];    
                $tournamentdetail->tournament_id=$tournament->id;    
                $i++;        
                $tournamentdetail->save();
           }           
         
            session()->flash('app_message', 'Tournament successfully updated');
            return redirect()->route('tournament.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Tournament');
            }

                  } catch (Exception $e) {
                    Log::debug($e->getMessage());
         return response()->json(['error'=>$e->getMessage()]);
       }

        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Tournament  $tournament
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Tournament $tournament)
    {
        if ($tournament->delete()) {
                session()->flash('app_message', 'Tournament successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Tournament');
            }

        return redirect()->back();
    }

    public function result($data){

$items=Season::all();
$tournament = Tournament::find($data)->get();
//$tournament_players = TournamentPlayers::where('tournaments',$data)->get();
//dd($tournament_players[0]);
/*
$tournament_players = DB::table('tournament_players')
    ->join('tournament', 'tournament.id', '=', 'tournament_players.tournaments')
    ->join('players', 'players.id', '=', 'tournament_players.players')
    ->join('tournament_piegens', 'tournament_player_id', '=', 'tournament_players.id')->orderBy('piegen_time','desc')
    ->where('tournament_players.tournaments', $data)->get();
  */

$tournamentPlayers = DB::table('tournament_players')
    ->join('tournament', 'tournament.id', '=', 'tournament_players.tournaments')
    ->join('players', 'players.id', '=', 'tournament_players.players')  
    ->select('tournament_players.id as tid','tournaments','players.name','piegen','tournament.id','players.picture','tournament.name') 
    ->where('tournament_players.tournaments', $data)->get();

    $tournament_player_id=TournamentPlayers::where('tournaments',$data)->first();

    $piegens=DB::table('tournament_players')->join('tournament_piegens', 'tournament_players.id', '=', 'tournament_piegens.tournament_player_id')->where('tournament_players.tournaments',$data)->orderBy('piegen_time','desc')->get();

//dd($tournamentPlayers );
         return view('pages.tournament.result', [        
            'records' => $tournament,
            'tournamentPlayers' => $tournamentPlayers,            
            'items'=>$items   ,     
            'piegens'=>$piegens        

            ]);
    }
    
}
