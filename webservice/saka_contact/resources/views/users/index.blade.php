<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          @include('includes.navtitle')
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
                  <h2>Table users 
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
                          <th class="column-title">Email </th>
                          <th class="column-title">Fisrst Name </th>
                          <th class="column-title">last Name </th>
                          <th class="column-title">Profile Picture.</th>
                          <th class="column-title">Phone </th>
                        <!--   <th class="column-title">Twitter </th>
                          <th class="column-title">Facebook </th>
                          <th class="column-title">Linkedin </th> 
                          <th class="column-title">Registered </th> -->
                          <th class="column-title">Roles </th>
                          <th class="column-title">Companies </th>
                          <th class="column-title">Status Types </th>
                          <th class="column-title">status Description</th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Select ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>

                     <tbody>
                        @foreach($data as $users)
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">{{$users->id}}</td>
                          <td class=" ">{{$users->email}}</td>
                          <td class=" ">{{$users->first_name}}</td>
                          <td class=" ">{{$users->last_name}}</td> 
                          <td class=" "><img src="{{$users->profile_picture}}" width="50" height="50"/></td>
                          <td class=" ">{{$users->phone}}</td>
                          <!-- <td class=" ">{{$users->twitter}}</td> 
                          <td class=" ">{{$users->facebook}}</td>
                          <td class=" ">{{$users->linkedin}}</td>  
                          <td class=" ">{{$users->registered}}</td> -->
                          <td class=" ">{{$users->Roles->name}}</td> 
                          <td class=" ">{{$users->Companies->name}}</td>
                          <td class=" ">{{$users->StatusTypes->name}}</td>
                          <td class=" ">{{$users->status_description}}</td>
                          <td class=" last">
                          <a href="{{URL::to('users/update/'.$users->id)}}" class="btn btn-primary btn-sm">Update</a>
                          <a href="#" class="btn btn-danger btn-sm delete" id="{{$users->id}}">Delete</a>
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
                          url : "{{URL::to('users/delete')}}/"+id,
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
