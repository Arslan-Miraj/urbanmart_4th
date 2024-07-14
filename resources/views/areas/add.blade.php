@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('areas.store') }}" method="post">
               @csrf
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Add Area</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('areas.index') }}" class="btn btn-warning btn-md">
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
                                 <input type="text" class="form-control" name="name" id="name" placeholder="Area Name">
                                 @error('name')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
                              </div>

                           </div>

                           <div class="col-lg-6">
                              
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
