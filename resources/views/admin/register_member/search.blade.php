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
                <h4 class="mb-1 text-success">
                  ຜົນການຄົ້ນຫາສະມາຊິກຫ້ອງແຖວມີທັງໝົດ :  {{ $c_search }} ຄົນ
                </h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">
    
               
                <form action="{{ route('register_member.search') }}" method="GET" class="form-inlin my-2 my-lg-0">
                  <div class="input-group">
                  <input type="search" name="query" class="form-control mr-sm-2" placeholder="ຄົ້ນຫາສະມາຊິກດ້ວຍຊື້ ...">
                  <button class="btn btn-primary my-2 my-sm-0 px-3 mx-1">ຄົ້ນຫາ</button>
                </div>
              </form>
     
                {{-- </ul> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="row">

      @if (session('success'))
    <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

      <div class="col-12">
        <div class="card mb-4">
          
          <div class="card-header pb-0">
            <a style="font-size: 1rem">ລາຍລະອຽດການຄົ້ນຫາຄົ້ນຫາສະມາຊິກຫ້ອງແຖວ</a>

            <a class="btn btn-success float-end px-6 mx-2" href="{{ route('register_member.create') }}">ເພີ່ມສະມາຊິກໃໝ່</a>
            <a class="btn btn-primary float-end px-6 mx-2" href="{{ route('register_member.index') }}">ຍອນກັບ</a>
            </div>
           

            <div class="card-body px-3 pt-1 pb-2 ">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-secondary font-weight-bolder opacity-10">ລຳດັບ</th>
                      <th class="text-secondary font-weight-bolder opacity-10">ຊື່ສະມາຊິກ</th>
                      <th class="text-secondary font-weight-bolder opacity-10">ເບີໂທ</th>
                      <th class="text-secondary font-weight-bolder opacity-10">ບ້ານ</th>
                      <th class="text-secondary font-weight-bolder opacity-10">ເມືອງ</th>
                      <th class="text-secondary font-weight-bolder opacity-10">ແຂວງ</th>
                      <th class="text-secondary opacity-10">ຈັດການ</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($memberget as $item)
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
                            <h6 class="mb-0 text-md">{{ $item->users->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-2">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">{{ $item->phone }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-2">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">{{ $item->village }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-2">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">{{ $item->district }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-2">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">{{ $item->province }}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-right">
                      <form action="{{ route('register_member.delete', $item->id) }}" method="POST" >
                        <a href="{{ route('register_member.edit',$item->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Edit roomtype">
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
{{--   
                {{ $memberget->links('pagination::bootstrap-4') }} --}}
                
              </div>
            </div>
{{-- 
              {{ $roomtype->links('pagination::bootstrap-4') }} --}}
              
            </div>
          </div>
        </div>
      </div>
    </div>

{{-- End table  --}}
@endsection