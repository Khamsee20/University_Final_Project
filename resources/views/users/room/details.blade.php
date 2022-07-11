@extends('layouts.room_detail')

@section('content')
    <div class="container-fluid py-2">


        <div class="card uper">

            <h5 class="mt-5 ml-4 mb-0">
                <a style="font-size: 1.5rem" href="{{ route('users.index') }}"> <i
                        class="fa-solid fa-circle-chevron-left float-end mr-4"></i></a>ຮູບພາບຫ້ອງເເຖວ
            </h5>
            <div class="card-body">
                <div class="form-group">
                    <div class="row mt-0">
                        {{-- COLUMN 1 --}}
                        <div class="col-lg-7 mb-lg-0">
                            <div class="card w-100 h-auto">
                                <div class="table-responsive m-1 h-auto ">

                                    <img src="{{ url('uploads/' . $roomget->image) }}" alt="" width="97%"
                                        style="border-radius: 10px; margin: 2px">
                                    <script src="../detail/jjjj.js"></script>

                                    <h6 style="text-align: center" class="mt-3">
                                        ຮູບພາບຫ້ອງເເຖວເພີ່ມເຕີມ
                                    </h6>
                                    <div style="overflow: scroll; height:250px; width:97%" class="row m-0">
                                        @foreach ($photos as $item)
                                            <div class="col-3 col-m-6 col-sm-4 ">
                                                <a target="_blank" href="{{ url('uploads/' . $item->image) }}">
                                                    <img style="border-radius: 5px"
                                                        src="{{ url('uploads/' . $item->image) }}" height="200px"
                                                        width="100%" alt="" class="">
                                                </a>
                                                {{-- <div style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; text-align: center;" class="bg-success m-auto">
                        <a  href="" onclick="return confirm('ຕ້ອງການລົບ ຫຼື ໍ ບໍ່?')"><i  style="color: #ff2323;font-size: 16px;" class="fas fa-trash-alt"></i></a>
                    </div> --}}
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                        {{-- COLUMN 2 --}}
                        <div class="col-lg-5 mb-lg-0">
                            <div class="card w-100">
                                <div class="table-responsive m-1 ">

                                    <!-- card right -->
                                    <div class="product-content">

                                        <h4 class="product-title">ລາຍລະອຽດຂອງຫ້ອງແຖວ {{ $roomget->name }}
                                        </h4>
                                        <a href="#" class="product-link"> ລາຄ່າ / ຫ້ອງ : {{ $roomget->price }}</a>
                                        <div class="product-price">
                                            <p class="new-price">ເຈົ້າຂອງຫ້ອງແຖວ : <span>
                                                    {{ $roomget->member->users->name }} </span></p>
                                            <p class="new-price">ປະເພດ : <span> {{ $roomget->roomtype->name }} </span></p>
                                            <p class="new-price">ບ້ານ : <span> {{ $roomget->village }} </span></p>
                                            <p class="new-price">ເມືອງ : <span> {{ $roomget->district }} </span></p>
                                            <p class="new-price">ແຂວງ : <span> {{ $roomget->province }} </span></p>
                                            <p class="new-price">ຮ່ອມ : <span> {{ $roomget->horm }} </span></p>
                                            <p class="new-price">ຈຳນວນຫ້ອງ : <span> {{ $roomget->qty }} ຫ້ອງ</span></p>
                                            <p class="new-price">ຈຳນວນຫ້ອງວ່າງ : <span> {{ $emptyroom }} ຫ້ອງ</span></p>
                                            <p class="new-price">ມີຫ້ອງວ່າງ : <span>  ຫ້ອງ</span></p>
                                            <p class="new-price">ລາຄ່າ : <span> {{ $roomget->price }} </span></p>
                                            <p class="new-price">ໄລ່ຍະຫ່າງຈາກຫ້ອງແຖວ - ມຊ : <span>
                                                    {{ $roomget->far_from }} </span></p>
                                        </div>

                                        <div class="product-detail">
                                            <h5>ເພີ່ມເຕີ່ມ : </h5>
                                            <p>{{ $roomget->details }}</p>
                                        </div>

                                        <div class="purchase-info">
                                                                                    
                                                @if ($cbking >= 1)
                                                <a type="button" class="btn btn-warning" href="{{ route('users.index','#pricing-table') }}"> ຄລິກເພື່ອເບິ່ງລາຍລະອຽດການຈອງ : <i
                                                    class="fa-brands fa-buy-n-large"></i></a>
                                                    @endif
                                                
                                                    @if ($cbking == 0 && $emptyroom > 0)
                                                    <a type="button" class="btn btn-success" href="{{ route('booking.index',$roomget->id) }}">ຈອງຫ້ອງແຖວ : <i
                                                        class="fa-brands fa-buy-n-large"></i></a>
                                                    @endif
                                                   
                                                    @if ($emptyroom==0 && $cbking == 0)
                                                    <a type="button" class="btn btn-danger" href="#"> ຫ້ອງແຖວຖືກຈອງເຕັ້ມແລ້ວ : <i
                                                        class="fa-brands fa-buy-n-large"></i></a>
                                                    @endif
                                               

                                            <a type="button" class="btn btn-info"
                                                href="{{ $roomget->location }}">ສະຖານທີຕັ້ງຫ້ອງແຖວ : <i
                                                    class="fa-solid fa-map-location-dot"></i></a>

                                        </div>
                                        <h4 class="mt-3">ຄອມເມັ້ນ : </h4>
                                        <div style="overflow: scroll;height:300px;" class="card-content">
                                            <div class="messagess">
                                                <div class="msg-pagee">
                                                    <div class="d-flex flex-column comment-section">
                                                        <div class="bg-white p-2">

                                                            @foreach ($comments as $item)
                                                                <div class="d-flex flex-row user-info"><img
                                                                        class="rounded-circle"
                                                                        src="https://icon-library.com/images/user-icon-png/user-icon-png-21.jpg"
                                                                        width="10%">
                                                                    <div
                                                                        class="d-flex flex-column justify-content-start ml-2">
                                                                        <span
                                                                            class="d-block font-weight-bold name">{{ $item->users->name }}</span><span
                                                                            class="date text-black-50"> ຄອມເມັ້ນ
                                                                            {{ $item->created_at->diffforHumans() }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <p style="font-size: 14px" class="comment-text mx-2">
                                                                        {{ $item->comments }}</p>
                                                                </div>
                                                                <div class="d-flex flex-row fs-12">
                                                                    @if ($item->users->id == Auth::user()->id)
                                                                        <a class="ml-3"
                                                                            style="text-decoration: none; color:#ff2323;"
                                                                            href="{{ route('delete_user.comment', $item->id) }}"
                                                                            onclick="return confirm('ຕ້ອງການລົບ ຫຼື ໍ ບໍ່?')">ລົບຄອມເມັ້ນ</a></span>
                                                                    @endif
                                                                </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <h5 class="mt-4 mb-1 px-2">
                                            ສະແດງຄອມເມັ້ນ
                                        </h5>

                                        {{-- /dormitory/{dormitory}/upcommemt --}}
                                        <form action="{{ route('user_room.comment', $roomget->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @if ($message = Session::get('success'))
                                                <div class="col-6 col-m-6 col-sm-6 p-2">
                                                    <span style="color: #0fa034"><i class="fas fa-check"></i>
                                                        {{ $message }}</span>
                                            @endif
                                            <div class="progress-wrapper">
                                                <div class="text">
                                                    <textarea style="height: 100px; width: 97%" class="textdorm px-2 mx-2" placeholder="ປ້ອນຄອມເມັ້ນທີ່ນີ້... " name="comment"
                                                        id="" cols="45" rows="2"></textarea>
                                                </div>
                                                @error('body')
                                                    <span style="color: red;"><strong>ຜິດພາດ ! </strong>
                                                        {{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="progress-wrapper">
                                                <div class="text">
                                                    <button class="btn btn-success mt-2 px-4 mx-2"
                                                        type="submit">ລົງຄອມເມັ້ນ</button>
                                                </div>
                                            </div>
                                    </div>
                                    </form>


                                </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
