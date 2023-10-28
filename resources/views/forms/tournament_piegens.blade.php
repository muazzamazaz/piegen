<div class="container"> 
    <div class="form-group">
        
            <div class="alert alert-danger error-message-display" style="display:none">
            <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>
            
            <?php
            $i=1;
            ?>

            <div class="table-responsive">  
                <h3>Piegens</h3>
                <table class="table table-bordered" id="dynamic_field">  
                  <tr><th>Sr#</th>  <th>Arrival Time</th></tr>
                  @if(!isset($tournament_piegens))
                  <?php                
                  $j=$tournaments[0]->piegen;                  
                  ?>
                  @while($i <=$j)
                 
                    <tr>  
                       <td> <lable>{{$i}}</lable></td> <td><input type="time" name="piegen_time[]" placeholder="Select date & time" class="form-control name_list" /></td>  
                    </tr>  
                   <?php $i++;?>
                    @endwhile
                    @else
                      @foreach($tournament_piegens as $tp)
                        <tr>  
                       <td> <lable>{{$i}}</lable></td> <td><input type="time" name="piegen_time[]" value="{{$tp->piegen_time}}" placeholder="Select date & time" class="form-control name_list" /></td>  
                    </tr>  
                    <?php $i++;?>
                      @endforeach

                    @endif
                </table>  
            </div>
        
    </div> 
</div>


