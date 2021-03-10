//this is for whatsapp 
$('input#wShow-Messages').on('click', function()
{
	var number=$('#phone').val();
	var direction= $('#wmsgdirection').val();
	

$.post('showMessages.php' , {wfirst : number ,wsecond : direction} , function(data)
{


			// alert(data);
			// var d = data;
			// console.log(data);
			// working code start
			console.log(data);
			var messages = JSON.parse(data);
			for (var i = 0; i < messages.length; i++) {
				$('#wtable tbody').append("<tr><td><center>" + messages[i][0] + "</center></td><td><center>" + messages[i][1] + "</center></td><td><center>" + messages[i][2] + "</center></td></tr>");
			}
			$("#wtable").DataTable();
			// working code end

			// $("#mytable").DataTable({'ajax': data});


			// $('#myTable').DataTable( {
		 //    ajax:'data.json'
			// 	} );



});
});


//this is for gmail 

$('input#gShow-Messages').on('click', function()
{

	
	
	var direction= $('#gmsgdirection').val();
	
	$.post('showMessages.php' , {gfirst : direction} , function(data)
		{
			
			var messages = JSON.parse(data);

			for (var i = 0; i < messages.length; i++) {
			console.log(messages[i][0] + " " + messages[i][1] + " " + messages[i][2]);
			$('#gtable tbody').append("<tr><td><center>" + messages[i][0] + "</center></td><td><center>" + messages[i][1] + "</center></td><td><center>" + messages[i][2] + "</center></td></tr>");
			
		}
		
	$("#gtable").DataTable();

});
});


//this is for twitter 

$('input#tShow-Messages').on('click', function()
{
	
		
	$.post('showMessages.php' , {tfirst : "isposted"} , function(data)
		{
			alert(data);
			var messages = JSON.parse(data);
			console.log(messages);

			for (var i = 0; i < messages.length; i++) {
			$('#ttable tbody').append("<tr><td><center>" + messages[i][0] + "</center></td><td><center>" + messages[i][1]);
		}
		
	$("#ttable").DataTable();
	//  var code=$('#gphonecode').val();
	//  var gPhoneNo= $('#gphoneno').val();


});
});

// this if for gmail mobile number

// $('input#gSave-Number').on('click', function()
// {
	
// 	alert("working");


	
	
	
// 	// $.post('showMessages.php' , {gpfirst : code, gpsecond : gPhoneNo } , function(data)
// 	// 	{
// 	// 		alert("working");
// 	// 		console.log(JSON.parse(data));
// 	// 		var messages = JSON.parse(data);

// 	// 	});
// });


// /////////


