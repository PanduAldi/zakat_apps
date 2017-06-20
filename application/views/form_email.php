<form action="<?php echo site_url('webhack/send_email') ?>" method="POST">
	<table style="padding:5px">
		<tr>
			<td>Email tujuan</td>
			<td>:</td>
			<td><input type="text" size="40" name="email"></td>
		</tr>
		<tr>
			<td>Subject</td>
			<td>:</td>
			<td><input type="text" name="subject" size="50"></td>
		</tr>
		<tr>
			<td>Text</td>
			<td>:</td>
			<td><textarea name="mail" id="" cols="30" rows="10"></textarea></td>
		</tr>
	</table>
	<input type="submit" name="submit" value="Kirim Email">
	<?php echo $this->session->flashdata('notif'); ?>
</form>