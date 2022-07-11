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
                  ເພີ່ມສະມາຊິກຫ້ອງແຖວໃໝ່
                </h5>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">

                <a class=" btn btn-primary nav-item mb-0 px-0 py-2 d-flex align-items-center justify-content-center mx-5" href="{{ route('register_member.index') }}">ຍອນກັບ</a>
 
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
    ປ້ອນຂໍ້ມູນຕາມຟອມນີ້ໃຫ້ຄົບຖວນເພື່ອສະໝັກສະໝາຊິກໃໝ່
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

      <form method="post" action="{{ route('register_member.store') }}">
          <div class="form-group">
              @csrf
              

              <div class="progress-wrapper">
                <label for="user_name">ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຈະສະໝັກເປັນສະມາຊິກ:</label>
                <div class="text">
                    <select  name="user_id" class="textdorm w-100 py-2" placeholder="ຊື່ຜູ້ໃຊ້">
                        <option style="color: red;" value=""> ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຈະສະໝັກເປັນສະມາຊິກ </option>
                        @foreach ($user_name as $item)
                            <option  style="color:#0fa034; pl-5" value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
                @enderror
            </div>

{{-- 
              <label for="country_name">ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຈະສະໝັກເປັນສະມາຊິກ:</label>
              <input type="text" class="form-control" name="roomtype_name" autofocus/> --}}
     
              <label for="member_phone">ປ້ອນເບີໂທ:</label>
              <input type="text" class="form-control" name="phone" />
       
              <label for="member_village">ປ້ອນບ້ານຢູ່ປັດຈຸບັນ:</label>
              <input type="text" class="form-control" name="village" />

              <label for="member_district">ປ້ອນເມືອງຢູ່ປັດຈຸບັນ:</label>
              <input type="text" class="form-control" name="district" />

              <label for="member_province">ປ້ອນແຂວງຢູ່ປັດຈຸບັນ:</label>
              <input type="text" class="form-control" name="province" />
          </div>

            <button type="submit" class="btn btn-primary">ເພີ່ມເປັນສະມາຊິກ</button>

      </form>
  </div>
</div>

</div>

{{-- End table  --}}
@endsection