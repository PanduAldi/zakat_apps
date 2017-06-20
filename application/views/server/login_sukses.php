<div style="margin-top:5px" align="center">
	<h2>Login Berhasil</h2>
	<p>Redirecting Server Dashboard</p>
	<h3 class="countdown" nilai="5"></h3>
</div>

<script>
var i = 4;

	$(function(){

		countdown();
	})

	function countdown(){
		

		if(i > 0)
		{
			i = i-1;

			$(".countdown").html(i);
			setTimeout(countdown, 1000);
		}
		else
		{
			$(".countdown").html("REDIRECT...");
			setTimeout(function(){location.href="server"}, 2000);
		}
	}

</script>