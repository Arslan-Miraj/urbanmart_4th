@include('layout.header')
@include('layout.sidebar')

<!-- ============== Start right Content here ============== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-10">
                        <h4 class="card-title">Areas Table</h4>
                     </div>
                     <div class="col-2 text-right">
                        <a href="{{ route('areas.create')}}" class="btn btn-dark btn-md" title="Add New">
                           <i class="fa-solid fa-plus"></i> New
                        </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">

                  <div class="table-responsive">
                     <table class="table mb-0">
                        <thead>
                           <tr>
                              <th>Sr</th>
                              <th>Name</th>
                              <th>City</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $dt)
                           <tr>
                              <th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}</th>
                              <td>{{ $dt->name }}</td>
                              <td>{{ $dt->getCity->name }}</td>
                              <td>
                                 <a href="{{ route('areas.show', $dt->id )}}" class="btn btn-primary btn-sm" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                 </a>
                                 <a href="{{ route('areas.edit', $dt->id )}}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                 </a>
                                 <form action="{{ route('areas.destroy', $dt->id )}}" method="post" style="display: contents">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Delete">
                                       <i class="fa-solid fa-trash"></i>
                                    </button>
                                 </form>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <div class="mt-3">
                        {{ $data->links() }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('layout.footer')