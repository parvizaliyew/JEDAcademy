@extends('admin.layouts.master')

@section('title')
Müəllim Kurs Əlaqə
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
                                    <h3 class="m-0">Müəllim Kurs Əlaqə</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Table</h4>

                                    <div class="add_button ms-2">
                                        <a href="{{ route('admin.teacher-course.create') }}" class="btn_1">Əlavə et</a>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Kurslar</th>
                                            <th scope="col">Müəllimlər</th>
                                            <th scope="col">Prosesler</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                        @foreach ($teachers_course as $item)
                                        @php
                                            $kurs=App\Models\Course::where('id',$item->course_id)->first();
                                            $teacher=App\Models\Teacher::where('id',$item->teacher_id)->first();
                                        @endphp
                                         <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ Str::limit($kurs->translate('title'), 45, '...') }}</td>
                                            <td>{{ Str::limit($teacher->translate('name'), 35, '...') }}</td>
                                            <td class="d-flex" style="font-size: 20px;">
                                                <a class="btn btn-danger delete" href="{{ route('admin.teacher-course.delete',$item->id) }}"><i class="ti-trash"></i></a>
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
