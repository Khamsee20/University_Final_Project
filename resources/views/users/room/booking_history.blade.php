@extends('layouts.user-layout')

@section('content')

    <div class="wrapper">
           
        <section id="pricing-table">
            <div class="container">
                <div class="row">
                    <div class="title">

                        <h2>ປະຫວັດການຈອງຂອງທ່ານມີ {{ $ccbooking }} ລາຍການ</h2>
                        <a href="{{ route('users.index','#pricing-table') }}"><p style="background: orange; font-size: 18px; width: 80px; border-radius: 20px; margin: auto"> ຍອນກັບ <br> </p></a>
                       
                    </div>
                    @if ($ccbooking == 0)
                        <div class="title">
                            <h1 style="color: whitesmoke">ຍັງບໍ່ມີປະຫວັດການຈອງ...</h1>

                            <a href="{{ route('users.index','#pricing-table') }}" type="submit" style="border-radius: 20px; margin-top: 5%; background: white"
                                class="btn btn-buy">ຍອນກັບ</a>

                        </div>
                    @else
                        @foreach ($booking_cancel as $bget)
                            <div class="col-md-4 col" style="margin-top: 15px">
                                <div class="block text-center wow fadeInLeft" data-wow-delay=".3s">
                                    <ul>
                                        <li>
                                            <p style="font-size: 2.5rem">ຫ້ອງແຖວ : {{ $bget->room->name }} </p>
                                            <h4 style="margin-top: 15px">ຍົກເລີກຈອງ ວັນທີ {{ date('d / m / Y', strtotime($bget->updated_at)); }}
                                            </h4>
                                        </li>
                                        <li>
                                            <h4>ບ້ານ : {{ $bget->room->village }}</h4>
                                        </li>
                                        <li>
                                            <h4>ວັນທີ ທີ່ທ່ານຈອງ : {{ date('d / m / Y', strtotime($bget->booking_date)); }}</h4>
                                        </li>
                                        <li>
                                            <h4>ວັນທີ ທີ່ທ່ານຕ້ອງເຂົ້າໄປເບິ່ງ : {{ date('d / m / Y', strtotime($bget->into_date)); }}</h4>
                                        </li>
                                        <li>
                                            <h4>ໄລຍະຫ່າງຈາກຫ້ອງແຖວ - ມຊ : {{ $bget->room->far_from }}</h4>
                                        </li>

                                        <form action="{{ route('delete.booking_cancel',$bget->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <li>
                                                <button type="submit" style="color: orange" class="btn btn-buy"
                                                    onclick="return confirm('ທ່ານຕ້ອງການລົບປະຫວັດການຈອງແທ້ ຫຼື ບໍ່?')">ລົບ</button>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>




       



       


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <H2>ບົດຈົບຊັ້ນ</H2>
                            <p>ຂອງນັກສຶກສາເຊື່ອມຕໍ່ເນື່ອງ ປະລິນຍາຕີ ມະຫາວິທະຍາໄລແຫ່ງຊາດ, ຄະນະວິທະຍາສາດທຳມະຊາດ,
                                ສາຂາວິທະຍາສາດຄອມພິວເຕີ</p>
                            <P>ສົກຮຽນ 2022 - 2023</P>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
   






@endsection
