@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <form action="{{ route('categories.update', $data->id) }}" method="post">
               @csrf
               @method('PUT')
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-10">
                           <h4 class="card-title">Update Category</h4>
                        </div>
                        <div class="col-2 text-right">
                           <input type="submit" class="btn btn-dark btn-md" id="save" value="Save">
                           <a href="{{ route('categories.index') }}" class="btn btn-warning btn-nd" title="Back"> 
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
                                 <input type="text" class="form-control" name="name" id="name" value="{{ $data->name}}">
                                 @error('name')
                                    <div class="text-danger"> {{ $message}}</div>
                                 @enderror
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
