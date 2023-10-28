<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property int $season season
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class Tournament extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tournament';

    /**
    * Mass assignable columns
    */
    protected $fillable=['season','name','piegen'];

    /**
    * Date time columns.
    */
    protected $dates=[];

public function players()
    {
        
    return $this->belongsTo(Players::class,'players');
    }
public function tournament_players()
    {
        
    return $this->belongsTo(TournamentPlayers::class,'players');
    }

}