@extends('admin.layouts.master')

@section('title')
Tez-tez verilən suallar
@endsection

@section('content')

<div class="main_content_iner ">
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tez-tez verilən suallar</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Table</h4>

                                    <div class="add_button ms-2">
                                        <a href="{{ route('admin.question.create') }}" class="btn_1">Əlavə et</a>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sual</th>
                                            <th scope="col">Kurs</th>
                                            <th scope="col">Prosesler</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                        @foreach ($questions as $item)
                                         <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            @php
                                            $course=App\Models\Course::where('id',$item->course_id)->first()
                                            @endphp
                                            <td>{{ Str::limit($item->translate('title'),20,'...') }}</td>
                                            <td>@if($course) {{Str::limit($course->translate('title'),20,'...')}} @else Əsas suallar @endif</td>
                                            <td class="d-flex" style="font-size: 20px;">
                                                <a class="btn btn-primary" href="{{ route('admin.question.edit',$item->id) }}"><i class="ti-pencil"></i></a>
                                                <a class="btn btn-danger delete" href="{{ route('admin.question.delete',$item->id) }}"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
            </div>
        </div>
    </div>
</div>
</div>

@push('js')
<script>
    $('.delete').on('click', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(url)
                    .then(resp => resp.json())
                    .then(data => {
                        if (data.code == 204) {
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            );

                            setInterval(() => {
                                window.location.reload();
                            }, 2500);
                        }
                    })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        })
    });

</script>
@endpush

@endsection
