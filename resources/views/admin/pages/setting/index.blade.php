@extends('admin.layouts.master')

@section('title')
Əlaqə
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Əlaqə</h3>
        </div>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <div class="lang">
                    <a href="az" class="btn btn-success active">Az</a>
                    <a href="en" class="btn btn-success">En</a>
                    <a href="ru" class="btn btn-success">Ru</a>
                </div>
            </nav>
        </div>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.setting.update',$setting->id) }}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
               <div class="form-group ">
                   <label for="">Nömrə 1</label>
                   <input type="text" name="phone_1" class="form-control" value='{{ $setting->phone_1 }}'>
               </div>
               @error('phone_1')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Nömrə 2</label>
                    <input type="text" name="phone_2" class="form-control" value='{{ $setting->phone_2 }}'>
                </div>
                @error('phone_2')
                <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
             </div>

             <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Nömrə 3</label>
                    <input type="text" name="phone_3" class="form-control" value='{{ $setting->phone_3 }}'>
                </div>
                @error('phone_2')
                <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
             </div>
           </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Ünvan</label>
                   <input type="hidden" name="adress" value='{{ $setting->adress }}'>
                   <input value="{{ $setting->translate('adress') }}"  class="form-control">
               </div>
               @error('adress')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
           </div>
        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group ">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value='{{ $setting->email }}'>
            </div>
            @error('name')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
         </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
               <div class="form-group ">
                   <label for="">Facebook</label>
                   <input type="text" name="fb" class="form-control" value='{{ $setting->fb }}'>
               </div>
               @error('fb')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Instagram</label>
                    <input type="text" name="ins" class="form-control" value='{{ $setting->ins }}'>
                </div>
                @error('ins')
                <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
             </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="">Twitter</label>
                    <input type="text" name="tw" class="form-control" value='{{ $setting->tw }}'>
                </div>
                @error('ins')
                <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
             </div>
           </div>

           <div class="row mb-3">
            <div class="col-md-4">
               <div class="form-group ">
                   <label for="">WhatsApp</label>
                   <input type="text" name="wp" class="form-control" value='{{ $setting->wp }}'>
               </div>
            
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Linkedin</label>
                    <input type="text" name="ln" class="form-control" value='{{ $setting->ln }}'>
                </div>
           
             </div>
           
             <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Youtube</label>
                    <input type="text" name="you" class="form-control" value='{{ $setting->you }}'>
                </div>
           
             </div>
           </div>
       
           <div class="row mb-3">
            <div class="col-md-4">
               <div class="form-group ">
                   <label for="">Telegram</label>
                   <input type="text" name="tg" class="form-control" value='{{ $setting->tg }}'>
               </div>
               @error('fb')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
        </div>


        </div>
                </div>

        <button type="submit" class="btn btn-primary">Yenilə  </button>
        </form>
        <hr>
<h1 style="font-weight:900">Ayarlar</h1>
</br>

  <div class="row mb-3">
         <label style="font-size:26px" for="">Müəllimlər</label>
            <div class="form-check">

                <input class="form-check-input" type="checkbox" name="teacher_aktiv" value="1" onclick="aktivButton({{ $setting->id }})"  @if ($setting->teacher_aktiv==1)
                checked
                @endif
         id="flexCheckDefault">
                <label style="font-size:18px" class="form-check-label" for="flexCheckDefault">
                  Aktiv
                </label>
              </div>
              
        </div>
        </div>
        </div>
</div>
</div>

@endsection 
@push('js')
<script>
function aktivButton(id)
{
    var id =id;
    
    $.ajax({
        url:"{{route('admin.setting_aktiv')}}",
        type:"post",
        data:{
            id:id,
            _token: '{{csrf_token()}}',
        },
        success:function(result)
        {
            console.log(result);
            if(result.result==1)
            {
                 console.log('aktivdir')
            }
            else
            {
                console.log('aktiv deyil')

            }
        }

    })
    }

</script>
<script src="{{ asset('manager/js/translate.js') }}"></script>
<script src="{{ asset('manager/vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('manager/js/cketditor.js') }}"></script>
@endpush
