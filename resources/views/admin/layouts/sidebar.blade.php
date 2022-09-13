
<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('public/backend/assets/images/carimage3.jpg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Learn Driving</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Tutorials</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.category') }}"><i class="bx bx-right-arrow-alt"></i>Category</a>
                </li>
                <li> <a href="{{ route('create.tutorial') }}"><i class="bx bx-right-arrow-alt"></i>Add tutorial</a>
                </li>
                <li> <a href="{{ route('index.tutorial') }}"><i class="bx bx-right-arrow-alt"></i>All tutorial</a>
                </li>
                <li> <a href="{{ route('deactive.tutorial.list') }}"><i class="bx bx-right-arrow-alt"></i>Deactive tutorial List</a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href="{{ route('setting') }}" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Setting</div>
            </a>
        </li> --}}
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->