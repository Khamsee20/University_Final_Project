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
                  ແກ້ໄຂສະມາຊິກຫ້ອງແຖວໃໝ່
                </h5>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">
                {{-- <ul class="nav nav-pills nav-fill p-1" role="tablist"> --}}
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

                <a class=" btn btn-primary nav-item mb-0 px-0 py-2 d-flex align-items-center justify-content-center mx-5" href="{{ route('register_member.index') }}">ຍອນກັບ</a>
 
                {{-- </ul> --}}
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
    ທ່ານສາມາດແກ້ໄຂຂໍ້ມູນຕາມຟອມດ້ານລຸ່ມ:
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

      <form action="{{ route('register_member.update',$memberget->id) }}" method="POST">
          <div class="form-group">
              @csrf
              @method('PUT')

              <div class="progress-wrapper">
                <label for="user_name">ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຈະສະໝັກເປັນສະມາຊິກ:</label>
                <div class="text">
                   <select disabled selected  name="user_id" class="textdorm w-100 py-2" placeholder="ຊື່ຜູ້ໃຊ້">
                        <option style="color: red;" value="" > ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຈະສະໝັກເປັນສະມາຊິກ </option>
                        @foreach ($user_name as $item)
                            <option   style="color:#0fa034; pl-5" value="{{$item->id}}" {{$item->id == $memberget->user_id ? 'selected' : ''}}> {{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
                @enderror
            </div>
              <label for="member_phone">ແກ້ໄຂເບີໂທ:</label>
              <input type="text" class="form-control" name="phone" value="{{ $memberget->phone }}" />
       
              <label for="member_village">ແກ້ໄຂບ້ານຢູ່ປັດຈຸບັນ:</label>
              <input type="text" class="form-control" name="village" value="{{ $memberget->village }}"/>

              <label for="member_district">ແກ້ໄຂເມືອງຢູ່ປັດຈຸບັນ:</label>
              <input type="text" class="form-control" name="district" value="{{ $memberget->district}}"/>

              <label for="member_province">ແກ້ໄຂແຂວງຢູ່ປັດຈຸບັນ:</label>
              <input type="text" class="form-control" name="province" value="{{ $memberget->province }}"/>
          </div>

            <button type="submit" class="btn btn-primary">ແກ້ໄຂຂໍ້ມູນສະມາຊິກ</button>

      </form>
  </div>
</div>

</div>

{{-- End table  --}}
@endsection