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
			<td><input name="id" value="{{old('id')}}"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><input name="email" value="{{old('email')}}"></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>:</td>
			<td><input name="first_name" value="{{old('first_name')}}"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td>:</td>
			<td><input name="last_name" value="{{old('last_name')}}"></td>
		</tr>
		<tr>
			<td>Profile Picture</td>
			<td>:</td>
			<td><input name="profile_picture" value="{{old('profile_picture')}}"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input name="password" value="{{old('password')}}"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>:</td>
			<td><input name="phone" value="{{old('phone')}}"></td>
		</tr>
		<tr>
			<td>Twitter</td>
			<td>:</td>
			<td><input name="twitter" value="{{old('twitter')}}"></td>
		</tr>
		<tr>
			<td>Facebook</td>
			<td>:</td>
			<td><input name="facebook" value="{{old('facebook')}}"></td>
		</tr>
		<tr>
			<td>Linkedin</td>
			<td>:</td>
			<td><input name="linkedin" value="{{old('linkedin')}}"></td>
		</tr>
		<tr>
			<td>Registered</td>
			<td>:</td>
			<td><input name="registered" value="{{old('registered')}}"></td>
		</tr>
		<tr>
			<td>Roles</td>
			<td>:</td>
			<td><select name="roles_id" id="roles_id">
					<option></option>
					@foreach ($roles as $role)
					<option value="{{ $role->id }}" @if (old('roles_id') == $role->id) selected="selected" @endif>{{ $role->name }}</option>
					@endforeach
				</select></td>
		</tr>
		<tr>
			<td>Companies</td>
			<td>:</td>
			<td>
				<select name="companies_id" id="companies_id">
					<option></option>
					@foreach ($companies as $company)
					<option value="{{ $company->id }}" @if (old('companies_id') == $company->id) selected="selected" @endif>{{ $company->name }}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Status Types</td>
			<td>:</td>
			<td>
				<select name="status_types_id" id="status_types_id">
					<option></option>
					@foreach ($status_types as $status_types)
					<option value="{{ $status_types->id }}" @if (old('status_types_id') == $status_types->id) selected="selected" @endif>{{ $status_types->name }}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Status Description</td>
			<td>:</td>
			<td><textarea name="status_description">{{old('status_description')}}</textarea></td>
		</tr>
		
		</table>
	<input type="submit" name="Submit">
	<input type="reset" name="Reset">
</form>