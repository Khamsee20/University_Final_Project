{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <H1>Admin</H1>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.member-layout')

@section('content')

<div class="container-fluid ">

  <div class="card shadow-lg m-auto my-2 card-profile-bottom py-5">
  <div class="card-body p-2">
    <div class="row gx-4">
      <div class="col-auto">
        {{-- <div class="avatar avatar-xl position-relative">
          <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div> --}}
      </div>
      <div class="col-auto m-auto text-center" >
        <div class="h-100">
          <h3 class="mb-2">
            ຍິນຕ້ອນຮັບທ່ານເຂົ້າສູ້ລະບົບຂອງເຈົ້າຂອງຫ້ອງແຖວ
          </h3>
          <p>ເຈົ້າຂອງຫ້ອງແຖວ</p>
          <p><i class="fas fa-user"></i></p>
        </div>
      </div>
    
        </div>
      </div>
  </div>

    <div class="row mt-3">
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-14">
        <div class="card" >
          <div class="card-body" >
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">ຫ້ອງແຖວທັງໝົດຂອງທ່ານມີ :</p>
                  <h3 class="font-weight-bolder">
                    {{ $C_room }} ຫ້ອງ
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">ຈຳນວນການຈອງທັງໝົດ</p>
                  <h3 class="font-weight-bolder">
                    5 ຫ້ອງແຖວ
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-4 col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">ການຍົກເລີກການຈອງທັງໝົດ</p>
                  <h3 class="font-weight-bolder">
                    10 
                  </h3>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    
      <div class="row mt-2">
      <div class="col-lg-13 mb-lg-0 mb-4">
        <div class="card w-100">
          <div class="table-responsive m-3 " style="text-align: center">
              <div class="wrap-header m-4 py-3">
                <p id="reset" style="color: yellow">Reset ປະຕິຖິນ</p>
                  <div id="header" class="px-2">
                    <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
                    <div class="head-info">
                        <div class="head-day" ></div>
                        <div class="head-month" ></div>
                    </div>
                    <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
                  </div>
                </div>
                <div class="calendar-wrap">
                  <table id="calendar">
                    <thead>
                        <tr>
                          <th style="color: green">ອາທິດ</th>
                          <th style="color: green">ຈັນ</th>
                          <th style="color: green">ອັງຄານ</th>
                          <th style="color: green">ພຸດ</th>
                          <th style="color: green">ພະຫັດ</th>
                          <th style="color: green">ສຸກ</th>
                          <th style="color: green">ເສົາ</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            
        
    
      <script src="../calendas/js/jquery.min.js"></script>
      <script src="../calendas/js/popper.js"></script>
      <script src="../calendas/js/bootstrap.min.js"></script>
      <script src="../calendas/js/main.js"></script>


          </div>
        </div>
      </div>
    </div>
    



    </div>
</div>
@endsection