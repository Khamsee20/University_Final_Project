@extends('layouts.booking')

@section('content')

<div class="wrapper">
   

   
    <section id="pricing-table">
        <div class="container">
            <div class="row">
            

                <div class="col-md-15 col">
                    <div class="block text-center" data-wow-delay=".3s" style="margin-top: 20px">
                   <form action="{{ route('booking.store',$rooms->id) }}" method="POST">
                    <ul>
                        <li>
                            <h2>ຈອງຫ້ອງແຖວ {{ $rooms->name }}</h2>
                        </li>
                        @csrf
                        @if ($message = Session::get('success'))
                            <div class="col-6 col-m-6 col-sm-6 p-2">
                                <span style="color: #0fa034"><i class="fas fa-check"></i>
                                    {{ $message }}</span>
                        @endif
                        <li><h3>ເລືອກວັນທີທີ່ທ່ານການເຂົ້າເບິ່ງຫ້ອງແຖວ</h3></li>
                        <li><input style="color: black;height: 45px; width:250px; text-align: center;border-radius: 3px" type="date" name="intodate"></li>
                      
                        <li>
                            
                            <button type="submit" class="btn btn-buy" style="margin-right: 25px">ຈອງເລີຍ</button>

                            <a href="{{ URL::previous() }}" class="btn btn-buy btn-close" style="color: orange">ຍົກເລີກ</a>

                            </a>
                        </li>
                    </ul>
                   </form>
                    </div>

            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <H2>ບົດຈົບຊັ້ນ</H2>
                        <p>ຂອງນັກສຶກສາເຊື່ອມຕໍ່ເນື່ອງ ປະລິນຍາຕີ ມະຫາວິທະຍາໄລແຫ່ງຊາດ, ຄະນະວິທະຍາສາດທຳມະຊາດ, ສາຂາວິທະຍາສາດຄອມພິວເຕີ</p>
                        <P>ສົກຮຽນ 2022 - 2023</P>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection