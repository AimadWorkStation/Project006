//for animate the succeeded div message at updatig the user 
$(".alert").alert();

//ajax delete

$(document).ready(function() {

	//we cane use same thing for the email
	$('#usernameVerif').keyup(function() {
		var val = $(this).val();
		if(val.length < 5){
			$('#usernamelength').css('display','block');
			$('#usernameErrorfalse').css('display','none');
			$('#usernameErrortrue').css('display','none');
		}
		else{
			$('#usernamelength').css('display','none');
			$.post('usernameVerif.php', {val : val}, function(data){
				if(data == 'true'){
					$('#usernameErrorfalse').css('display','block');
					$('#usernameErrortrue').css('display','none');
				}
				else{
					$('#usernameErrortrue').css('display','block');
					$('#usernameErrorfalse').css('display','none');
				}
			});
		}
	});
});

function deletUser(id){
	myid = id;
	$.post('deleteUser.php', {id: myid}, function(data) {
		if(data == 'true'){
			//it's only for affecting the row by a smoth delete so that de element is already deleted in database even we use hide in page
			$('.mainTable #tr'+ myid).hide(1000);
		}
	});
	return false;
}

