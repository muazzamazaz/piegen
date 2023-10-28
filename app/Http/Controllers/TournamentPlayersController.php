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

class TournamentPlayersController extends Controller
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
        $tournament_players = DB::table('tournament_players')
            ->join('tournament', 'tournament.id', '=', 'tournament_players.tournaments')
            ->select('tournament.id as tid', 'name','piegen','tournament_players.*')->orderBy('tournament_players.id')
            ->paginate(10);

        return view('pages.tournament_players.index', ['tournament_players'=>$tournament_players,'players'=>$players]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TournamentPlayers $tournament_player)
    {
        $items=Season::all();
        $players=Player::all();

        return view('pages.tournament_players.show', [
                'record' =>$tournament_player,
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
        $tournaments=Tournament::all();

        return view('pages.tournament_players.create', [
            'model' => new Tournament,
            'items'=>$items,
            'players'=>$players,
            'tournaments'=>$tournaments

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model=new TournamentPlayers;        
      //  $model->players = implode(',', $request->players);
 $d=       $model->fill($request->all());
 
        if ($model->save()) {
            
                              $request["tournament_player_id"]=$model->id;
            
                
                foreach ($request->piegen_time as $value) {
                	$modeldetail=new TournamentPiegens;
            $modeldetail->tournament_player_id=$model->id;
            $modeldetail->piegen_time=$value;
                  $modeldetail->save();
                }         
            
            

            session()->flash('app_message', 'Tournament saved successfully');
            return redirect()->route('tournamentplayers.index');
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
    public function edit(Request $request,$tournament_player)
    {

        $items=Season::all();
    $players=Player::all();
$tournaments=Tournament::all();

//$tournament_piegens=TournamentPiegens::find($tournament_player->tournaments);
$tournament_pl = TournamentPlayers::find($tournament_player);

$tournament_piegens = TournamentPiegens::where('tournament_player_id',$tournament_pl->id)->get();

        return view('pages.tournament_players.edit', [
           
            'items' => $items    ,        
            'players' => $players ,
            'tournament_player'=>$tournament_pl,
            'tournaments'=>$tournaments,
            'tournament_piegens'=>$tournament_piegens


            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tournament $tournament,TournamentPiegens $tournamentdetail)
    {
      
       // $tournament->players = implode(',', $request->players);
    $d=    $tournament->fill($request->all());
       
try{
        if ($tournament->save()) {

           // $request["tournament_id"]=$tournament->id;
           $d= $tournamentdetail->fill($request->all());
        
            $tournamentdetail->save();
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
    public function destroy($tournamentplayers)
    {
        
        if (TournamentPlayers::destroy($tournamentplayers)) {
                session()->flash('app_message', 'Tournament successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Tournament');
            }

        return redirect()->back();
    }
}
