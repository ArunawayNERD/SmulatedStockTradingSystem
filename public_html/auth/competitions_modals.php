
<!-- Modal for creating a competition -->
<div class="modal fade" id="createCompetitionsModal" tabindex="-1" 
  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
	      <span aria-hidden="true">&times;</span>
	      <span class="sr-only">Close</span>
	    </button>
        <h4 class="modal-title" id="myModalLabel">Create a Competition</h4>
      </div>
      <div class="modal-body">
<!-- modal body -->
<form method="post" action="index.php?competitions" class="form-horizontal">
 <div class="form-group">
  <div class="col-xs-4">
   <input type="text" name="compName" placeholder="Competition Name" class="form-control" maxlength="20"/>
  </div>
 </div>
 <div class="form-group">
  <label for="inputStart" class="col-xs-2 control-label">Start:</label>
  <div class="col-xs-3">
   <input type="text" name="startDate" class="datepicker form-control" id="inputStart" /> 
  </div>
  <div class="col-xs-3">
  <select name="startTime" class="form-control">
    <?php
      for($i=0; $i<24; $i++)
        echo "<option value=\"$i:00\">$i:00</option>\n";
    ?>
  </select>
  </div>
 </div>
 <div class="form-group">
  <label for="inputEnd" class="col-xs-2 control-label">End:</label>
  <div class="col-xs-3">
   <input type="text" name="endDate" class="datepicker form-control" id="inputEnd" /> 
  </div>
  <div class="col-xs-3">
   <select name="endTime" class="form-control">
     <?php
       for($i=0; $i<24; $i++)
         echo "<option value=\"$i:00\">$i:00</option>\n";
     ?>
   </select>
  </div>
 </div>
 <div class="form-group">
   <label for="inputBuyin" class="col-xs-2 control-label">Buy-In: $</label>
  <div class="col-xs-3">
   <input type="number" name="buyin" class="form-control" step="0.01" min="0"/>
  </div>
 </div>
  <input type="submit" value="Make New" class="btn btn-default"/>
</form>
<!-- end modal body -->	
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">
	       Cancel
	     </button>
      </div>
    </div>
  </div>
</div>


<!-- Modal for buying a stock -->
<div class="modal fade"
  id="stockBuyModal" tabindex="-1" 
  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
	      <span aria-hidden="true">&times;</span>
	      <span class="sr-only">Close</span>
	    </button>
        <h4 class="modal-title" id="myModalLabel">Enter Quantity</h4>
      </div>
      <div class="modal-body">
 
 <form method="POST" action="index.php?competitions">
    <input type="number" name="numSharesBuy" class="form-control" step="1" min="0"/>
    <input type="hidden" name="buyStock" 
      value="<?php echo $_POST['selectStock'] ?>" />
    <button type="submit" class="btn btn-default">
      Buy
    </button>

  </form>
     
     </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">
	     Cancel
	 </button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for selling a stock -->
<div class="modal fade"
  id="stockSellModal" tabindex="-1" 
  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
	      <span aria-hidden="true">&times;</span>
	      <span class="sr-only">Close</span>
	    </button>
        <h4 class="modal-title" id="myModalLabel">Enter Quantity</h4>
      </div>
      <div class="modal-body">
 
 <form method="POST" action="index.php?competitions">
    <input type="number" name="numSharesSell" class="form-control" step="1" min="0"/>
    <input type="hidden" name="sellMe" 
      value="<?php echo $_POST['sellStock'] ?>" />
    <button type="submit" class="btn btn-default">
      Sell 
    </button>

  </form>
     
     </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">
	     Cancel
	 </button>
      </div>
    </div>
  </div>
</div>
