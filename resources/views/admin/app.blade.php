@include('admin.header')
    @include('admin.sidebar')
    @include('admin.topbar')
        
                <!-- Begin Page Content -->
                <div class="container-fluid">

                   @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@include('admin.footer')
 


