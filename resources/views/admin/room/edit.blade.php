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
                                ແກ້ໄຂຫ້ອງແຖວໃໝ່
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">

                            <a class=" btn btn-primary nav-item mb-0 px-0 py-2 d-flex align-items-center justify-content-center mx-5"
                                href="{{ route('register-room.index') }}">ຍອນກັບ</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- create.blade.php -->
        <style>
            .uper {
                margin-top: 30px;
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
                {{-- colum  1 --}}

                <form method="post" action="{{ route('register-room.update', $rooms->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <div class="row mt-4">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="card w-100">
                                    <div class="table-responsive">

                                        <label for="name">ກະລຸນາປ້ອນຊື້ຫ້ອງແຖວ:</label>
                                        <input type="text" class="form-control" name="name" autofocus
                                            value="{{ $rooms->name }}" />


                                        <div class="progress-wrapper">
                                            <label for="roomtype_id">ກະລຸນາເລືອກປະເພດຫ້ອງແຖວ:</label>
                                            <div class="text">
                                                <select name="roomtype_id" class="textdorm w-100 py-2"
                                                    placeholder="ກະລຸນາເລືອກປະເພດຫ້ອງແຖວ">
                                                    <option style="color: red;" value=""> ກະລຸນາເລືອກປະເພດຫ້ອງແຖວ
                                                    </option>
                                                    @foreach ($roomtypes as $item)
                                                        <option style="color:#0fa034; pl-5" value="{{ $item->id }}"
                                                            {{ $item->id == $rooms->roomtype_id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('roomtype_id')
                                                <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="progress-wrapper">
                                            <label for="member_id">ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ:</label>
                                            <div class="text">
                                                <select name="member_id" class="textdorm w-100 py-2"
                                                    placeholder="ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ">
                                                    <option style="color: red;" value=""> ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ
                                                    </option>
                                                    @foreach ($members as $item)
                                                        <option style="color:#0fa034; pl-5" value="{{ $item->id }}"
                                                            {{ $item->id == $rooms->user_id ? 'selected' : '' }}>
                                                            {{ $item->users->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('member_id')
                                                <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label for="village">ປ້ອນບ້ານ:</label>
                                        <input type="text" class="form-control" name="village"
                                            value="{{ $rooms->village }}" />

                                        <label for="district">ປ້ອນເມືອງ:</label>
                                        <input type="text" class="form-control" name="district"
                                            value="{{ $rooms->district }}" />

                                        <label for="province">ປ້ອນແຂວງ:</label>
                                        <input type="text" class="form-control" name="province"
                                            value="{{ $rooms->province }}" />

                                        <label for="horm">ປ້ອນຮ້ອມທີ່ຫ້ອງແຖວຢູ່:</label>
                                        <input type="text" class="form-control" name="horm"
                                            value="{{ $rooms->horm }}" />
                                    </div>
                                </div>
                            </div>
                            {{-- column 2 --}}
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="card w-100">
                                    <div class="table-responsive m-3">


                                        <label for="far_from">ໄລ່ຍະຫາງຈາກຫ້ອງແຖວຫາວິທະຍາໄລແຫງຊາດ:</label>
                                        <input type="text" class="form-control" name="far_from"
                                            value="{{ $rooms->far_from }}" />



                                        <div class="progress-wrapper">
                                            <label for="status">ກະລຸນາເລືອກສະຖານະ:</label>
                                            <div class="text">
                                                <select aria-valuenow="{{ $rooms->status }}" name="status"
                                                    class="textdorm w-100 py-2" placeholder="ກະລຸນາເລືອກສະຖານະ">
                                                    <option disabled selected style="color: red;" value=""> ກະລຸນາເລືອກສະຖານະ </option>
                                                    <option  style="color:#0fa034; pl-5" value="ອອບລາຍ">ອອບລາຍ</option>
                                                    <option  style="color:#0fa034; pl-5" value="ອອນລາຍ">ອອນລາຍ</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label for="location">ໃສ່ຈຳນວນຫ້ອງ:</label>
                                        <input type="text" class="form-control" name="qty" value="{{ $rooms->qty }}" />


                                        <label for="location">ໃສ່ລິ່ງສະຖານທີ່:</label>
                                        <input type="text" class="form-control" name="location"
                                            value="{{ $rooms->location }}" />

                                        <label for="price">ລາຄ່າ / ຫ້ອງ:</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $rooms->price }}" />

                                        <label for="details">ລາຍລະອຽດເພີ່ມເຕີ່ມ:</label>
                                        <input type="text" class="form-control" name="details"
                                            value="{{ $rooms->details }}" />

                                        {{-- <label for="image">ເລືອກຮູບຫ້ອງແຖວ:</label>
                                        <input type="file" class="form-control" required name="pic">
                                        @error('pic')
                                            <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{ $message }}</span>
                                        @enderror --}}

                                        <button type="submit"
                                            class="btn btn-primary px-5 mt-3 mb-3 float-end">ແກ້ໄຂ</button>

                                        <div class="mt-3">
                                            <p>ຮູບພາບເກົ່າ :</p>
                                            <div class="text">
                                                <img src="{{ url('uploads/' . $rooms->image) }}" width="30%"
                                                    style="border-radius: 10px">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="image">
<label><h4>ເລືອກຮູບ</h4></label>
<input type="file" class="form-control" required name="pic">
</div> --}}
                    </div>


                </form>

            </div>

        </div>


    @endsection
