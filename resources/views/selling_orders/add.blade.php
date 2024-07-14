@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('selling_orders.store') }}" method="post">
               @csrf
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-5">
                           <h4 class="card-title">Add Selling Order</h4>
                        </div>

                        <div class="col-5 text-right">
                           <button type="button" class="btn btn-success btn-sm" title="Add New Product" id="add_item">
                              <i class="fa-solid fa-plus"></i>
                           </button>
                           <button type="button" class="btn btn-danger btn-sm" title="Remove Last Product" id="remove_product">
                              <i class="fa-solid fa-minus"></i>
                           </button>
                        </div>

                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('selling_orders.index') }}" class="btn btn-warning btn-md" title="Back">
                              <i class="fa-solid fa-right-from-bracket"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                        <div class="row">
                           
      
                           <div class="col-lg-6" id="items">
                              <div class="row">
                                 <div class="col-lg-6">
                                       <div class="mt-3 mt-lg-0">
                                          <div class="mb-3">
                                             <label class="form-label">Product</label>
                                             <select name="product[]" class="form-control product_name" required>
                                                <option value="" unit_price="">Select Product</option>
                                                @foreach ($product_dropdown as $product)
                                                   <option value="{{ $product->id }}" unit_price="{{ $product->unit_price }}">{{ $product->name }}</option>
                                                @endforeach
                                             </select>
                                          </div>

                                       </div>
                                 </div>

                                 <div class="col-lg-2">
                                    <div class="mt-3 mt-lg-0">
                                       
                                       <div class="mb-1">
                                          <label class="form-label">Price</label>
                                          <input type="text" class="form-control" name="price[]"  readonly>
                                       </div>

                                    </div>
                                 </div>

                                 <div class="col-lg-2">
                                    <div class="mt-3 mt-lg-0">

                                       <div class="mb-2">
                                          <label class="form-label">Quantity</label>
                                          <input type="text" class="form-control" name="quantity[]" id="quantity" required>
                                       </div>

                                    </div>
                                 </div>

                                 <div class="col-lg-2">
                                    <div class="mt-3 mt-lg-0">

                                       <div class="mb-2">
                                          <label class="form-label">Total</label>
                                          <input type="text" class="form-control" name="total[]" id="total" readonly>
                                       </div>

                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-lg-6">

                              <div class="mb-3">
                                 <label class="form-label">Customer</label>
                                 <select name="name" id="name" class="form-control">
                                    <option value="">Select Customer</option>
                                    @foreach ($customer_dropdown as $customer)
                                       <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                 </select>
                                 @error('name')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Sub Total</label>
                                 <input type="text" class="form-control" name="sub_total" id="sub_total" readonly>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Discount ( % )</label>
                                 <input type="text" class="form-control" name="discount" id="discount">
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Total Amount</label>
                                 <input type="text" class="form-control" name="total_amount" id="total_amount" readonly>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Payment Method</label>
                                 <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="">Select Method</option>
                                    @foreach ($payment_dropdown as $payment)
                                       <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                 </select>
                                 @error('payment_method')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
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

<div style="display: none" id="item_hidden_row">
   <div class="row">
      <div class="col-lg-6">
            <div class="mt-3 mt-lg-0">
               <div class="mb-3">
                  <label class="form-label"></label>
                  <select name="product[]" class="form-control product_name" required>
                     <option value="">Select Product</option>
                     @foreach ($product_dropdown as $product)
                        <option value="{{ $product->id }}" unit_price = "{{ $product->unit_price }}">{{ $product->name }}</option>
                     @endforeach
                  </select>
               </div>

            </div>
      </div>

      <div class="col-lg-2">
         <div class="mt-3 mt-lg-0">
            
            <div class="mb-1">
               <label class="form-label"></label>
               <input type="text" class="form-control" name="price[]" id="price" readonly>
            </div>

         </div>
      </div>

      <div class="col-lg-2">
         <div class="mt-3 mt-lg-0">

            <div class="mb-2">
               <label class="form-label"></label>
               <input type="text" class="form-control" name="quantity[]" id="quantity" required>
            </div>

         </div>
      </div>

      <div class="col-lg-2">
         <div class="mt-3 mt-lg-0">

            <div class="mb-2">
               <label class="form-label"></label>
               <input type="text" class="form-control" name="total[]" id="total" readonly>
            </div>

         </div>
      </div>
   </div>
</div>
@include('layout.footer')

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<script>
   $(document).ready(function() {
      $('#add_item').click(function() {
         $('#items').append($('#item_hidden_row').html());
      });

      $(document).on('change', '.product_name', function() {
         var product_price = $('option:selected', this).attr('unit_price');
         var $row = $(this).closest('.row');
         $row.find('input[name="price[]"]').val(product_price);

         var quantity = $row.find('input[name="quantity[]"]').val();
         var total = quantity * product_price;
         $row.find('input[name="total"]').val(total);

         calculateSubTotal();
      });

      $(document).on('input', 'input[name="quantity[]"]', function() {
         var quantity = $(this).val();
         var price = $(this).closest('.row').find('input[name="price[]"]').val();
         var total = quantity * price;
         $(this).closest('.row').find('input[name="total[]"]').val(total);
         calculateSubTotal();
      });

      $(document).on('keyup', 'input[name="discount"]', function() {
         calculateTotalAmount();
      });

      function calculateSubTotal() {
         var subTotal = 0;
         $('input[name="total[]"]').each(function() {
            subTotal += parseFloat($(this).val()) || 0;
         });
         $('input[name="sub_total"]').val(subTotal);
         calculateTotalAmount();
      }

      function calculateTotalAmount() {
         var subTotal = parseFloat($('input[name="sub_total"]').val()) || 0;
         var discount = parseFloat($('input[name="discount"]').val()) || 0;
         // var totalAmount = subTotal - discount;
         var totalAmount = subTotal - (subTotal * (discount / 100));
         $('input[name="total_amount"]').val(totalAmount.toFixed(2));
      }

      $('#remove_product').click(function() {
         var lastItem = $('#items .row').last();
         if (lastItem.length) {
            lastItem.remove();
            calculateSubTotal();
         }
      });
   });
</script>