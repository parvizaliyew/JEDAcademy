@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($register_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($register_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $register_seo->translate('title') }}@endsection

@section('content')
<section id="register">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h3 class="register-head">
                    Qeydiyyatdan keçin
                </h3>
                <p class="register-text">
                    Lorem ipsum dolor sit amet consectetur. Scelerisque mauris tellus velit donec. Aliquet lacus sit tortor facilisis. 
                </p>
                <img src="{{ asset('front/') }}/./img/register-img.png" class="register-img" alt="">
            </div>
            <div class="col-6">
                <form method="POST" action="{{ route('register_post') }}" class="single-form single_form">
                @csrf
                    <span>
                        Kurs seçin
                    </span>
                    <select name="course_id" id="">
                        <option value="">Kursu seçin </option>
                        @foreach ($courses as $item)
                        <option @if(@isset($id)) @if($item->id==$id) selected @endif @endif value="{{ $item->id }}">
                            {{ $item->translate('title') }}
                        </option>
                        @endforeach
                    </select>
                    @error('course_id')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <span>
                        Ad
                    </span>
                    <input type="text" class="text-input" name="name" placeholder="Ad Soyad">
                    @error('name')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    
                    <span>
                    <span>
                        Email
                    </span>
                    <input type="text" name="email" placeholder="example@gmail.com">
                    @error('email')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                        Əlaqə nömrəsi
                    </span>
                    <input type="text" class="contact-number" name="phone" placeholder="+994 55 555 55 55">
                    @error('phone')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <button type="submit">
                        Müraciət et
                        <img src="{{ asset('front/') }}/./img/right-2.svg" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection