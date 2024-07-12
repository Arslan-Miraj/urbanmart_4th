@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('customers.update', $customers->id) }}" method="post">
               @csrf
               @method('PUT')
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Update Customer</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('customers.index') }}" class="btn btn-warning btn-md" title="Back">
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
                                 <input type="text" class="form-control" name="name" id="name" value="{{ $customers->name}}" required>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">City</label>
                                 <select name="city" id="city" class="form-control" required>
                                    <option value="{{ $customers->getCity->id }}">{{ $customers->getCity->name }}</option>
                                    @foreach ($city_dropdown as $city)
                                       <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                 </select>
                              </div>

                              <div class="mb-3">
                                 <label class="form-label">Address</label>
                                 <input type="text" class="form-control" name="address" id="address" value="{{ $customers->address}}" required>
                              </div>

                           </div>
      
                           <div class="col-lg-6">
                                 <div class="mt-3 mt-lg-0">

                                    <div class="mb-3">
                                       <label class="form-label">Email</label>
                                       <input type="text" class="form-control" name="email" id="email" value="{{ $customers->email }}" required>
                                    </div>

                                    <div class="mb-3">
                                       <label class="form-label">Contact</label>
                                       <input type="tel" class="form-control" name="contact" id="contact" value="{{ $customers->phone_number }}" required>
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
