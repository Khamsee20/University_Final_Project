@extends('layouts.admin-layout')

@section('content')




<div class="container-fluid py-2">

    <div class="card shadow-lg mx-auto my-3 card-profile-bottom py-4">
        <div class="card-body p-2">
          <div class="row gx-4">
            <div class="col-auto">
              {{-- <div class="avatar avatar-xl position-relative">
                <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div> --}}
            </div>
            <div class="col-auto my-auto mx-3">
              <div class="h-100">
                <h5 class="mb-1">
                  ແກ້ໄຂປະເພດຫ້ອງແຖວ
                </h5>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                  {{-- <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                      <i class="ni ni-app"></i>
                      <span class="ms-2">App</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                      <i class="ni ni-email-83"></i>
                      <span class="ms-2">Messages</span>
                    </a>
                  </li> --}}
                  {{-- <li class="nav-item ">
                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="{{ route('roomtype.create') }}" role="tab" aria-selected="true">
                      <i class="ni ni-settings-gear-65"></i>
                      <span class="ms-2 text-primary">ເພີ່ມ</span>
                    </a>
                  </li> --}}

                <a class=" text-success nav-item mb-0 px-0 py-2 d-flex align-items-center justify-content-center mx-5" href="{{ route('roomtype.index') }}">ຍອນກັບ</a>
 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>



<!-- create.blade.php -->
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    ປ້ອນລາຍອ່ຽດໃຫ້ຄົບເພື່ອແກ້ໄຂປະເພດຫ້ອງແຖວ
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    @if (session('success'))
    <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

      <form action="{{ url('roomtype-update/'.$roomtype->id) }}" method="POST">
          <div class="form-group">
              @csrf
              @method('PUT')
              <label for="country_name">ແກ້ໄຂປະເພດຫ້ອງແຖວ:</label>
              <input type="text" class="form-control" name="roomtype_name" value="{{ $roomtype->name }}" autofocus/>
          </div>
          

            <button type="submit" class="btn btn-primary">ແກ້ໄຂ</button>

      </form>
  </div>
</div>


    </div>

{{-- End table  --}}
@endsection