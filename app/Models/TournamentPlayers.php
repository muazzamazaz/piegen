<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property int $season season
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class TournamentPlayers extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tournament_players';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tournaments','players'];

    /**
    * Date time columns.
    */
    protected $dates=[];

public function tournament_piegens()
    {
        
    return $this->belongsTo(TournamentPiegens::class,'tournament_player_id');
    }

public function tournament()
    {
        
    return $this->belongsTo(Tournament::class,'players');
    }

}