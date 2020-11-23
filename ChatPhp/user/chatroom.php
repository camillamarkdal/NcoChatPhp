<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
	$id=$_REQUEST['id'];
	
	$chatq=mysqli_query($conn,"select * from chatroom where chatroomid='$id'");
	$chatrow=mysqli_fetch_array($chatq);
	
	$cmem=mysqli_query($conn,"select * from chat_member where chatroomid='$id'");
?>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
	<div class="row">
		<?php include('room.php'); ?>
	</div>
</div>
<?php include('modal.php'); ?>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){

	displayChat();
	
		$(document).on('click', '#send_msg', function(){
			id = <?php echo $id; ?>;
			if($('#chat_msg').val() == ""){
				alert('Please write message first');
			}else{
				$msg = $('#chat_msg').val();
				$.ajax({
					type: "POST",
					url: "send_message.php",
					data: {
						msg: $msg,
						id: id,
					},
					success: function(){
						$('#chat_msg').val("");
						displayChat();
					}
				});
			}	
		});
	});
});
	
	function displayChat(){
		id = <?php echo $id; ?>;
		$.ajax({
			url: 'fetch_chat.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				fetch: 1,
			},
			success: function(response){
				$('#chat_area').html(response);
				$("#chat_area").scrollTop($("#chat_area")[0].scrollHeight);
			}
		});
	}
</script>	
</body>
</html>