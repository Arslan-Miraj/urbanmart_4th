@include('layout.header')
<div class="vertical-menu">
    <div class="navbar-brand-box">
       <a href="{{ route('selling_orders.index') }}" class="logo logo-light">
       <span class="logo-lg">
       <img src="/assets/images/logo.png" alt="" height="50" width="150">
       </span>
       </a>
    </div>
    <div data-simplebar class="sidebar-menu-scroll">

       <div id="sidebar-menu">
          <ul class="metismenu list-unstyled" id="side-menu">
             <li>
                <a href="{{ route('products.index')}}">
                <i class="fa-solid fa-basket-shopping"></i>
                <span class="menu-item" data-key="t-dashboards">Products</span>
                </a>
             </li>
             <li>
               <a href="{{ route('categories.index') }}">
               <i class="fa-solid fa-list"></i>
               <span class="menu-item" data-key="t-dashboards">Categories</span>
               </a>
            </li>
            <li>
               <a href="{{ route('brands.index') }}">
                  <i class="fa-brands fa-font-awesome"></i>
               <span class="menu-item" data-key="t-dashboards">Brands</span>
               </a>
            </li>
            <li>
               <a href="{{ route('areas.index') }}">
                  <i class="fa-solid fa-road"></i>
               <span class="menu-item" data-key="t-dashboards">Areas</span>
               </a>
            </li>
            <li>
               <a href="{{ route('cities.index') }}">
                  <i class="fa-solid fa-city"></i>
               <span class="menu-item" data-key="t-dashboards">Cities</span>
               </a>
            </li>
            {{-- <li>
               <a href="">
               <span class="menu-item" data-key="t-dashboards">Combo Products</span>
               </a>
            </li> --}}
            <li>
               <a href="{{ route('inventory.index') }}">
                  <i class="fa-solid fa-boxes-stacked"></i>
               <span class="menu-item" data-key="t-dashboards">Inventory</span>
               </a>
            </li>
            <li>
               <a href="{{ route('payment_types.index') }}">
                  <i class="fa-solid fa-money-bill-wave"></i>
               <span class="menu-item" data-key="t-dashboards">Payment Types</span>
               </a>
            </li>
            <li>
               <a href="{{ route('customers.index') }}">
                  <i class="fa-solid fa-person-circle-plus"></i>
               <span class="menu-item" data-key="t-dashboards">Customers</span>
               </a>
            </li>
            <li>
               <a href="{{ route('purchasing_orders.index') }}">
                  <i class="fa-solid fa-dolly"></i>
               <span class="menu-item" data-key="t-dashboards">Purchasing Orders</span>
               </a>
            </li>
            <li>
               <a href="{{ route('roles.index') }}">
                  <i class="fa-solid fa-user"></i>
               <span class="menu-item" data-key="t-dashboards">Roles</span>
               </a>
            </li>
            <li>
               <a href="{{ route('staff_members.index') }}">
                  <i class="fa-solid fa-clipboard-user"></i>
               <span class="menu-item" data-key="t-dashboards">Staff Members</span>
               </a>
            </li>
            <li>
               <a href="{{ route('selling_orders.index') }}">
                  <i class="fa-solid fa-hand-holding-dollar"></i>
               <span class="menu-item" data-key="t-dashboards">Selling Orders</span>
               </a>
            </li>
            {{-- <li>
               <a href="">
                  <i class="fa-solid fa-clipboard"></i>
               <span class="menu-item" data-key="t-dashboards">Sell Items</span>
               </a>
            </li> --}}
            <li>
               <a href="{{ route('suppliers.index')}}">
                  <i class="fa-solid fa-people-carry-box"></i>
               <span class="menu-item" data-key="t-dashboards">Suppliers</span>
               </a>
            </li>
            
            <li>
               <a href="{{ route('warehouse.index')}}">
                  <i class="fa-solid fa-warehouse"></i>
               <span class="menu-item" data-key="t-dashboards">Warehouses</span>
               </a>
          </ul>
       </div>
       <div class="p-3 px-4 sidebar-footer">
          <p class="mb-1 main-title">
             <script>document.write(new Date().getFullYear())</script> &copy; UrbanMart.
          </p>
          <p class="mb-0">Designed & Developed by TetraObject</p>
       </div>
    </div>
 </div>