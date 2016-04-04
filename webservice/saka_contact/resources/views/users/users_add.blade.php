<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><img class="img-responsive" src="{{ asset('images/Logo - Saka - Grey.png') }}" alt="Chania"></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
            @include('includes.sidebar')
          <!-- /sidebar menu -->

          <!-- menu footer buttons -->
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
        @include('includes.navigation')
      <!-- /top navigation -->

     <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                  Users
                    <small>
                        > Add
                    </small>
                </h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Form users 
                     <!--  <small>
                        List all companies
                      </small> -->
                  </h2>           
                  <div class="clearfix"></div>
                 </div>
                  <div class="x_content">
                    @if (isset($errors) and count($errors) > 0)
					         <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					       </div>
					         @endif
                   <form method="post" data-parsley-validate class="form-horizontal form-label-left">
                  	 {{ csrf_field() }}

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="id" value="{{old('id')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="email" value="{{old('email')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="first_name" value="{{old('first_name')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="last_name" value="{{old('last_name')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile_picture">Profile Picture URL <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="profile_picture" value="{{old('profile_picture')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="password" value="{{old('password')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="phone" value="{{old('phone')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Twitter <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="first_name" value="{{old('first_name')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook">Facebook <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="facebook" value="{{old('facebook')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin">Linkedin <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="linkedin" value="{{old('linkedin')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="registered">Registered <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="registered" value="{{old('registered')}}" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <select name="roles_id" id="roles_id" class="form-control">
                          <option></option>
                        	@foreach ($roles as $role)
							<option value="{{ $role->id }}" @if (old('roles_id') == $role->id) selected="selected" @endif>{{ $role->name }}</option>
							@endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <select name="companies_id" id="companies_id" class="form-control">
                          <option></option>
							@foreach ($companies as $company)
							<option value="{{ $company->id }}" @if (old('companies_id') == $company->id) selected="selected" @endif>{{ $company->name }}</option>
							@endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <select name="status_types_id" id="status_types_id" class="form-control">
                          <option></option>
							@foreach ($status_types as $status_types)
							<option value="{{ $status_types->id }}" @if (old('status_types_id') == $status_types->id) selected="selected" @endif>{{ $status_types->name }}</option>
							@endforeach
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status Description</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="3" name="status_description">{{old('status_description')}}</textarea>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                  </div>
                </div>
              </div>
            </div>
            <br />
            <br />
            <br />
          </div>
        </div>
        <!-- footer content -->       
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>
  </div>
  @include('includes.footer')
</body>

</html>
