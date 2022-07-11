@extends('layouts.user-layout')

@section('content')

<div class="wrapper">
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>ຍິນດີຕອນຮັບສູ່ເວັບໄຊຣຄົ້ນຫາຫ້ອງແຖວເຂດໃກ້ຄຽງ <br> ມະຫາວິທະຍາໄລແຫ່ງຊາດ</h1>
                        <h2>ພວກເຮົາບໍລິສິດ ບີເອສ (BS) ຂໍເປັນສວນໜຶ່ງໃນການອຳນວຍຄວາມສະດວກ <br> ໃຫ້ແກ້ ນັກຮຽນ ນັກສຶກສາ ແລະ ບຸກທົ່ວໄປ ທີ່ຍາກຊອກຫາຫ້ອງແຖວດີຈັກຫ້ອງໜຶ່ງທີ່ຢູ່ໃກ້ມະຫາວິທະຍາໄລແຫ່ງຊາດ</h2>
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
                        <h2>ຫ້ອງແຖວແບບ {{ $rrt->name }}</h2>
                        <p>ທ່ານສາມາດເລືອກເບິ່ງໄດ້ຕາມສະບາຍ ພວກເຮົາມີຫ້ອງແຖວລາກຫຼາຍຮູບແບບໃຫ້ທ່ານໄດ້ເລືອກຈ້ອງ<br> ພວກເຮົາຍິນໃຫ້ບໍລິການແກທຸກໆທ່ານ</p>
                    </div>
                    <div class="block">
                        <div class="recent-work-mixMenu">
                            <ul>
                                <li><a href="{{ url('/home'.'#portfolio') }}" type="button" class="filter" data-filter="all">|  ຫ້ອງແຖວທັງໝົດ </a></li>
                                @foreach ($rt as $item)
                                <li><a href="{{url('user_show_roomtype'.$item->id.'#portfolio')}}" type="button" class="filter" data-filter="">|  ຫ້ອງແຖວ  {{ $item->name }} |</a></li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="recent-work-pic">
                            <ul id="mixed-items">

                                @foreach ($rrr as $item)
                                @if ($item->roomtype_id == $rrt->id)
                                    
                                <li class="mix category-1 col-md-4 col-xs-6" data-my-order="1">
                                <a class="" href="{{ route('user_room.details',$item->id) }}">
                                        <img style="border-radius: 5px;" src="{{ url(('uploads/'.$item->image)) }}" alt="" width="100%" height="350px">
                                        <div class="overlay">
                                            <h2> ຫ້ອງແຖວ : {{ $item->name }}</h2>
                                            <h3 class="h32"> ລາຄ່າເຊົ່າ / ເດືອນ {{ $item->price }}</h3>
                                            <h3>  ບ້ານ {{ $item->village }}</h3>
                                        </div>
                                    </a>
                                </li>
                                @endif
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
                    <h2>ລາຍການຈອງຂອງທ່ານມີ ລາຍການ</h2>
                    <p>ທ່ານສາມາດຍົກເລີກໄດ້ <br> </p>
                </div>

                <div class="col-md-4 col">
                    <div class="block text-center wow fadeInLeft" data-wow-delay=".3s">
                        <ul>
                            <li>
                                <h4>STARTER PACK</h4>
                                <p>&#36; 40 <span>/Month</span></p>
                            </li>
                            <li><p>Unlimited Downloads</p></li>
                            <li><p>Unlimited Uploads</p></li>
                            <li><p>Unlimited Email Accounts</p></li>
                            <li><p> Email Forwards </p></li>
                            <li><p>Cloud Storage</p></li>
                            <li><p>Screen Share</p></li>
                            <li>
                                <a href="#" class="btn btn-buy">BUY NOW</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col">
                    <div class="block text-center wow zoomIn" data-wow-delay=".3s">
                        <ul>
                            <li>
                                <h4>STARTER PACK</h4>
                                <p>&#36; 40 <span>/Month</span></p>
                            </li>
                            <li><p>Unlimited Downloads</p></li>
                            <li><p>Unlimited Uploads</p></li>
                            <li><p>Unlimited Email Accounts</p></li>
                            <li><p> Email Forwards </p></li>
                            <li><p>Cloud Storage</p></li>
                            <li><p>Screen Share</p></li>
                            <li>
                                <a href="#" class="btn btn-buy">BUY NOW</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col">
                    <div class="block text-center wow fadeInRight" data-wow-delay=".3s">
                        <ul>
                            <li>
                                <h4>STARTER PACK</h4>
                                <p>&#36; 40 <span>/Month</span></p>
                            </li>
                            <li><p>Unlimited Downloads</p></li>
                            <li><p>Unlimited Uploads</p></li>
                            <li><p>Unlimited Email Accounts</p></li>
                            <li><p> Email Forwards </p></li>
                            <li><p>Cloud Storage</p></li>
                            <li><p>Screen Share</p></li>
                            <li>
                                <a href="#" class="btn btn-buy">BUY NOW</a>
                            </li>
                        </ul>
                    </div>
                </div>

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
                <div class="teamcenter">
                <div class="col-md-6  col-sm-4 col-xs-6 ">
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
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
                    <h2>ຕິດຕໍ່ຫາພວກເຮົາ</h2>
                    <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
                </div>
                <div class="col-md-6 col">
                    <!-- map -->
                    <div class="map">
                      <div id="googleMap"></div>
                   </div><!--/map-->

                </div>
                <div class="col-md-6">
                    <form>
                        <input type="text" class="form-control" placeholder="ຊື່ຂອງທ່ານ">
                        <input type="text" class="form-control" placeholder="ອີເມວ">
                        <textarea class="form-control" rows="3" placeholder="ຂໍ້ຄວາມ"></textarea>
                        <button class="btn btn-default" type="submit">ສົ່ງຂໍ້ຄວາມ</button>
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