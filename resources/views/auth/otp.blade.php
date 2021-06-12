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
                                <a href="#"
                                    class="noble-ui-logo d-block mb-2">{{ __('Digital') }}<span>{{ __('CV') }}</span></a>
                                <h5 class="text-muted font-weight-normal mb-4">
                                    {{ __('Welcome back! Verify OTP.') }}</h5>
                                <form class="forms-sample" method="POST" action="{{ route('verifyOtp') }}">
                                    @csrf
                                    @include('flash::message')

                                    <div class="form-group">
                                        <label for="otp">{{ __('Enter Verification Code') }} {{ session('rand_no') }}</label>
                                        <input id="otp" type="number"
                                            class="form-control @error('otp') is-invalid @enderror" name="otp"
                                            value="{{ old('otp') }}" required autocomplete="otp" autofocus>

                                        @error('otp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-3">

                                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">
                                            {{ __('Verify Code') }}
                                        </button>

                                    </div>
                                    <a href="{{ route('resendOtp') }}"
                                        class="d-block mt-3 text-muted">{{ __('Not getting otp? Resend') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
