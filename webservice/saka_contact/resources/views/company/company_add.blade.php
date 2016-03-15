@if (isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>Id</td>
			<td>:</td>
			<td><input name="id"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td>:</td>
			<td><input name="name"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td>:</td>
			<td><textarea name="address"></textarea></td>
		</tr>
		<tr>
			<td>Token</td>
			<td>:</td>
			<td><input name="token"></td>
		</tr>
	</table>
	<input type="submit" name="Submit">
	<input type="reset" name="Reset">
</form>