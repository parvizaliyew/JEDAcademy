<div class="container-fluid g-0">
    <div class="row">
    <div class="col-lg-12 p-0 ">
    <div class="header_iner d-flex justify-content-between align-items-center">
    <div class="sidebar_icon d-lg-none">
    <i class="ti-menu"></i>
    </div>
    <div class="serach_field-area d-flex align-items-center">
    
    <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
    </div>
    <div class="header_right d-flex justify-content-between align-items-center">
    <div class="header_notification_warp d-flex align-items-center">
    <li>
    <a class="bell_notification_clicker nav-link-notify" href="#"> <img src="{{asset('manager/')}}/img/icon/msg.svg" alt="">
    </a>
    
    <div class="Menu_NOtification_Wrap">
    <div class="notification_Header">
    <h4>Bildirişlər</h4>
    </div>
    <div class="Notification_body">

@php
$messages=App\Models\ContactMessage::orderby('id','DESC')->take(10)->get()
@endphp
@foreach($messages as $item)

    <div class="single_notify d-flex align-items-center">
    <div class="notify_thumb">
    </div>
    <div class="notify_content">
    <a href="{{route('admin.message.edit',$item->id)}}"><h5>{{$item->name}}</h5></a>
    <p >{{ ($item->created_at->diffForHumans()) }}    <span  style=" color: green; font-size:15px ; font-weight:600">  göndərildi</span> </p>
    </div>


    </div>
            <div style="border-bottom: 1px dotted #000080;margin-bottom: 10px"></div>

@endforeach
<span style="border:1px;solid;red"></span>
    </div>
    <div class="nofity_footer">
    <div class="submit_button text-center pt_20">
    <a href="{{route('admin.message.index')}}" class="btn_1">Ətraflı</a>
     </div>
    </div>
    </div>
    
    </li>
    
    </div>
    <div class="profile_info">
    <img src="{{asset('manager/')}}/img/client_img.png" alt="#">
    <div class="profile_info_iner">
    <div class="profile_author_name">
       
    <p> </p>
    <h5>{{ Auth::user()->name }}  </h5>
    </div>
    <div class="profile_info_details">
    <a href="{{ route('admin.profil_update') }}">Mənim Profilim </a>
    <a href="{{ route('admin.logout') }}">Çıxış</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>