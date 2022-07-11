@extends('layouts.user-layout')

@section('content')

    <div class="wrapper">
        <section id="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h1>ຍິນດີຕອນຮັບສູ່ເວັບໄຊຣຄົ້ນຫາຫ້ອງແຖວເຂດໃກ້ຄຽງ <br> ມະຫາວິທະຍາໄລແຫ່ງຊາດ</h1>
                            <h2>ພວກເຮົາບໍລິສິດ ບີເອສ (BS) ຂໍເປັນສວນໜຶ່ງໃນການອຳນວຍຄວາມສະດວກ <br> ໃຫ້ແກ້ ນັກຮຽນ ນັກສຶກສາ ແລະ
                                ບຸກຄົນທົ່ວໄປ ທີ່ຍາກຊອກຫາຫ້ອງແຖວດີໆຈັກຫ້ອງໜຶ່ງທີ່ຢູ່ໃກ້ມະຫາວິທະຍາໄລແຫ່ງຊາດ</h2>
                            <div class="buttons">
                                <a href="#pricing-table" class="btn btn-learn">ລາຍຈອງຂອງຂ້ອຍ</a>
                                <a href="#portfolio" class="btn btn-learn">ເບິ່ງຫ້ອງແຖວທັງໝົດ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scrolldown">
                <a id="scroll" href="#portfolio" class="scroll"></a>
            </div>
        </section>

        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>ຫ້ອງແຖວທັງໝົດ</h2>
                            <p>ທ່ານສາມາດເລືອກເບິ່ງໄດ້ຕາມສະບາຍ ພວກເຮົາມີຫ້ອງແຖວລາກຫຼາຍຮູບແບບໃຫ້ທ່ານໄດ້ເລືອກຈ້ອງ<br>
                                ພວກເຮົາຍິນໃຫ້ບໍລິການແກທຸກໆທ່ານ</p>
                        </div>
                        <div class="block">
                            <div class="recent-work-mixMenu">
                                <ul class="mx-3">
                                    <li><a href="#portfolio" type="button" class="filter" data-filter="all">|
                                            ຫ້ອງແຖວທັງໝົດ</a></li>
                                    @foreach ($rt as $item)
                                        <li><a href="{{ url('user_show_roomtype' . $item->id . '#portfolio') }}"
                                                type="button" class="filter" data-filter="">| ຫ້ອງແຖວ {{ $item->name }}
                                                |</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            


                            <div class="recent-work-pic">
                                <ul id="mixed-items">

                                    @foreach ($rrr as $item)
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
                                {{ $rrr->links('pagination::bootstrap-4') }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="pricing-table">
            <div class="container">
                <div class="row">
                    <div class="title">

                        <h2>ລາຍການທີ່ທ່ານຈອງໄວ້ມີ {{ $cbooking }} ລາຍການ</h2>
                        <a href="{{ route('booking.history') }}">
                            <p style="background: orange; font-size: 18px; width: 15%; border-radius: 20px; margin: auto">
                                ເບິ່ງປະຫວັດການຈອງ <br> </p>
                        </a>
                    </div>
                    @if ($cbooking == 0)
                        <div class="title">
                            <h1 style="color: whitesmoke">ຍັງບໍ່ມີການຈອງຫ້ອງແຖວ...</h1>

                            <a href="{{ route('booking.history') }}"
                                style="border-radius: 20px; margin-top: 5%; background: white"
                                class="btn btn-buy">ເບິ່ງປະຫວັດການຈອງ</a>

                        </div>
                    @else
                        @foreach ($booking as $bget)
                            <div class="col-md-4 col" style="margin-top: 15px">
                                <div class="block text-center wow fadeInLeft" data-wow-delay=".3s">
                                    <ul>
                                        <li>
                                            <p style="font-size: 2.5rem">ຫ້ອງແຖວ : {{ $bget->room->name }} </p>
                                            <h4 style="margin-top: 15px">ລາຄ່າ : {{ $bget->room->price }} ກີບ <span>/
                                                    ເດືອນ</span>
                                            </h4>
                                        </li>
                                        <li>
                                            <h4>ບ້ານ : {{ $bget->room->village }}</h4>
                                        </li>
                                        <li>
                                            <h4>ວັນທີ ທີ່ທ່ານຈອງ :
                                                {{ date('d / m / Y', strtotime($bget->booking_date)) }}</h4>
                                        </li>
                                        <li>
                                            <h4>ວັນທີ ທີ່ທ່ານຕ້ອງເຂົ້າໄປເບິ່ງ :
                                                {{ date('d / m / Y', strtotime($bget->into_date)) }}</h4>
                                        </li>
                                        <li>
                                            <h4>ໄລຍະຫ່າງຈາກຫ້ອງແຖວ - ມຊ : {{ $bget->room->far_from }}</h4>
                                        </li>

                                        <form action="{{ route('booking.cancel', $bget->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <li>
                                                <button type="submit" style="color: orange" class="btn btn-buy"
                                                    onclick="return confirm('ທ່ານຕ້ອງການຍົກເລີກການຈອງແທ້ ຫຼື ບໍ່?')">ຍົກເລີກການຈ້ອງ</button>
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




        <section id="team">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <h2>ກ່ຽວກັບພວກເຮົາ</h2>
                        <p>ສະມາຊິກພາຍໃນກຸ່ມຂຽນບົດຈົບຊັ້ນ <br>ຄະນະວິທະຍາສາດທຳມະຊາດ ສາຂາວິທະຍາສາດຄອມພິວເຕີ</p>
                    </div>
                    <div class="team1">
                        <div class="col-md-6  col-sm-4 col-xs-6">
                            <div class="block wow fadeInLeft" data-wow-delay=".3s">
                                <img src="img/team1.jpg" alt="">
                                <div class="team-overlay">
                                    <h3>ພຣະ ຄຳສີ ຮັດສະນີ <span> ລະຫັດນັກສຶກສາ : </span></h3>
                                    <span class="icon"><i class="ion-quote"></i></span>
                                    <p>ເປັນນັກສຶກສາເຊື່ອມຕໍ່ </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6  col-sm-4 col-xs-6">
                            <div class="block wow fadeInRight" data-wow-delay=".6s">
                                <img src="img/team2.jpg" alt="">
                                <div class="team-overlay">
                                    <h3>ທ້າວ ຄຳເຮືອງ ຖານັນດອນ <span>ລະຫັດນັກສຶກສາ :</span></h3>
                                    <span class="icon"><i class="ion-quote"></i></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="contact-form">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <h2>ສາມາດຕິດຕໍ່ຫາພວກເຮົາໄດ້</h2>
                        <p>ທ່ານສາມາດຕິດຕໍ່ພວກເຮົາໄດ້ຕາມຊອງທາງທີ່ທ່ານສະດວກໄດ້ເລີຍ</p>
                    </div>
                    <div class="col-md-15 col text-center">
                   
                        <button class="contact_icon"><i class="fa-brands fa-facebook-square ccc" style="color: #28589c"><p>Khamsee Hsn</p></i></button>
                        <button class="contact_icon"><i class="fa-solid fa-envelope ccc" style="color:#DB4437"><p>khamsee111@gmail.com</p></i></button>
                        <button class="contact_icon"><i class="fa-brands fa-whatsapp-square ccc" style="color: #0F9D58"><p>Whatsapp : 02057081122</p></i></button>
                        <button class="contact_icon"><i class="fa-solid fa-square-phone ccc" style="color: #4285F4"><p>Tel : 02057081122</p></i></button>

                    </div>
                 
                    {{-- <div class="col-md-6">
                        <form>
                            <input type="text" class="form-control" placeholder="ຊື່ຂອງທ່ານ">
                            <input type="text" class="form-control" placeholder="ອີເມວ">
                            <textarea class="form-control" rows="3" placeholder="ຂໍ້ຄວາມ"></textarea>
                            <button class="btn btn-default" type="submit">ສົ່ງຂໍ້ຄວາມ</button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </section>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <H2 style="color:whitesmoke; letter-spacing: 2px;">ບົດຈົບຊັ້ນ</H2>
                            <p style="color:whitesmoke; letter-spacing: 2px;">ຂອງນັກສຶກສາເຊື່ອມຕໍ່ເນື່ອງ ປະລິນຍາຕີ ມະຫາວິທະຍາໄລແຫ່ງຊາດ, ຄະນະວິທະຍາສາດທຳມະຊາດ,
                                ສາຂາວິທະຍາສາດຄອມພິວເຕີ</p>
                            <P style="color:whitesmoke; letter-spacing: 2px;">ສົກຮຽນ 2022 - 2023</P>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
   






@endsection
