@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('inventory.update', $data->id) }}" method="post">
               @csrf
               @method('PUT')
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Update Inventory</h4>
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
                                 <select name="warehouse" id="warehouse" class="form-control">
                                    <option value="">Select Warehouse</option>
                                    @foreach ($warehouse_dropdown as $warehouse)
                                       <option value="{{ $warehouse->id }}" @if ($warehouse->id == $data->warehouse_id) selected @endif>
                                          {{ $warehouse->name }}
                                       </option>
                                    @endforeach
                                 </select>
                                 @error('warehouse')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Stock Quantity</label>
                                 <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" value="{{ $data->stock_quantity}}">
                                 @error('stock_quantity')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
                              </div>

                           </div>
      
                           <div class="col-lg-6">
                                 <div class="mt-3 mt-lg-0">

                                    <div class="mb-3">
                                       <label class="form-label">Products</label>
                                       <select name="product" id="product" class="form-control">
                                          <option value="">Select Products</option>
                                          @foreach ($product_dropdown as $product)
                                             <option value="{{ $product->id }}" @if ($product->id == $data->product_id) selected @endif>
                                                {{ $product->name }}
                                             </option>
                                          @endforeach
                                       </select>
                                       @error('product')
                                          <div class="text-danger"> {{ $message}}</div>
                                       @enderror
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
