
@extends('Main')

@section('bodys')
      <div class="d-flex justify-content-center mt-4 align-items-center" style="height: 90vh;">
        <div class="card border-0 shadow-lg" style="width: 25rem;">
            <img src="https://mangdropship-v2.oss-ap-southeast-5.aliyuncs.com/storage/undraw_secure_login_pdn4.svg" class="card-img-top" alt="...">
            <div class="card-body text-center p-4">
              <h4 class="card-title fw-700 text-info">Please Verify Your Email..</h4>
              @if (session('resent'))
                <div class="alert alert-success p-2" role="alert">
                    A fresh verification link has been sent to your email address.
                </div>
              @endif
             <div class="alert alert-warning p-2 mt-3" role="alert">
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam aspernatur magnam commodi, maiores quae officiis incidunt pariatur itaque nisi amet!
             </div>
             <a href="{{ $route }}" class="text-decoration-none btn btn-info text-white">Verify Your Account</a>
        </div>
    </div>
@endsection