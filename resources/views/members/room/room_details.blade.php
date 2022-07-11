@extends('layouts.member-layout')

@section('content')

<div class="container-fluid py-2">
  <div class="card shadow-lg mx-auto my-3 card-profile-bottom py-4">
      <div class="card-body p-2">
        <div class="row gx-4">
          <div class="col-auto m-auto">
          <h3>ລາຍລະອຽດຂອງຫ້ອງແຖວ : {{ $rooms->name }} </h3>
          </div>
        </div>
      </div>
  </div>

  <div class="card uper">
    <div class="card-header">
      <a style="font-size: 1.5rem" href="{{ route('member_register-room.index') }}"> <i class="fa-solid fa-circle-chevron-left"></i></a>
    </div>
    <h5 class="mt-5 ml-4 mb-0">
      ຮູບພາບຫ້ອງເເຖວ
  </h5>
    <div class="card-body">
      <div class="form-group">
        <div class="row mt-1">
          {{-- COLUMN 1 --}}
          <div class="col-lg-7 mb-lg-0">
            <div class="card w-100 h-120">
              <div class="table-responsive m-1 ">
             
                <img src="{{ url(('uploads/'.$rooms->image)) }}" alt="" width="100%" style="border-radius: 10px; margin: 2px">
                <script src="../detail/jjjj.js"></script>
             
              <h5 style="text-align: center" class="mt-3">
                ຮູບພາບຫ້ອງເເຖວເພີ່ມເຕີມ
            </h5>
            <div style="overflow: scroll; height:240px;"  class="row m-0">
                @foreach ($photos as $item)
                <div class="col-3 col-m-6 col-sm-4 ">
                    <a target="_blank" href="{{ url('uploads/'.$item->image)}}">
                        <img style="border-top-right-radius: 10px; border-top-left-radius: 10px;" src="{{ url('uploads/'.$item->image)}}" height="170px" width="100%" alt="" class="">
                    </a>
                    <div style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; text-align: center;" class="bg-success m-auto">
                        <a  href="{{ route('delete_member.image',$item->id) }}" onclick="return confirm('ຕ້ອງການລົບ ຫຼື ໍ ບໍ່?')"><i  style="color: #ff2323;font-size: 16px;" class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                @endforeach

            </div>

          {{-- Form Add more Image --}}
          <form action="{{ route('member_room.admore_image',$rooms->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($message = Session::get('success'))
            <div class="col-6 col-m-6 col-sm-6">
                <span style="color: #0fa034"><i class="fas fa-check"></i> {{$message}}</span>
            </div>
        @endif
        {{-- @if ($cimage>=30)
            <div class="col-8 col-m-6 col-sm-6">
                <span>ທ່ານໄດ້ເພີ່ມຮູບພາບເພີ່ມເຕີມຄົບຕາມທີ່ພວກເຮົາກຳນົດເເລ້ວ <span style="color: red;">ຂໍຂອບໃຈ</span></span>
            </div>
        @else --}}
          <h5 class="mt-5">ເພີ່ມຮູບຫ້ອງແຖວໃໝ່</h5>
          <input type="file" class="form-control mt-3 m-0" required name="photo">
          @error('photo')
          <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
        @enderror
          <button type="submit" class="btn btn-success mt-3 px-5">ເພີ່ມຮູບ</button>    <span style="color:red;">ໝາຍເຫດ! </span><span> ທ່ານສາມາດລົງຮູບພາບເພິ່ມເຕີມໄດ້ພຽງ <span style="color:red;">5</span> ຮູບພາບເທົ່ານັັ້ນ</span>
        </form>
        

        </div>


            
          </div>
        </div>
        {{-- COLUMN 2 --}}
        <div class="col-lg-5 mb-lg-0">
          <div class="card w-100">
            <div class="table-responsive m-1 ">
             

                      <!-- card right -->
        <div class = "product-content">
            
          <h6 class = "product-title">ລາຍລະອຽດຂອງຫ້ອງແຖວ  
        </h6> 
          <a href = "#" class = "product-link"> ລາຄ່າ / ຫ້ອງ : {{ $rooms->price }}</a>
          <div class = "product-price">
            <p class = "new-price">ເຈົ້າຂອງຫ້ອງແຖວ : <span> {{ $rooms->member->users->name }} </span></p>
            <p class = "new-price">ປະເພດ : <span> {{ $rooms->roomtype->name }} </span></p>
            <p class = "new-price">ບ້ານ : <span> {{ $rooms->village }} </span></p>
            <p class = "new-price">ເມືອງ : <span> {{ $rooms->district }} </span></p>
            <p class = "new-price">ແຂວງ : <span> {{ $rooms->province }} </span></p>
            <p class = "new-price">ຮ່ອມ : <span> {{ $rooms->horm }} </span></p>
            <p class = "new-price">ສະຖານະ : <span> {{ $rooms->status }} </span></p>
            <p class = "new-price">ລາຄ່າ : <span> {{ $rooms->price }} </span></p>
            <p class = "new-price">ໄລ່ຍະຫ່າງຈາກຫ້ອງແຖວ - ມຊ : <span> {{ $rooms->far_from }} </span></p>
          </div>

          <div class = "product-detail">
            <h5>ເພີ່ມເຕີ່ມ : </h5>
            <p>{{ $rooms->details }}</p>
          </div>

          <div class = "purchase-info">
           
            <a style="width: 100%; " type = "button" class = "btn btn-info" href="{{ $rooms->location }}">ສະຖານທີຕັ້ງຫ້ອງແຖວ : <i class="fa-solid fa-map-location-dot"></i></a>

          </div>
          
          <div class="col-8 col-m-12 col-sm-12">
            <div  class="card">
                <div class="card-header">
                    <h5 class="my-0" style="text-align: center">
                        ຄອມເມັ້ນຂອງລູກຄ້າຄົ້ນອື່ນ
                    </h5>
                </div>
                <div style="overflow: scroll;height:300px;" class="card-content">
                    <div class="messagess">
                        <div class="msg-pagee">
                          <div class="d-flex flex-column comment-section">
                            <div class="bg-white p-2">
      
                              @foreach ($comments as $item)
                                <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://icon-library.com/images/user-icon-png/user-icon-png-21.jpg" width="10%">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{ $item->users->name }}</span><span class="date text-black-50"> ຄອມເມັ້ນ ວັນທີ {{ $item->created_at->diffforHumans() }}</span></div>
                                </div>
                                <div class="mt-2">
                                    <p style="font-size: 14px" class="comment-text mx-2">{{ $item->comments }}</p>
                                </div>
                                <div class="d-flex flex-row fs-12">
                                  @if($item->users->id == Auth::user()->id)
                                  <a class="ml-3" style="text-decoration: none; color:#ff2323;" href="{{ route('delete_member.comment',$item->id) }}" onclick="return confirm('ຕ້ອງການລົບ ຫຼື ໍ ບໍ່?')">ລົບຄອມເມັ້ນ</a></span>
                              @endif
                              </div>
                            </div>
                            @endforeach
                         
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



              <h5 class="mt-4 mb-1">
                 ສະແດງຄອມເມັ້ນ
              </h5>
              
              {{-- /dormitory/{dormitory}/upcommemt --}}
              <form action="{{ route('member_room.comment',$rooms->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                      @if ($message = Session::get('successs'))
                          <div class="col-6 col-m-6 col-sm-6">
                              <span style="color: #0fa034"><i class="fas fa-check"></i> {{$message}}</span>
                      @endif
                      <div class="progress-wrapper">
                          <div class="text">
                              <textarea style="height: 100px; width: 100%" class="textdorm" placeholder="ປ້ອນຄອມເມັ້ນທີ່ນີ້... " name="comment" id="" cols="45" rows="2"></textarea>
                          </div>
                          @error('body')
                              <span style="color: red;"><strong>ຜິດພາດ ! </strong> {{$message}}</span>
                          @enderror
                      </div>
                      <div class="progress-wrapper">
                          <div class="text">
                              <button class="btn btn-success mt-2 px-4" type="submit">ລົງຄອມເມັ້ນ</button>
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