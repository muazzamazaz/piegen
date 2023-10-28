<div class="container"> 
    <div class="form-group">        
            <div class="alert alert-danger error-message-display" style="display:none">
            <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    @if(isset($tournamentdetail))
                        @foreach($tournamentdetail as $td)
                        <tr> 
                        <td><input type="datetime-local" name="tournament_time[]" value="date('d-m-Y', strtotime($td->tournament_time))"  placeholder="Select date & time" class="form-control name_list" /></td>  
                        <td><input type="text" name="venue[]" placeholder="Enter venue" value={{$td->venue}} class="form-control name_list" /></td>
                        <td><button type="button"  name="add" id="add" class="btn btn-success">Add Row</button></td>  
                    </tr>
                    @endforeach
                    @else
                    <tr>  
                        <td><input type="datetime-local" name="tournament_time[]" placeholder="Select date & time" class="form-control name_list" /></td>  
                        <td><input type="text" name="venue[]" placeholder="Enter venue" class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add Row</button></td>  
                    </tr>
                    @endif  
                </table>  
            </div>        
    </div> 
</div>


