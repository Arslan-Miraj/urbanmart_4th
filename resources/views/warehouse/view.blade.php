@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-10">
                        <h4 class="card-title">Warehouse Detail</h4>
                     </div>
                     <div class="col-2 text-right">
                        <a href="{{ route('warehouse.index')}}" class="btn btn-warning btn-md" title="Back">
                           <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th>Sr</th>
                              <td>{{ $view->id }}</td>
                           </tr>
                           <tr>
                              <th>Name</th>
                              <td>{{ $view->name }}</td>
                           </tr>
                           <tr>
                              <th>Capacity</th>
                              <td>{{ $view->capacity }}</td>
                           </tr>
                           <tr>
                              <th>City</th>
                              <td>{{ $view->getCity->name }}</td>
                           </tr>
                           <tr>
                              <th>Area</th>
                              <td>{{ $view->getArea->name }}</td>
                           </tr>
                           <tr>
                              <th>Address</th>
                              <td>{{ $view->address }}</td>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('layout.footer')