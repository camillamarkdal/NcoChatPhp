<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
	<div class="row">
		<?php include('chatlist.php'); ?>
	</div>
</div>
<?php include('modal.php'); ?>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){
	
	$('#chatRoom').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": false,
	"pageLength": 7
	});
	
	
	$(document).on('click', '.join_chat', function(){
		var cid=$(this).val();
		if ($('#status'+cid).val()==1){
			window.location.href='chatroom.php?id='+cid;
		}
		else if ($('#status'+cid).val()==2){
			$('#join_chat').modal('show');
			$('.modal-body #chatid').val(cid);
		}
		else{
			$.ajax({
				url:"addmember.php",
				method:"POST",
				data:{
					id: cid,
				},
				success:function(){
				window.location.href='chatroom.php?id='+cid;
				}
			});
		}
	});
});
</script>	
</body>
</html>