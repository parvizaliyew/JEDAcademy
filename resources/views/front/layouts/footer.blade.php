  <!--footer start-->
  <footer>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('front/') }}/./img/jedlogo.svg" alt="">
                </a>
                <p class="foot-logo-text">
                    IT kursları və Proqramlaşdırma kursları
                </p>
                <div class="foot-social">
                    <a target="_blank" href="{{ $contact->fb }}">
                        <img src="{{ asset('front/') }}/./img/face-icon.png" alt="">
                    </a>
                    <a target="_blank" href="{{ $contact->ins }}">
                        <img src="{{ asset('front/') }}/./img/insta-icon.png" alt="">
                    </a>
                    <a target="_blank" href="{{ $contact->ln }}">
                        <img src="{{ asset('front/') }}/./img/linkedin-icon.png" alt="">
                    </a>
                    <a target="_blank" href="{{$contact->tg }}">
                        <img src="{{ asset('front') }}/./img/telegram.png" alt="">
                    </a>
                    <a target="_blank" href="{{ $contact->you }}">
                        <img src="{{ asset('front') }}/./img/youtube.png" alt="">
                    </a>
                    <a target="_blank" href="https://wa.me/{{ $contact->wp }}">
                        <img src="{{ asset('front/') }}/./img/wp-icon.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-2">
                <ul class="foot-list">
                    <li class="foot-item">
                        <a href="{{route('index.'.app()->getLocale())}}">
                            Ana səhifə
                        </a>
                    </li>
                    <li class="foot-item">
                        <a href="{{route('about.'.app()->getLocale())}}">
                            Akademiya
                        </a>
                    </li>
                    <li class="foot-item">
                        <a href="{{route('course.'.app()->getLocale())}}">
                            Kurslar
                        </a>
                    </li>
                    <li class="foot-item">
                        <a href="{{route('vacancy.'.app()->getLocale())}}">
                            Vakansiyalar
                        </a>
                    </li>
                    <li class="foot-item">
                        <a href="{{route('contact.'.app()->getLocale())}}">
                            Əlaqə
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-4">
            @php
            $courses=App\Models\Course::get();
            @endphp
                <ul class="foot-list">
                    @foreach($courses as $item)
                    <li class="foot-item">
                        <a href="{{route('course_single.'.app()->getLocale(),$item->slug[app()->getLocale()])}}">
                            {{$item->translate('title')}}
                        </a>
                    </li>
                    @endforeach
                   
                </ul>
            </div>
            <div class="col-2">
                <div class="foot-addres">
                    <img src="{{ asset('front/') }}/./img/foot-loc.png" alt="">
                    <p class="foot-addres-text">
                        {{$contact->translate('adress')}}
                    </p>
                </div>
                <div class="foot-phone">
                    <img src="{{ asset('front/') }}/./img/foot-phone.png" alt="">
                    <div class="foot-numbers">
                        <a href="tel:{{ str_replace(' ','',$contact->phone_1) }}">{{$contact->phone_1}}</a>
                        <a href="tel:{{ str_replace(' ','',$contact->phone_2) }}">{{$contact->phone_2}}</a>
                        <a href="tel:{{ str_replace(' ','',$contact->phone_3) }}">{{$contact->phone_3}}</a>
                    </div>
                </div>
                <div class="foot-mail">
                    <img src="{{ asset('front/') }}/./img/foot-mail.png" alt="">
                    <a href="mailTo:{{$contact->email}}">
                       {{$contact->email}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="foot-bottom">
        <div class="container">
            <div class="row">
                <p class="foot-bottom-text">
                    © 2022 JED Academy. Müəllif hüquqları qorunur
                </p>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
    integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('front/') }}/./js/owl.carousel.min.js"></script>
<script src="{{ asset('front/') }}/./js/swiper.min.js"></script>
<script src="{{ asset('front/') }}/./js/main.js"></script>
</body>

</html>