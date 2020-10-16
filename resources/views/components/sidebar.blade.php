      <!--Start sidebar-wrapper-->
      <div
        id="sidebar-wrapper"
        data-simplebar=""
        data-simplebar-auto-hide="true"
      >
        <div class="brand-logo">
          <a href="{{URL::to('/home')}}">
            <img
              src="{{asset('assets/images/logo-icon.png')}}"
              class="logo-icon"
              alt="logo icon"
            />
            <h5 class="logo-text">Suprimo GMS Admin</h5>
          </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
          <li class="sidebar-header">MAIN NAVIGATION</li>
          <li>
            <a href="{{URL::to('/home')}}" class="waves-effect">
              <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          {{-- Buyers Related All options --}}
          @if (Auth::user()->role_id == "1" || Auth::user()->role_id == "2" || Auth::user()->role_id == "3")
          <li>
            <a href="javaScript:void();" class="waves-effect">
              <i class="fa fa-users"></i> <span>Buyers</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="{{route('buyers.index')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i> 
                  Manage Buyers
                </a>
              </li>
              <li>
                <a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Reports <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Monthly</a></li>
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Annually</a></li>
                </ul>
              </li>
            </ul>
          </li>
          @endif
          {{-- Suppliers --}}
          @if (Auth::user()->role_id == "1" || Auth::user()->role_id == "2" || Auth::user()->role_id == "3")
          <li>
            <a href="javaScript:void();" class="waves-effect">
              <i class="fa fa-users"></i> <span>Suppliers</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="{{route('suppliers.index')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i> 
                  Manage Suppliers
                </a>
              </li>
              <li>
                <a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Reports <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Monthly</a></li>
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Annually</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <hr>
          @endif
          {{-- Sample --}}
          @if (Auth::user()->role_id == "1" || Auth::user()->role_id == "2" || Auth::user()->role_id == "3" || Auth::user()->role_id == "4")
          <li class="sidebar-header">Sample</li>
          <li>
            <a href="javaScript:void();" class="waves-effect">
              <i class="zmdi zmdi-view-comfy"></i><span>Samples</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="{{route('products.index')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i>
                  Sample Products
                </a>
              </li>
              <li>
                <a href="{{route('samples.create')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i>
                  Create Sample
                </a>
              </li>
              <li>
                <a href="{{route('samples.index')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i> 
                  Manage Sample
                </a>
              </li>
            </ul>
          </li>
          @endif
          {{-- BOM --}}
          @if (Auth::user()->role_id == "1" || Auth::user()->role_id == "2" || Auth::user()->role_id == "3" || Auth::user()->role_id == "4")
          <li>
            <a href="javaScript:void();" class="waves-effect">
              <i class="fa fa-file-text-o"></i> <span>Bill of Materials</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="{{route('view.bom')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i> 
                  Create BOM
                </a>
              </li>
              <li>
                <a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Reports <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Monthly</a></li>
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Annually</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <hr>
          @endif
          {{-- All order realted options --}}
          @if (Auth::user()->role_id == "1" || Auth::user()->role_id == "2" || Auth::user()->role_id == "3" || Auth::user()->role_id == "4")
          <li>
            <a href="javaScript:void();" class="waves-effect">
              <i class="fa fa-archive"></i> <span>Orders</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="{{route('orders.create')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i> 
                  Create Order
                </a>
              </li>
              <li>
                <a href="{{route('orders.index')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i> 
                  Manage Order
                </a>
              </li>
              <li>
                <a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Reports <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Monthly</a></li>
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Annually</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <hr>
          @endif
          {{-- Inventory --}}
          @if (Auth::user()->role_id == "1" || Auth::user()->role_id == "2" || Auth::user()->role_id == "3" || Auth::user()->role_id == "8")
          <li class="sidebar-header">Inventory & Production</li>
          <li>
            <a href="{{route('trims')}}" class="waves-effect">
              <i class="zmdi zmdi-view-compact"></i> <span>Manage Trims</span>
            </a>
          </li>
          <li>
            <a href="{{route('trims.dispatch')}}">
              <i class="zmdi zmdi-widgets"></i> 
              Dispatch Trims
            </a>
          </li>
          <li>
            <a href="{{route('stocks')}}">
              <i class="fa fa-th"></i> 
              Stock
            </a>
          </li>
          {{-- Production --}}
          <li>
            <a href="{{route('productions')}}" class="waves-effect">
              <i class="fa fa-th-large" aria-hidden="true"></i> <span>Production Tracking</span>
            </a>
          </li>
          <li>
            <a href="{{route('productions.list')}}" class="waves-effect">
              <i class="fa fa-list" aria-hidden="true"></i> <span>Production List</span>
            </a>
          </li>
          @endif
          {{-- All HR Related Options --}}
          @if (Auth::user()->role_id == "1" || Auth::user()->role_id == "2" || Auth::user()->role_id == "3")
          <li class="sidebar-header">Human Resource</li>
          <li>
            <a href="javaScript:void();" class="waves-effect">
              <i class="fa fa-user"></i> <span>Users</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="{{route('users.index')}}">
                  <i class="zmdi zmdi-long-arrow-right"></i> 
                  Manage Users
                </a>
              </li>
              <li>
                <a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i> Reports <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Monthly</a></li>
                  <li><a href="javaScript:void();"><i class="zmdi zmdi-long-arrow-right"></i>Annually</a></li>
                </ul>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
      <!--End sidebar-wrapper-->