<form>
	<div>
		<label>Username:</label>
		<select class="form-control" name="uname" id="uname">
			<option name="">User Name</option>
			<option name=" Username1">admin</option>
			<option name=" Username2">Samuel</option>
			<option name=" Username3">hfrt</option>
		</select>
	</div>
	<div>
		<label>Password:</label>
		<input type="password" name="password" placeholder="Password" class="form-control" id="password">
	</div>
	<div>
		<label>Server Link</label>
		<select class="form-control" name="webLink" id="webLink">
			<option name="">Select cURL</option>
			<option value="Your Server Link">Your server link</option>
		</select>
	</div>
	<div>
		<label>Data Set:</label>
		<select class="form-control" name="dataset" id="dataset">
			<option name="">Select Data Set</option>
			<option value="iFFVg2xgFPL">Monthly eLMIS DataSet </option>
			<option value="ACzf2x2bF">HIV data set</option>
		</select>
	</div>
	<div>
		<label>Month:</label>
		<select class="form-control" name="period" id="period">
			<option name="">Select Month</option>
			<option value="201501">January</option>
			<option value="201502">February</option>
			<option value="201503">March</option>
			<option value="201504">April</option>
			<option value="201505">May</option>
			<option value="201506">June</option>
			<option value="201507">July</option>
			<option value="201508">August</option>
			<option value="201509">September</option>
			<option value="201510">October</option>
			<option value="201511">November</option>
			<option value="201512">December</option>
		</select>
	</div>
	<div>
		<label>Organisational Unit:</label>
		<input type="text" name="orgUnit" placeholder="Org. Unit" class="form-control" id="orgUnit">
	</div>
	<div>
		<button type="submit" class="btn btn-success" id="dataupload_button">Export Data</button>
	</div>
	
</form>

<style>
	*{font-family: sans-serif;}
	form{
		display: block;
	    padding: 9.5px;
	    margin: 0 0 10px;
	    font-size: 13px;
	    line-height: 1.42857143;
	    color: #333;
	    word-break: break-all;
	    word-wrap: break-word;
	    background-color: #f5f5f5;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    position: absolute;
		top: 40px;
		left: 200px;
		width: 850px;
	}

	div{
		margin-left: 150px;
		align-items: center;
		width: 60%;
		position: all;
		padding: 10px;	
		display: grid;
		padding-left: auto;
	}

	input, select{
		width: auto;
    	height: 31px;
    	border-style: groove;
	}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
	$(document).ready(function(){	
	    $("#dataupload_button").click(function(){
	        $('#dataupload_form').submit(function (e) {
				e.preventDefault();
		});
			var uname = $('#uname').val();
			var password= $('#password').val();
			var webLink = $('#webLink').val();
			var dataset = $('#dataset').val();
			var period = $('#period').val();
			
	$('#dataupload_button').after('<div class="loader" style="position: fixed;left: 50%;top: 40%;width: 100%;height: 100%;z-index: 9999;"><img src="assets/images/load.gif" alt="Importing eLMIS Data"></div>');
		jQuery.post("data-export-code.php", {uname:uname,password:password,webLink:webLink,dataset:dataset,period:period },
			function(data){
				alert(data);			
				$('#loader').slideUp(200,function(){		
				$('#loader').remove();});
				$(".loader").fadeOut("slow");
				window().location();	
			});
	    });
	});
</script>