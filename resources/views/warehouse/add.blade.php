@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('warehouse.store') }}" method="post">
               @csrf
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Add Warehouse</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('warehouse.index') }}" class="btn btn-warning btn-md" title="Back">
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
                                 <input type="text" class="form-control" name="name" id="name" placeholder="Warehouse Name">
                                 @error('name')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Capacity</label>
                                 <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Warehouse Capacity">
                                 @error('capacity')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Address</label>
                                 <input type="text" class="form-control" name="address" id="address" placeholder="Warehouse Address">
                                 @error('address')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
                              </div>


                           </div>
      
                           <div class="col-lg-6">
                                 <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                       <label class="form-label">City</label>
                                       <select name="city" id="city" class="form-control">
                                          <option value="">Select City</option>
                                          @foreach ($city_dropdown as $city)
                                             <option value="{{ $city->id }}">{{ $city->name }}</option>
                                          @endforeach
                                       </select>
                                       @error('city')
                                          <div class="text-danger"> {{ $message}}</div>
                                       @enderror
                                    </div>

                                    <div class="mb-3">
                                       <label class="form-label">Area</label>
                                       <select name="area" id="area" class="form-control">
                                          <option value="">Select Area</option>
                                          @foreach ($area_dropdown as $area)
                                             <option value="{{ $area->id }}">{{ $area->name }}</option>
                                          @endforeach
                                       </select>
                                       @error('area')
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

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
   $(document).ready(function() {
      var CSRF_TOKEN = $('input[name="_token"]').val();
      $('#city').on('change', function() {
         var $area = $('#area');
         $.ajax({
            url:  "{{ route('getarea') }}",
            type: 'POST',
            data: {
               city: $(this).val(),
               _token: CSRF_TOKEN, 
            },
            success: function (data) {
               $area.html('<option value="" selected>Choose Area</option>');
               $.each(data, function(id, value){
                  $area.append('<option value="'+ value.id +'">'+ value.name +'</option>');
               });
            }
      });
      });
      $('#area').val("");
      // $('#state').removeClass('d-none');
   });
</script>