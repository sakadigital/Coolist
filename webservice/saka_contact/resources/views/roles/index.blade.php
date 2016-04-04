<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Contact Saka Digital </title>

  <!-- Bootstrap core CSS -->

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('fonts/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/maps/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/icheck/flat/green.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/floatexamples.css') }}" rel="stylesheet" type="text/css" />

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/nprogress.js') }}"></script>

</head>


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
                  Roles
                    <small>
                        > List
                    </small>
                </h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Table roles 
                     <!--  <small>
                        List all companies
                      </small> -->
                  </h2>           
                  <div class="clearfix"></div>
                 </div>
                  <div class="x_content">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">ID </th>
                          <th class="column-title">Name </th>
                    	  <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Select ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>

                     <tbody>
                        @foreach($data as $roles)
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">{{$roles->id}}</td>
                          <td class=" ">{{$roles->name}}</td>
                          <td class=" last">
                          <a href="{{URL::to('roles/update/'.$roles->id)}}" class="btn btn-primary btn-sm">Update</a>
                          <a href="#" class="btn btn-danger btn-sm delete" id="{{$roles->id}}">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                  <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
                  <script type="text/javascript">
                    $('.delete').click(function(e){
                      e.preventDefault();

                      var id = $(this).attr('id');
                      var ask = confirm("Anda yakin?");
                      if (ask)
                      {
                        $.ajax({
                          url : "{{URL::to('roles/delete')}}/"+id,
                          type : "DELETE",
                          data: {"_token":"{{csrf_token()}}"},
                          success:function(){
                            alert('Data barhasi di hapus');
                            window.location.reload();
                          }
                        })
                      }
                    })
                  </script>
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
