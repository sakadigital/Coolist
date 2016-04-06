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
              <h1>
                  Contact Sakadigital
                    <small>
                        Dashboard
                    </small>
                </h1>
                <p>this is project sakadigital</p> 
            </div>
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
