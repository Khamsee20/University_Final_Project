{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.register_layout')

@section('content')
<main class="main-content  mt-0">
    <section >
        <div class="page-header min-vh-100">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                <div class="card card-plain">
                  <div class="card-header pb-0 text-center">
                    <h3 class="font-weight-bolder">ລົງທະບຽນບັນຊີໃໝ່</h3>
                    <p class="mb-0">ປ້ອນຂໍ້ມູນຂອງທ່ານໃສ່ດ້ານລຸ່ມເພື່ອລົງທະບຽນ</p>
                  </div>


                  <div class="card-body">
                    <form role="form"  method="POST" action="{{ route('register') }}">
                    @csrf

                      <div class="mb-3">
                       {{-- <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email"> --}} 
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ປ້ອນຊື່ຂອງທ່ານ...">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>

                      <div class="mb-3">
                        {{-- <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email"> --}} 
                         <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('Lname') }}" required autocomplete="lname" autofocus placeholder="ປ້ອນນາມສະກຸນຂອງທ່ານ ...">
 
                                 @error('lname')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                       </div>

                       <div class="mb-3">
                        {{-- <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email"> --}} 
                        <div class="text">
                            <select  name="gender" class="textdorm w-100 py-2" placeholder="ກະລຸນາເລືອກສະຖານະ">
                                <option disabled selected style="color: red;" value=""> ກະລຸນາເລືອກເພດ </option>
                                <option  style="color:#0fa034; pl-5" value="ຊາຍ">ຊາຍ</option>
                                <option  style="color:#0fa034; pl-5" value="ຍິງ">ຍິງ</option>
                                <option  style="color:#0fa034; pl-5" value="ບໍ່ໃຊ້ເພດ">ບໍ່ໃຊ້ເພດ</option>
                            </select>
                        </div>
                                 @error('gender')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                       </div>

                      <div class="mb-3">
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ປ້ອນອີເມວຂອງທ່ານ...">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>


                      <div class="mb-3">
                        {{-- <input type="email" class="form-control form-control-lg" placeholder="Password" aria-label="Password"> --}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="ຕັ້ງລະຫັດຜ່ານ...">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>


                      <div class="mb-3">
                        {{-- <input type="email" class="form-control form-control-lg" placeholder="Password" aria-label="Password"> --}}
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="ຢື້ນຢັນລະຫັດຜ່ານ">
                      </div>



                      <div class="text-center">
                        {{-- <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button> --}}

                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">
                            {{ ('ລົງທະບຽນ') }}
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}

                      </div>
                    </form>

                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      ຖ້າທ່ານມີບັນຊີຢູ່ແລ້ວ : 
                      <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">ເຂົ້າສູ່ລະບົບ</a>
                      
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('/assets/img/home-decor-3.jpg');
            background-size: cover;">
                  <span class="mask bg-gradient-primary opacity-6"></span>
                  <h4 class="mt-5 text-white font-weight-bolder position-relative"></h4>
                  <p class="text-white position-relative"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </main>
@endsection
