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
                  ເພີ່ມຫ້ອງແຖວໃໝ່
              </h5>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">

              <a class=" btn btn-primary nav-item mb-0 px-0 py-2 d-flex align-items-center justify-content-center mx-5" href="{{ route('register-room.index') }}">ຍອນກັບ</a>

            </div>
          </div>
        </div>
      </div>
  </div>

              <!-- create.blade.php -->
<style>
.uper {
  margin-top: 20px;
}
</style>

<div class="card uper">
  <div class="card-header">
    ປ້ອນຂໍ້ມູນຕາມຟອມນີ້ໃຫ້ຄົບຖວນເພື່ອສະໝັກຫ້ອງແຖວ
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
      
<form method="post" action="{{ route('register-room.store') }}" 
enctype="multipart/form-data">
@csrf

<div class="form-group">
<div class="row mt-1">
  <div class="col-lg-6 mb-lg-0">
    <div class="card w-100">
      <div class="table-responsive m-0 p-2 ">
               
      <label for="name">ກະລຸນາປ້ອນຊື້ຫ້ອງແຖວ:</label>
      <input type="text" class="form-control" name="name" autofocus/>


      <div class="progress-wrapper">
        <label for="roomtype_id">ກະລຸນາເລືອກປະເພດຫ້ອງແຖວ:</label>
        <div class="text">
            <select  name="roomtype_id" class="textdorm w-100 py-2" placeholder="ກະລຸນາເລືອກປະເພດຫ້ອງແຖວ">
                <option style="color: red;" value=""> ກະລຸນາເລືອກປະເພດຫ້ອງແຖວ </option>
                @foreach ($roomtypes as $item)
                    <option  style="color:#0fa034; pl-5" value="{{$item->id}}"> {{$item->name}}</option>
                @endforeach
            </select>
        </div>
        @error('roomtype_id')
        <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
        @enderror
    </div>

    <div class="progress-wrapper">
        <label for="member_id">ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ:</label>
        <div class="text">
            <select  name="member_id" class="textdorm w-100 py-2" placeholder="ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ">
                <option style="color: red;" value=""> ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ </option>
                @foreach ($memberget as $item)
                    <option  style="color:#0fa034; pl-5" value="{{$item->id}}"> {{$item->users->name}}</option>
                @endforeach
            </select>
        </div>
        @error('member_id')
        <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
        @enderror
    </div>


      <label for="village">ປ້ອນບ້ານ:</label>
      <input type="text" class="form-control" name="village" />

      <label for="district">ປ້ອນເມືອງ:</label>
      <input type="text" class="form-control" name="district" />

      <label for="province">ປ້ອນແຂວງ:</label>
      <input type="text" class="form-control" name="province" />

      <label for="horm">ປ້ອນຮ້ອມທີ່ຫ້ອງແຖວຢູ່:</label>
      <input type="text" class="form-control" name="horm" />
      </div>
    </div>
  </div>
    {{-- column 2 --}}
    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="card w-100">
        <div class="table-responsive m-0 p-2">
          

            <label for="far_from">ໄລ່ຍະຫາງຈາກຫ້ອງແຖວຫາວິທະຍາໄລແຫງຊາດ:</label>
            <input type="text" class="form-control" name="far_from" />


            
              <div class="progress-wrapper">
                <label for="status">ກະລຸນາເລືອກສະຖານະ:</label>
                <div class="text">
                    <select  name="status" class="textdorm w-100 py-2" placeholder="ກະລຸນາເລືອກສະຖານະ">
                        <option style="color: red;" value=""> ກະລຸນາເລືອກສະຖານະ </option>
                        <option  style="color:#0fa034; pl-5" value="ອອບລາຍ">ອອບລາຍ</option>
                        <option  style="color:#0fa034; pl-5" value="ອອນລາຍ">ອອນລາຍ</option>
                    </select>
                </div>
                @error('status')
                <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
                @enderror
            </div>

           

            <label for="location">ໃສ່ຈຳນວນຫ້ອງ:</label>
            <input type="text" class="form-control" name="qty" />

            <label for="location">ໃສ່ລິ່ງສະຖານທີ່:</label>
            <input type="text" class="form-control" name="location" />

            <label for="price">ລາຄ່າ / ຫ້ອງ:</label>
            <input type="text" class="form-control" name="price" />

            <label for="details">ລາຍລະອຽດເພີ່ມເຕີ່ມ:</label>
            <input type="text" class="form-control" name="details" />

            <label for="image">ເລືອກຮູບຫ້ອງແຖວ:</label>
            <input type="file" class="form-control" required name="pic">
             @error('pic')
             <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
             @enderror

             <button type="submit" class="btn btn-primary px-5 mt-4 mb-3 float-end ">ເພີ່ມ</button>
        </div>
      </div>
    </div>

</div>
{{-- 
<div class="image">
<label><h4>ເລືອກຮູບ</h4></label>
<input type="file" class="form-control" required name="pic">
</div> --}}
</div>


</form>


    
</div>

@endsection