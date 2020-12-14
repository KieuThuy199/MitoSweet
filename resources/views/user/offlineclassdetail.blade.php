@extends('user.layout.layout')
@section('content')

<section class="order-detail">
    <div class="container mt-3">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{ url('index') }}">Trang chủ</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ url('offline-class') }}">Khóa học thực hành</a></li>
                @foreach ($offline as $item)
                    <li class="breadcrumb-item active" aria-current="page">{{$item->title}}</li>
                @endforeach
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row detail mb-3">
            <div class="col-lg-7 col-md-12 col-12" id="my-img">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    @foreach ($offline as $item)
                        <ul class="carousel-indicators">
                            @for ($i = 0; $i < count(explode(",", $item->img)); $i++)
                                @if ($i == 0)
                                    <li data-target="#demo" data-slide-to="{{$i}}" class="active"></li>
                                @else
                                    <li data-target="#demo" data-slide-to="{{$i}}"></li>
                                @endif
                            @endfor
                        </ul>
                        <div class="carousel-inner">
                            @foreach (explode(",", $item->img) as $key=>$slide)
                                @if ($key == 0)
                                    <div class="carousel-item active">
                                        <img src="{{$slide}}" width="100%" >
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{$slide}}" width="100%" >
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                    <a class="carousel-control-prev " href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 col-12">
                <div class="online-title-detail">
                    <h5 class="ontitle mb-3">Chi tiết</h5>
                    <i class="icon-detail"><img src="{{ asset('img/level1.png') }}"></i>
                    @foreach ($offline as $item)
                        @foreach ($level as $levels)
                            @if ($item->level == $levels->id)
                                <span>{{ $levels->title }}</span>
                            @endif
                        @endforeach
                    @endforeach
                    <br>
                    <i class="icon-detail"><img src="{{ asset('img/icon_1.png') }}"></i>
                    @foreach ($offline as $item)
                        <span>{{ $item->lesson }} bài</span>
                    @endforeach
                    {{-- <br>
                    <i class="icon-detail"><img src="{{ asset('img/icon_2.png') }}"></i> --}}
                    <div class="section_7_signup" style="text-align:left"><a href="" >Mua</a></div>
                </div>
                <div class="col-lg-12 section_7_title">
                    <button class="btn icon-show collapsed" data-toggle="collapse" data-target="#intro" style="margin:0 10px 3px 0;"></button>
                    <a style="text-transform: uppercase;">Giới thiệu</a>
                </div>
                <div class="col-lg-12"><hr class="hr mt-0"></div>
                <div id="intro" class="col-lg-12 section_7_content collapse">
                    @foreach ($offline as $item)
                        <h5>{{$item->summary}}</h5>
                    @endforeach
                    <div class="body-detail">
                    <div class="content-detail">
                        <div class="row btn-detail">
                            <div class="col-md-6 col-6 btn-trailer">
                                <!-- <button type="button" class="btn  text-uppercase" onclick="window.location.href='https://www.youtube.com/watch?v=XX6eO8ivkq0'">trailer</button> -->
                            </div>
                            <div class="col-md-6 col-6 btn-buy">
                                <button type="button" class="btn text-uppercase">Mô tả</button>
                            </div>
                            <div class="col-lg-12"><hr class="hr mt-4 mb-0"></div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
        <div class="modal modal-img">
            <span class="close">&times;</span>
            <div id="zoom-slide" class="carousel slide" data-ride="carousel" data-interval="false">
                @foreach ($offline as $item)
                    <div class="carousel-inner">
                        @foreach (explode(",", $item->img) as $key=>$slide)
                            @if ($key == 0)
                                <div class="carousel-item active">
                                    <img class="modal-content modal-img-content" src="{{$slide}}" width="100%" >
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img class="modal-content modal-img-content" src="{{$slide}}" width="100%" >
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
                <a class="carousel-control-prev" href="#zoom-slide" data-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carousel-control-next" href="#zoom-slide" data-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
    </div>

    <script>
        var img = document.querySelectorAll('#my-img img'),
        modal = document.querySelector('.modal'),
        modalImg = document.getElementById("img01");

        img.forEach(function (image) {

            image.addEventListener('click', function(event) {

                modal.style.display = 'block';
                modalImg.src = this.src;
            });
        });
        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
    </div>
</section>

    <section class="container">
        <div class="col-lg-12">
        <div class="row mt-5">
            <div class="col-lg-3 title-related">Related Classed</div>
            <div class="col-lg-9 strong"></div>
        </div>
        </div>
    </section>

    <section class="related">
        <div class="container">
            <div id="mixedSlider">
                <div class="MS-content">
                    <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/img_Slider_little_section_7_1.jpg" class="card-img-top" >
                            <h6 class="content_slider">Skill : BEGINER</h6>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/img_Slider_little_section_7_2.jpg" class="card-img-top">
                            <h6 class="content_slider">Skill : BEGINER</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="imgTitle">
                        <div class="card">
                            <img src="img/img_Slider_little_section_7_3.jpg" class="card-img-top" >
                            <h6 class="content_slider">Skill : BEGINER</h6>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                    <div class="imgTitle">
                        <div class="card">
                        <img src="img/img_Slider_little_section_7_4.jpg" class="card-img-top" >
                        <h6 class="content_slider">Skill : BEGINER</h6>
                    </div>
                    </div>
                    </div>
                    <div class="item">
                    <div class="imgTitle">
                        <div class="card">
                        <img src="img/img_Slider_little_section_7_4.jpg" class="card-img-top" >
                        <h6 class="content_slider">Skill : BEGINER</h6>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="MS-controls">
                    <button class="MS-left"><img src="img/arrow_left.png" style="width: 50%;"></button>
                    <button class="MS-right"><img src="img/arrow_right.png" style="width: 50%;"></button>
                </div>
            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/multislider.js') }}"></script>
    <script>
        $('#basicSlider').multislider({
                    continuous: true,
                    duration: 2000
                });
                $('#mixedSlider').multislider({
                    duration: 500,
                    interval: 3000
                });
    </script>

    <section class="container ">
        <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-3 title-related">Trending Tags</div>
            <div class="col-lg-9 strong"></div>
        </div>
        </div>
    </section>

    <section >
        <div class="container">
        <div class="col-lg-12">
            <div class="row section_7_tt">
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            <div class="col-md-2 col-6">
                <button>Aliquam Lorem</button>
            </div>
            </div>
        </div>

        </div>

    </section>

@endsection
