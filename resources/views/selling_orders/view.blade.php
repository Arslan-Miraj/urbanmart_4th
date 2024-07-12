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
                        <h4 class="card-title">Selling Order Detail</h4>
                     </div>
                     <div class="col-2 text-right">
                        <a href="{{ route('selling_orders.index')}}" class="btn btn-warning btn-md" title="Back">
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
                              <th>Customer</th>
                              <td>{{ $view->getCustomer->name }}</td>
                           </tr>
                           <tr>
                              <th>Sale Date</th>
                              <td>{{ $view->sale_date }}</td>
                           </tr>
                           <tr>
                              <th>Sub Total</th>
                              <td>{{ $view->sub_total }}</td>
                           </tr>
                           <tr>
                              <th>Discount ( % )</th>
                              <td>{{ $view->discount }}</td>
                           </tr>
                           <tr>
                              <th>Grand Amount</th>
                              <td>{{ $view->total_amount }}</td>
                           </tr>
                           <tr>
                              <th>Payment Method</th>
                              <td>{{ $view->getPaymentMethod->name }}</td>
                           </tr>
                           {{-- <tr>
                              <th>Products</th>
                              @foreach ($view->getSaleItems as $v)
                                 <td>{{ $v->product_id }} , </td>
                              @endforeach
                           </tr> --}}
                        </thead>
                     </table>
                  </div>
               </div>

               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Total</th> 
                           </tr>
                              @foreach ($products as $v)
                              <tr>
                                 <td>{{ $v->getProduct->name }}</td>
                                 <td>{{ $v->quantity }}</td>
                                 <td>{{ $v->price }}</td>
                                 <td>{{ $v->total }}</td>
                              </tr>
                              @endforeach
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