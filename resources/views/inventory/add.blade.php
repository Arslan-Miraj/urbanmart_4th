@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('inventory.store') }}" method="post">
               @csrf
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Add Inventory</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('inventory.index') }}" class="btn btn-warning btn-md" title="Back">
                              <i class="fa-solid fa-right-from-bracket"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">

                              <div class="mb-3">
                                 <label class="form-label">Warehouse</label>
                                 <select name="warehouse" id="warehouse" class="form-control" required>
                                    <option value="">Select Warehouse</option>
                                    @foreach ($warehouse_dropdown as $warehouse)
                                       <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                 </select>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Stock Quantity</label>
                                 <input type="text" class="form-control" name="stock_quantity" id="quantity" required>
                              </div>

                           </div>
      
                           <div class="col-lg-6">
                                 <div class="mt-3 mt-lg-0">

                                    <div class="mb-3">
                                       <label class="form-label">Product</label>
                                       <select name="product" id="product" class="form-control" required>
                                          <option value="">Select Product</option>
                                          @foreach ($product_dropdown as $product)
                                             <option value="{{ $product->id }}">{{ $product->name }}</option>
                                          @endforeach
                                       </select>
                                    </div>

                                 </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </form>
         </div>
      </div>
   </div>
</div>

@include('layout.footer')
{{-- <script>
   $("#save").click(function(e)
   {
      e.preventDefault();
      const category = $("#category:selected").val();

      $.ajax({
         url:"{{route('form_for_private_sellers')}}",
         method:"POST",
         data:{category},
         success:function(result)
         {
               console.log('all done');
         }
      });
   });
</script> --}}