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
                    ແກ້ໄຂຜູ້ໃຊ້
                </h5>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">

                <a class=" btn btn-primary nav-item mb-0 px-0 py-2 d-flex align-items-center justify-content-center mx-5" href="{{ route('admin_users.index') }}">ຍອນກັບ</a>
 
              </div>
            </div>
          </div>
        </div>
      </div>


            <!-- create.blade.php -->
<style>
    .uper {
      margin-top: 10px;
    }
</style>
  <div class="card uper">
    <div class="card-header">
      ປ້ອນຂໍ້ມູນຕາມຟອມນີ້ໃຫ້ຄົບຖວນເພື່ອແກ້ຫ້ອງແຖວ
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      @endif
  
      @if (session('success'))
      <h6 class="alert alert-success">{{ session('success') }}</h6>
      @endif
    <form method="post" action="{{ route('admin_users.update',$userss->id) }}"
    enctype="multipart/form-data">
  
<div class="form-group">
<div class="row mt-1">
  <div class="col-lg-9 mb-lg-0 mb-4">
    <div class="card w-100">
        <div class="table-responsive m-3">

            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary font-weight-bolder opacity-10">ລຳດັບ</th>
                    <th class="text-secondary font-weight-bolder opacity-10">ຊື່ຜູ້ໃຊ້</th>
                    <th class="text-secondary font-weight-bolder opacity-10">ນາມສະກຸນ</th>
                    <th class="text-secondary font-weight-bolder opacity-10">ຕຳແໜ່ງ</th>
                    <th class="text-secondary font-weight-bolder opacity-10">ອີເມວ</th>
                    <th class="text-secondary opacity-10">ຈັດການ</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($user as $item)
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-2">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-md">{{ $i++ }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-2">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-md">{{ $item->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-2">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-md">{{ $item->Lname }}</h6>
                        </div>
                      </div>
                    </td>

                    <td>
                      <div class="d-flex px-3 py-2">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-md">{{ $item->roles }}</h6>
                        </div>
                      </div>
                    </td>

                    <td>
                      <div class="d-flex px-3 py-2">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-md">{{ $item->email }}</h6>
                        </div>
                      </div>
                    </td>
                   
                    <td class="align-right">
                    <form action="{{ route('admin_users.delete', $item->id) }}" method="POST" >
                      <a href="{{ route('admin_users.edit',$item->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Edit roomtype">
                        ແກ້ໄຂ
                      </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ຕ້ອງການລົບ ຫຼື ໍ ບໍ່?')">ລົບ</button>
                    </form>
                    </td>
                  </tr>
              @endforeach
                </tbody>
              </table>

        </div>
    </div>
  </div>


    {{-- column 2 --}}
    <div class="col-lg-3 mb-lg-0 mb-4">
      <div class="card w-100">
        <div class="table-responsive m-0 p-2">
            

           <h4 style="text-align: center">ປ່ຽນຕຳແໜ່ງຜູ້ໃຊ້</h4>
          <br/>

          <label for="far_from" style="font-size: 1rem">ຊື່ :</label><span>  {{ $userss->name }}</span><br/>
          <label for="far_from" style="font-size: 1rem">ນາມສະກຸນ :</label><span>  {{ $userss->Lname }}</span><br/>
          <label for="far_from" style="font-size: 1rem">ເພດ :</label><span>  {{ $userss->gender }}</span><br/>
          <label for="far_from" style="font-size: 1rem">ອີເມວ :</label><span>  {{ $userss->email }}</span><br/>
          <label for="far_from" style="font-size: 1rem">ຕຳແໜ່ງ :</label><span>  {{ $userss->roles }}</span><br/>
          @csrf
          @method('PUT')
              <div class="progress-wrapper mt-3">
                <label for="status">ເລືອກຕຳແໜ່ງ:</label>
                <div class="text">
                    <select aria-valuenow="" name="position" class="textdorm w-100 py-2" placeholder="ກະລຸນາເລືອກສະຖານະ">
                        <option style="color: red;" value=""> ປ່ຽນຕຳແໜ່ງ </option>
                        <option  style="color:#0fa034; pl-5" value="Employee">ພະນັກງານ</option>
                        <option  style="color:#0fa034; pl-5" value="Member">ເຈົ້າຂອງຫ້ອງແຖວ</option>
                        <option  style="color:#0fa034; pl-5" value="User">ລູກຄ້າ</option>
                    </select>
                </div>
                @error('position')
                <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
                @enderror
            </div>

           
             <button type="submit" class="btn btn-primary px-5 mt-3 mb-3 float-end">ອັບເດດ</button>
        </div>
      </div>
    </div>
</div>
</div>
</form>
</div>
</div>
@endsection