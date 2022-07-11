@extends('layouts.user-layout')

@section('content')
    <div class="wrapper">

        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>ຫ້ອງແຖວທີ່ທ່ານຄົ້ນຫາມີທັງໝົດ {{ $crooms }} ຫ້ອງແຖວ</h2>
                            <a href="{{ route('users.index') }}"><p style="background: green; font-size: 18px; width: 15%; border-radius: 20px; margin: auto; color: white">ຍອນກັບໜ້າຫຼັກ</p></a>
                        </div>
                        <div class="block">

                            <div class="recent-work-pic">
                                <ul id="mixed-items">

                                    @foreach ($rooms as $item)
                                        <li class="mix category-1 col-md-4 col-xs-6" data-my-order="1">
                                            <a class="" href="{{ route('user_room.details', $item->id) }}">
                                                <img style="border-radius: 5px;"
                                                    src="{{ url('uploads/' . $item->image) }}" alt=""
                                                    width="100%" height="350px">
                                                <div class="overlay">
                                                    <h2> ຫ້ອງແຖວ : {{ $item->name }}</h2>
                                                    <h3 class="h32"> ລາຄ່າເຊົ່າ / ເດືອນ {{ $item->price }}</h3>
                                                    <h3> ບ້ານ {{ $item->village }}</h3>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
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
