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
			<td>Companies Id</td>
			<td>:</td>
			<td>
				<select name="companies_id" id="companies_id">
					<option></option>
					@foreach ($companies as $company)
					<option value="{{ $company->id }}" @if (old('companies_id') == $company->id) selected="selected" @endif>{{ $company->name }}</option>
					@endforeach
				</select>
		   <!-- <select name="companies_id" id="companies_id">
		  			<option></option>			
					@foreach($companies as $company)
					<option value="{{$company->id}}">{{$company->name}}</option>
					@endforeach
				</select> -->
			</td>
		</tr>
		<tr>
			<td>Domain</td>
			<td>:</td>
			<td><input name="domain" value="{{old('domain')}}"></td>
		</tr>
	</table>
	<input type="submit" name="Submit">
	<input type="reset" name="Reset">
</form>