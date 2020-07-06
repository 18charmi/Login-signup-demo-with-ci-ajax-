
	//displaying profile details
	function tableData(details){
	
	console.log(details);
	
	var table = $('<table class="table table-striped"><thead><tr><th scope="col">Contact No: </th><th scope="col" colspan="2">Name</th><th scope="col">Gender</th></tr></thead><tbody>');

	var row = $('<tr>');	
	$.each( details, function( key, value ) {
		
		if(key != "password")
		{
		
			var data2 = $('<td>').text(value);
			row.append(data2);	
		}

	});
	table.append(row);
	
	//showing profile details
	$('#profile_data').append(table);

	//replacing login & signup with logout	
	$('#before_login').hide();
	$('#after_login').show();

	}

	//logout 
	$('#logout_btn').click(function(e) {
		$.ajax({
		method: "GET",
		url: $('#logout_btn').attr("href"),
        dataType: 'JSON',
		success: function(data)
		{
			
			alert(data['message']);
			window.location.replace("http://localhost/index.php");
		},
		error: function(requestObject, error, errorThrown) {
			alert('Staus : '+requestObject.status+'Error : '+error+'Error Thrown : '+errorThrown);
       }
		
		});
	});

	//toggle forms hide/show
	$("#getloginform").click(function(e){
			$("#form1").slideToggle();
	});


