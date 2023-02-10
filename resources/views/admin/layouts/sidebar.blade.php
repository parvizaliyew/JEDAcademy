<nav class="sidebar dark_sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
    <a href="{{ route('admin.slider.index') }}"><img src="{{asset('front')}}/img/jedlogo.svg" alt=""></a>
    <div class="sidebar_close_icon d-lg-none">
    <i class="ti-close"></i>
    </div>
    </div>
    <ul id="sidebar_menu">
<li class="{{ Route::is('admin.course.index') || Route::is('admin.course.create') || Route::is('admin.course.edit') || Route::is('admin.sillabus.index') || Route::is('admin.sillabus.create') || Route::is('admin.sillabus.edit') 
 || Route::is('admin.salary.index') ||
  Route::is('admin.salary.create') || Route::is('admin.salary.edit') 
  || Route::is('admin.course-for.index') || Route::is('admin.course-for.create') || 
  Route::is('admin.course-for.edit') || Route::is('admin.support.index') || Route::is('admin.support.create') || Route::is('admin.support.edit')
   ? 'mm-active' : ''}}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <i class="ti-book"></i>
                </div>
                <span>Kurslar</span>
            </a>
            <ul class="mm-collapse">
                <li><a href="{{ route('admin.course.index') }}">Kurslar</a></li>
                <li><a href="{{ route('admin.sillabus.index') }}">Sillabuslar</a></li>
                <li><a href="{{ route('admin.salary.index') }}">Salary</a></li>
                <li><a href="{{ route('admin.support.index') }}">Karyera dəstəyi</a></li>
                <li ><a href="{{ route('admin.course-for.index') }}">Bu Kurs Kimlər </br> Üçündür?</a></li>
            </ul>
</li>

<li class="{{ Route::is('admin.register_message.index') || Route::is('admin.register_message.create') || Route::is('admin.register_message.edit') || Route::is('admin.consultation.index') || Route::is('admin.consultation.create') || Route::is('admin.consultation.edit') 
 ||Route::is('admin.message.index') || Route::is('admin.message.create') || Route::is('admin.message.edit') || Route::is('admin.subscripe.index') || Route::is('admin.subscripe.create') || Route::is('admin.subscripe.edit') ? 'mm-active' : ''}}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <i class="ti-user"></i>
                </div>
                <span>Sorğular</span>
            </a>
            <ul class="mm-collapse">
                <li><a href="{{ route('admin.register_message.index') }}">Qeydiyyat</a></li>
                <li><a href="{{ route('admin.consultation.index') }}">Konsultasiya</a></li>
                <li><a href="{{ route('admin.subscripe.index') }}">Abunəlik</a></li>
                <li><a href="{{ route('admin.message.index') }}">Əlaqə</a></li>
            </ul>
</li>

    <li  class="{{ Route::is('admin.discount.index') || Route::is('admin.discount.create') || Route::is('admin.discount.edit') ? 'mm-active' : '' }}">
        <a  href="{{ route('admin.discount.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Endirimlər</span>
        </a>
    </li>

    <li >
        <a  href="{{ route('admin.alumni.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Məzunlar</span>
        </a>
    </li>


    <li class="{{ Route::is('admin.teacher.index') || Route::is('admin.teacher.create') || 
    Route::is('admin.teacher.edit') || Route::is('admin.teacher-course.index') || 
    Route::is('admin.teacher-course.create') || Route::is('admin.teacher-course.edit') 
  ? 'mm-active' : ''}}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <i class="ti-user"></i>
                </div>
                <span>Təlimçilər</span>
            </a>
            <ul class="mm-collapse">
                <li><a href="{{ route('admin.teacher.index') }}">Təlimçilər</a></li>
                <li><a href="{{ route('admin.teacher-course.index') }}">Kurs və Müəllim Əlaqə</a></li>
            </ul>
</li>

    <li >
        <a  href="{{ route('admin.slider.index') }}" aria-expanded="false">
            <div class="icon_menu">
                <i class="ti-stats-up"></i>
            </div>
            <span>Slayder</span>
        </a>
    </li>

        <li >
        <a  href="{{ route('admin.question.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Tez-tez verilən suallar</span>
        </a>
    </li>

    <li >
        <a  href="{{ route('admin.galery.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Qalereya</span>
        </a>
    </li>

    <li >
        <a  href="{{ route('admin.certificate.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Sertifikatlar</span>
        </a>
    </li>

    <li >
        <a  href="{{ route('admin.news-event.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Bloq və Media</span>
        </a>
    </li>



    <li >
        <a  href="{{ route('admin.vacancy.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Vakansiyalar</span>
        </a>
    </li>

    <li >
        <a  href="{{ route('admin.seo.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>SEO</span>
        </a>
    </li>

    <li>
        <a  href="{{ route('admin.setting.index') }}" aria-expanded="false">
        <div class="icon_menu">
            <i class="ti-gallery"></i>
        </div>
        <span>Ayarlar</span>
        </a>
        <ul class="mm-collapse">
        </ul>
    </li>







    </ul>
    </nav>
</ul>