<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu" >
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ Route::is('welcome') ? 'active' : '' }}">
                    <a href="{{ route('welcome') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ Route::is('department') ? 'active' : '' }}">
                    <a href="{{ route('department') }}"><i class="fas fa-building"></i> <span>Department </span></a>
                </li>
                <li class="{{ Route::is('platform') ? 'active' : '' }}">
                    <a href="{{ route('platform') }}"><i class="fas fa-building"></i> <span>Platfrom</span></a>
                </li>
                <li class="{{ Route::is('credential') ? 'active' : '' }}">
                    <a href="{{ route('credential') }}"><i class="fas fa-address-book"></i> <span>Credential</span></a>
                </li>
                <li class="{{ Route::is('usertype') ? 'active' : '' }}">
                    <a href="{{ route('usertype') }}"><i class="fas fa-building"></i> <span>Usertype</span></a>
                </li>
                <li class="{{ Route::is('user') ? 'active' : '' }}">
                    <a href="{{ route('user') }}"><i class="fas fa-building"></i> <span>User</span></a>
                </li>



{{--                <li class="{{ Route::is(('platform')) ? 'active' : '' }

}">--}}
{{--                    <a href="{{ route('patients') }}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>--}}
{{--                </li>--}}
{{--                <li class="{{ Route::is(('appointment')) ? 'active' : '' }}">--}}
{{--                    <a href="{{ route('appointment') }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>--}}
{{--                </li>--}}
{{--                <li class="{{ Route::is(('schedule')) ? 'active' : '' }}">--}}
{{--                    <a href="{{ route('schedule') }}"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>--}}
{{--                </li>--}}
{{--                <li class="{{ Request::is(('services')) ? 'active' : '' }}">--}}
{{--                    <a href="{{ route('services') }}"><i class="fa fa-server"></i> <span>Services</span></a>--}}
{{--                </li>--}}
                {{--                <li>--}}
                {{--                    <a href="departments.html"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>--}}
                {{--                </li>--}}
                {{--                <li class="submenu">--}}
                {{--                    <a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>--}}
                {{--                    <ul style="display: none;">--}}
                {{--                        <li><a href="employees.html">Employees List</a></li>--}}
                {{--                        <li><a href="leaves.html">Leaves</a></li>--}}
                {{--                        <li><a href="holidays.html">Holidays</a></li>--}}
                {{--                        <li><a href="attendance.html">Attendance</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                <li class="submenu">--}}
                {{--                    <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>--}}
                {{--                    <ul style="display: none;">--}}
                {{--                        <li><a href="invoices.html">Invoices</a></li>--}}
                {{--                        <li><a href="payments.html">Payments</a></li>--}}
                {{--                        <li><a href="expenses.html">Expenses</a></li>--}}
                {{--                        <li><a href="taxes.html">Taxes</a></li>--}}
                {{--                        <li><a href="provident-fund.html">Provident Fund</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                <li class="submenu">--}}
                {{--                    <a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>--}}
                {{--                    <ul style="display: none;">--}}
                {{--                        <li><a href="salary.html"> Employee Salary </a></li>--}}
                {{--                        <li><a href="salary-view.html"> Payslip </a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}





                <li class="submenu">
                    <a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                    </ul>
                </li>
{{--                <li class="{{ Route::is('settings') ? 'active' : '' }}">--}}
{{--                    <a href="{{route('settings')}}"><i class="fa fa-cog"></i><span>Settings</span></a>--}}
{{--                </li>--}}



            </ul>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).on('click', 'ul li', function() {
        $(this).addClass('active').siblings().removeClass('active')
    })
</script>
