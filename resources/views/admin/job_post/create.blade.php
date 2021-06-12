@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('public/assets/vendors/select2/select2.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('public/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('public/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" /> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #727cf5;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 3px
}
</style>

@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">JOB FORM</li>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">JOB FORM</h6>
                    @include('flash::message')

                    <form class="forms-sample" action="{{ route('jobs.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Job title:</label>
                                <input class="form-control mb-4 mb-md-0 @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Job title" />
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Job description:</label>
                                <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job skills:</label>
                                    <select class="js-example-basic-multiple w-100 @error('job_skills') is-invalid @enderror" multiple="multiple" data-width="100%" name="job_skills[]">
                                        @foreach ($jobSkills as $key => $value)
                                        <option value="{{$key}}"  {{in_array($key, old("job_skills") ?: []) ? "selected": ""}}
                                        >{{$value}}</option>
                                        @endforeach
                                    </select>
                                     @error('job_skills')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Career level:</label>
                                <input type="text" class="form-control @error('career_level') is-invalid @enderror" data-width="100%" name="career_level" value="{{ old('career_level') }}">
                                 @error('career_level')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <div class="col-md-6">
                                <label>CTC:</label>
                                <input class="form-control mb-4 mb-md-0 @error('ctc') is-invalid @enderror" name="ctc" value="{{ old('ctc') }}" placeholder="CTC" />
                                @error('ctc')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label>Salary:</label>
                                <input class="form-control mb-4 mb-md-0 @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" placeholder="Salary" />
                                @error('salary')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Job Type:</label>
                                <select class="form-control @error('job_type_id') is-invalid @enderror" data-width="100%" name="job_type_id" id="job_type_id">
                                    <option value="">Select Job Type</option>
                                    @foreach ($jobTypes as $key => $value)
                                    <option value="{{$key}}" {{ old('job_type_id') == $key ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                    @error('job_type_id')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Job Shift:</label>
                                <select class="form-control @error('job_shift_id') is-invalid @enderror" data-width="100%" name="job_shift_id">
                                    <option value="">Select Job Shift</option>
                                    @foreach ($jobShifts as $key => $value)
                                    <option value="{{$key}}" {{ old('job_shift_id') == $key ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('job_shift_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Gender:</label>
                                <select class="form-control @error('gender') is-invalid @enderror" data-width="100%" name="gender">
                                    <option value="">Select Gender</option>
                                   <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Job expiry date:</label>
                                <input class="form-control @error('expiry_date') is-invalid @enderror" type="date" name="expiry_date" value="{{ old('expiry_date') }}"/>
                                @error('expiry_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Degree Level:</label>
                                <select class="form-control @error('degree_level') is-invalid @enderror" data-width="100%" name="degree_level">
                                    <option value="">Select Degree</option>
                                    @foreach ($degreeLevels as $key => $value)
                                    <option value="{{$key}}" {{ old('degree_level') == $key ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('degree_level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>job experience:</label>
                                <input type="text" class="form-control @error('job_experience') is-invalid @enderror" name="job_experience" value="{{ old('job_experience') }}">
                                @error('job_experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Contact Us:</label>
                                <input type="text" class="form-control @error('contact_us') is-invalid @enderror" name="contact_us" value="{{ old('contact_us') }}">
                                @error('contact_us')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div><button type="submit" class="btn btn-primary">Submit</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('plugin-scripts')
    <script src="{{ asset('public/assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/select2/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('public/assets/vendors/typeahead-js/typeahead.bundle.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('public/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script> --}}
@endpush

@push('custom-scripts')
    {{-- <script src="{{ asset('public/assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('public/assets/js/inputmask.js') }}"></script> --}}
    <script src="{{ asset('public/assets/js/select2.js') }}"></script>
    {{-- <script src="{{ asset('public/assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('public/assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('public/assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('public/assets/js/dropify.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('public/assets/js/datepicker.js') }}"></script> --}}
    <script src="{{ asset('public/assets/js/tinymce.js') }}"></script>
@endpush
