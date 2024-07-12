@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('products.store') }}" method="post">
               @csrf
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Add Product</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('products.index') }}" class="btn btn-warning btn-md" title="Back">
                              <i class="fa-solid fa-right-from-bracket"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="mb-3">
                                 <label class="form-label">Name</label>
                                 <input type="text" class="form-control" name="name" id="name" required>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Category</label>
                                 <select name="category_id" id="category" class="form-control" required>
                                    <option value="" >Select Category</option>
                                    @foreach ($category_dropdown as $category)
                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                 </select>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Brands</label>
                                 <select name="brand_id" id="brand" class="form-control" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brand_dropdown as $brand)
                                       <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                 </select>
                              </div>

                           </div>
      
                           <div class="col-lg-6">
                                 <div class="mt-3 mt-lg-0">

                                    <div class="mb-3">
                                       <label class="form-label">Price</label>
                                       <input type="text" class="form-control" name="unit_price" id="price" required>
                                    </div>

                                    <div class="mb-3">
                                       <label class="form-label">Suppliers</label>
                                       <select name="supplier_id" id="supplier" class="form-control" required>
                                          <option value="">Select Suppliers</option>
                                          @foreach ($supplier_dropdown as $supplier)
                                             <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                          @endforeach
                                       </select>
                                    </div>

                                    <div class="mb-3">
                                       <label class="form-label">Quantity</label>
                                       <input type="text" class="form-control" name="stock_quantity" id="quantity" required>
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