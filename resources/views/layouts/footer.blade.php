<div class="sidebar-overlay" data-reff=""></div>
{{--<script src="{{url('public')}}/assets/js/jquery-3.2.1.min.js"></script>--}}
<script src="{{url('public')}}/assets/js/popper.min.js"></script>
<script src="{{url('public')}}/assets/js/bootstrap.min.js"></script>
<script src="{{url('public')}}/assets/js/jquery.slimscroll.js"></script>
{{--<script src="{{url('public')}}/assets/js/Chart.bundle.js"></script>--}}
{{--<script src="{{url('public')}}/assets/js/chart.js"></script>--}}
<script src="{{url('public')}}/assets/js/select2.min.js"></script>
<script src="{{url('public')}}/assets/js/moment.min.js"></script>
<script src="{{url('public')}}/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{url('public')}}/assets/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>



@if(Session::has('message'))
    <script>
        toastr.options.timeOut = 3000;
        toastr.options.closeButton = false;
        toastr.options.progressBar = false;
        toastr.options.positionClass = "toast-bottom-right";
        toastr.success("{{ Session::get('message') }}", {timeOut: 4000})
    </script>
    @endif


    @yield('js')


    {{--<script type="text/javascript">--}}
    {{--    $(document).on('click', 'ul li', function() {--}}
    {{--        $(this).addClass('active').siblings().removeClass('active')--}}
    {{--    })--}}
    {{--</script>--}}

    {{--    <script type="text/javascript">--}}
    {{--        alert("hello");--}}
    {{--        // var header = document.getElementById("sidebar");--}}
    {{--        // var btns = header.getElementsByClassName("btn");--}}
    {{--        // for (var i = 0; i < btns.length; i++) {--}}
    {{--        //     btns[i].addEventListener("click", function() {--}}
    {{--        //         var current = document.getElementsByClassName("active");--}}
    {{--        //         current[0].className = current[0].className.replace(" active", "");--}}
    {{--        //         this.className += " active";--}}
    {{--        //     });--}}
    {{--        // }--}}
    {{--    </script>--}}









    </body>


    <!-- Mirrored from dreamguys.co.in/preclinic/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 May 2019 06:19:12 GMT -->
    </html>
