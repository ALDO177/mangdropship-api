@extends('Main')

@section('bodys')
    <div class="container d-flex justify-content-center mt-3">
        <div class="col-lg-6 col-md-10 col-sm-12">
            <img class="mx-auto d-block mb-2" src="{{ Storage::disk('mang-img')->url('logo-alter-ligth.png') }}" height="45px" alt="">
            <h4 class="text-center text-white mb-4">{{ __('messages.web_message_reset_password') }}</h4>
            <div class="card shadow-sm">
                <div class="card-body">
                  <h4 class="card-title text-center mb-4">{{ __('messages.info_reset_pwd') }}</h4>
                  <p class="card-text">{{ __('messages.text_info_reset_pass') }}</p>
                   <div class="text-center mb-3">
                        <button class="btn btn-success">Reset Your Password</button>
                   </div>
                   <p>{{ __('messages.warning_rest_pass') }}...</p>
                   <div>
                      <p>Terima Kasih</p>
                      <p>The Mangdropship Teams</p>
                   </div>
                </div>
              </div>
              <p class="text-center mt-4 text-white">Anda menerima email ini karena permintaan penyetelan ulang sandi untuk akun Anda.</p>
              <p class="text-center text-white">Mangdropship Teams</p>
        </div>
    </div>
@endsection