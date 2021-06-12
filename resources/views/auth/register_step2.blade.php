@extends('layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pr-md-0">
                            <div class="auth-left-wrapper"
                                style="background-image: url({{ asset('public/assets/images/carousel/img6.jpg') }})">
                            </div>
                        </div>
                        <div class="col-md-8 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">Digital<span>CV</span></a>
                                <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
                                <form class="forms-sample" method="POST" action="{{ route('register.step2') }}">
                                    @csrf
                                    @include('flash::message')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
                                            </div>
                                        </div>

                                         <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Company name</label>
                                                <input type="text" class="form-control" name="company_name" placeholder="Enter company name">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Designation in company</label>
                                                <input type="text" class="form-control" name="designation" placeholder="Enter designation in compan">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Company registered address</label>
                                                <textarea class="form-control" name="address" rows="2" placeholder="Enter company registered address"></textarea>
                                            </div>
                                        </div>

                                         <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0" value="Sing up">
                                        </div>


                                        <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user?
                                            Sign in</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
