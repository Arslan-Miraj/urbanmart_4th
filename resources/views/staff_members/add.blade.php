@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('staff_members.store') }}" method="post">
               @csrf
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Add Staff Member</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('staff_members.index') }}" class="btn btn-warning btn-md" title="Back">
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
                                 <input type="text" class="form-control" name="name" id="name" placeholder="Staff Member Name" required>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Email</label>
                                 <input type="email" class="form-control" name="email" id="email" placeholder="Staff Member Email" required>
                              </div>

                           </div>
      
                           <div class="col-lg-6">
                                 <div class="mt-3 mt-lg-0">

                                    <div class="mb-3">
                                       <label class="form-label">Contact</label>
                                       <input type="tel" class="form-control" name="contact" id="contact" placeholder="Staff Member Contact" required>
                                    </div>

                                    <div class="mb-3">
                                       <label class="form-label">Role</label>
                                       <select name="role" id="role" class="form-control" required>
                                          <option value="">Select Role</option>
                                          @foreach ($role_dropdown as $role)
                                             <option value="{{ $role->id }}">{{ $role->name }}</option>
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