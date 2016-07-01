<div class="container">
	<div>
		<h1>Login Server Zakat Application</h1>
		<br>
		<div class="panel panel-success">
			<div class="panel-heading">
				Panel Login
			</div>
			<div class="panel-body">
				<div class="pesan-error"></div>
				<form action="" method="post" id="f_login">
					<div class="form-group">
						<div class="input-group">
							<label for="" class="input-group-addon"><i class="fa fa-user"></i></label>
							<input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username">
						</div>	
					</div>		
					<div class="form-group">
						<div class="form-group">
							<div class="input-group">
								<label for="" class="input-group-addon"><i class="fa fa-key"></i></label>
								<input type="password" name="password"  id="password" class="form-control" placeholder="Masukan Password">
							</div>
						</div>
					</div>
				
			</div>
			<div class="panel-footer">
				<button type="submit" id="login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
				</form>
			</div>				
		</div>
	</div>
</div>

<script>
	$(function(){

		$("#f_login").validate({
			rules : {
				"username" : "required",
				"password" : "required"
			},

			messages : {
				"username" : { required : '<div class="text-danger" data-animate="fadeInLeft">Harus di isi</div>'},
				"password" : { required : '<div class="text-danger" data-animate="fadeInLeft">Harus di isi</div>'}
			},

			submitHandler : function()
			{
				var user =  $("#username").val();
				var pass =  $("#password").val();

				$.ajax({
					url : "<?php echo site_url('proses-login') ?>",
					type : "POST",
					data : {
						username : user, password : pass
					},
					beforeSend : function(){
						$("#login").html('<i class="fa fa-spinner fa-spin"></i> Tunggu Sebentar');
					},
					success : function(msg){
						if (msg == 0) 
						{
							$(".pesan-error").html('<div class="alert alert-danger" data-animate="fadeInLeft"><i class="fa fa-info"></i> Username atau Password Salah</div>');

							$("#login").html('<i class="fa fa-sign-in"></i> Login');
							$("#username").val("");
							$("#password").val("");
							$("username").focus();
						}
						else if (msg == 1) 
						{
							location.href = "<?php echo site_url('login-sukses') ?>";
						}
					}
				})
			}
		})
	})
</script>