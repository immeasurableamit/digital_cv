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
                                <form class="forms-sample" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="Enter first name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="Enter last name">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Email address</label>
                                                <input type="text" class="form-control" name="email"
                                                    placeholder="Enter email address">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input id="password" type="password" class="form-control"
                                                    placeholder="Enter password" name="password" required
                                                    autocomplete="new-password">

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Confirm Password</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" placeholder="Enter confirm Password"
                                                    required autocomplete="new-password">
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0"
                                                    value="Sing up">
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
