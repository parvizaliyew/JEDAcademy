@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($ser_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($ser_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $ser_seo->translate('title') }}@endsection

@section('content')
<!--certificate end-->
<!--certificate true start-->
@if($ser)
<section id="certificate-true">
    <div class="container">
        <div class="row">
            <form action="{{ route('search') }}" method="GET" class="certificate-search">
                <input type="text" name="number" placeholder="Sertifikat nömrənizi daxil edin.">
               <button type="submit">
                         <img src="{{ asset('front/') }}/./img/cer-search.png" alt="">
                    </button>
            </form>
            <div class="table">
                <p class="table-item table-head">
                    Sertifikatın nömrəsi
                </p>
                <p class="table-item table-head">
                    Sertifikatın sahibi
                </p>
                <p class="table-item table-head">
                    Bitirdiyi kurs
                </p>
                <p class="table-item table-head">
                    Verilmə tarixi
                </p>
                <p class="table-item table-head">
                    Sertifikatın növü
                </p>
                <p class="table-item table-body">
                   {{$ser->number}}
                </p>
                <p class="table-item table-body">
                    {{ $ser->name }}
                </p>
                <p class="table-item table-body">
                    {{ $ser->course }}
                </p>
                <p class="table-item table-body">
                    {{ Carbon\Carbon::parse($ser->date)->format('d.m.Y') }}
                </p>
                <p class="table-item table-body">
                    @if($ser->type==1)
                    Standart sertifikat
                    @else
                    Fərqlənmə sertifikat
                    @endif 
                </p>
            </div>
            <div class="cer-img">
                <img src="{{ asset($ser->img) }}" alt="">
            </div>
        </div>
    </div>
</section>

@else
<section id="certificate-true">
    <div class="container">
        <div class="row">
            <form action="{{ route('search')}}" method="GET" class="certificate-search">
                <input name="number" type="text" placeholder="Sertifikat nömrənizi daxil edin.">
               <button type="submit">
                         <img src="{{ asset('front/') }}/./img/cer-search.png" alt="">
                </button>
            </form>
            <p class="cer-false">
                Qeyd olunan nömrəyə uyğun sertifikat tapılmadı.
            </p>
            <div class="cer-img">
                <img src="{{ asset('front/') }}/./img/certifacate.png" alt="">
                <img src="{{ asset('front/') }}/./img/false-icon.png" alt="" class="cer-true">
            </div>
        </div>
    </div>
</section>
@endif

<!--certificate true end-->
<!--certificate false start-->


@endsection