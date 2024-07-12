@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('suppliers.store') }}" method="post">
               @csrf
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Add Supplier</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('suppliers.index') }}" class="btn btn-warning btn-md" title="Back">
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
                                 <input type="text" class="form-control" name="name" id="name" value="" placeholder="Supplier Name">
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Contact</label>
                                 <input type="tel" class="form-control" name="contact" id="contact" value="" placeholder="Phone No">
                              </div>
                           </div>
      
                           <div class="col-lg-6">
                                 <div class="mt-3 mt-lg-0">

                                    <div class="mb-3">
                                       <label class="form-label">Email</label>
                                       <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>

                                    <div class="mb-3">
                                       <label class="form-label">City</label>
                                       <select name="city" id="city" class="form-control">
                                          <option value="">Select City</option>
                                          @foreach ($city_dropdown as $city)
                                             <option value="{{ $city->id }}">{{ $city->name }}</option>
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
