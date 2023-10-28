<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property int $season season
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class TournamentPiegens extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tournament_piegens';

    /**
    * Mass assignable columns
    */
    protected $fillable=['piegen_time','tournament_player_id'];


}