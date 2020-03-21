<div class="form-table">
	<form method="POST" id="form" accept-charset="UTF-8">
		<table class="table">
			<tr>	
				<td>Логин</td><td><input type="text" name="login"><br></td>
			</tr>
			<tr>
				<td>Пароль</td><td><input type="text" name="password"><br></td>
			</tr>
			
			<tr>
				<td></td><td><input class="btn btn-secondary" id="authSubmit" type="button" name="authSubmit" value="Отправить"></td>
			</tr>
		</table>
	</form>
	<div class="text-info" id="updateMsg"></div>
	<div class="text-danger" id="updateError"></div>	
</div>

<script type="text/javascript">
	$(function() {
		$("#authSubmit").click(function() {
			var formData = $("#form").serialize(); 
			var hostname = "<?php echo $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST']; ?>";
			var url = hostname + "/authentication";
			$.ajax({
				url: url, 
				type: "post",
			  	data: formData,
				success: function(data) {
					var result = JSON.parse(data);
					if (result.status == true) {
						$('#updateMsg').text(result.msg);
						$('#updateError').remove();
						$('#form').remove();
					} else {
						$('#updateError').text(result.error);
					}
				}
			});
		});
	});
</script>