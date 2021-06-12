@extends('layout.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">JOB FORM</li>
        </ol>
    </nav>


    <div class="row">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
                                @include('flash::message')

                                <a href="{{ route('jobs.create') }}" class="btn btn-primary float-right">Create Job</a>
                                <div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Sr. No</th>
												<th>Title</th>
												<th>Job Experience</th>
												<th>Salary</th>
												<th>Expiry date</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($posts as $item)
											<tr>
                                                <td>{{ $loop->iteration }}</td>
												{{-- <td class="py-1">
													<img src="../../../assets/images/faces/face1.jpg" alt="image">
												</td> --}}
												<td><a href="{{ route('jobs.edit', ['job' => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit Job Post">{{ $item->title }}</a></td>
												<td>{{ $item->job_experience }}</td>
                                                <td>{{ $item->salary }}</td>
                                                <td>{{ $item->expiry_date }}</td>
                                                <td>

                                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-trash" ></i>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5>Are you sure want to delete?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <form action="{{ route('jobs.destroy', ['job' =>  $item->id ]) }}" method="POST">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Yes ! Delete it</button>

      </div>
    </div>
  </div>
</div>


                                                </td>

											</tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>


@endsection
