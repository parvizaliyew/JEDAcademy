<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\TeacherCourse;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\KonsultasiyaController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\CoursesController;
use App\Http\Controllers\Front\VacanciController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\SillabusController;
use App\Http\Controllers\Front\TeachersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\SubscripeController;
use App\Http\Controllers\Admin\ConsultatingController;
use App\Http\Controllers\Admin\WhoCourseController;
use App\Http\Controllers\Front\DiscountsController;
use App\Http\Controllers\Front\GraduatesController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\Admin\CertifcatController;
use App\Http\Controllers\Front\RegisterMessageController;
use App\Http\Controllers\Front\SertifkatController;
use App\Http\Controllers\Front\SubscripeMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



$locale = Request::segment(1);

if(in_array($locale, ['az','en','ru'])){
    App::setLocale($locale);
}else{
    App::setLocale('az');

    $locale = '';
}


Route::name('admin.')->prefix('/admin')->group(function () {

Route::group(['middleware' => 'isLogin'],function()
{

    Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::post('/login-post',[AuthController::class,'signin_post'])->name('login_post');

});

Route::group(['middleware' => 'notLogin'],function()
{

    Route::get('/index',[DashboardController::class,'index'])->name('index');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/profil-update',[AuthController ::class,'profil_update'])->name('profil_update');
    Route::post('/profil-update',[AuthController ::class,'profilupdate_post'])->name('profilupdate_post');

    //**** Setting ****/
    Route::get('/setting-index', [SettingController::class,'index'])->name('setting.index');
    Route::post('/setting-update/{id}', [SettingController::class,'update'])->name('setting.update');
    Route::post('/settingt/aktiv', [SettingController::class,'aktiv'])->name('setting_aktiv');


    //**** SLIDER ****/
    Route::resource('/slider', SliderController::class);
    Route::get('/slider/delete/{id}',[SliderController::class,'delete'])->name('slider.delete');

    //**** GALERY ****/
    Route::resource('/galery', GaleryController::class);
    Route::get('/galery/delete/{id}', [GaleryController::class,'delete'])->name('galery.delete');

    //**** ALUMNI ****/
    Route::resource('/alumni', AlumniController::class);
    Route::get('/alumni/delete/{id}', [AlumniController::class,'delete'])->name('alumni.delete');

    //**** TEACHER ****/
    Route::resource('/teacher', TeacherController::class);
    Route::get('/teacher/delete/{id}', [TeacherController::class,'delete'])->name('teacher.delete');

    //**** NEWS & EVENT ****/
    Route::resource('/news-event', NewsEventController::class);
    Route::get('/news-event/delete/{id}',[NewsEventController::class,'delete'])->name('news-event.delete');

    //**** COURSE ****/
    Route::resource('/course', CourseController::class);
    Route::get('/course/delete/{id}',[CourseController::class,'delete'])->name('course.delete');

    //****TEACHER COURSE ****/
    Route::resource('/teacher-course', TeacherCourse::class);
    Route::get('/teacher-course/delete/{id}',[TeacherCourse::class,'delete'])->name('teacher-course.delete');

    //****SEO ****/
    Route::resource('/seo', SeoController::class);
    Route::get('/seo/delete/{id}',[SeoController::class,'delete'])->name('seo.delete');

    //****Who is this course for? ****/
    Route::resource('/course-for', WhoCourseController::class);
    Route::get('/course-for/delete/{id}',[WhoCourseController::class,'delete'])->name('course-for.delete');

    //**** SILLABUS ****/
    Route::resource('/sillabus', SillabusController::class);
    Route::get('/sillabus/delete/{id}',[SillabusController::class,'delete'])->name('sillabus.delete');

    //**** DISCOUNT ****/
    Route::resource('/discount', DiscountController::class);
    Route::get('/discount/delete/{id}',[DiscountController::class,'delete'])->name('discount.delete');
    
    //**** DISCOUNT ****/
    Route::resource('/vacancy', VacancyController::class);
    Route::get('/vacancy/delete/{id}',[VacancyController::class,'delete'])->name('vacancy.delete');

    //**** Salary ****/
    Route::resource('/salary', SalaryController::class);
    Route::get('/salary/delete/{id}',[SalaryController::class,'delete'])->name('salary.delete');

    //Messages
    Route::get('/messages',[ContactMessagesController::class,'index'])->name('message.index');
    Route::get('/message-destroy/{id}',[ContactMessagesController ::class,'delete'])->name('message.delete');
    Route::get('message-edit/{id}',[ContactMessagesController::class,'edit'])->name('message.edit');

    Route::get('/consultation',[ConsultatingController::class,'index'])->name('consultation.index');
    Route::get('/consultation-destroy/{id}',[ConsultatingController ::class,'delete'])->name('consultation.delete');
    Route::get('consultation-edit/{id}',[ConsultatingController::class,'edit'])->name('consultation.edit');

    //Register Messager
    Route::get('/register-messages',[RegisterController::class,'index'])->name('register_message.index');
    Route::get('/register-message-destroy/{id}',[RegisterController ::class,'delete'])->name('register_message.delete');
    Route::get('register-message-edit/{id}',[RegisterController::class,'edit'])->name('register_message.edit');

    //SubScripe
    Route::get('/subscripe',[SubscripeController::class,'index'])->name('subscripe.index');
    Route::get('/subscripe/delete/{id}',[SubscripeController ::class,'delete'])->name('subscripe.delete');
    Route::get('/subscripe-email',[SubscripeController::class,'export_emails'])->name('export_emails');



    Route::resource('/certificate', CertifcatController::class);
    Route::get('/certificate/delete/{id}',[CertifcatController::class,'delete'])->name('certificate.delete');


    Route::resource('/question', QuestionController::class);
    Route::get('/question/delete/{id}',[QuestionController::class,'delete'])->name('question.delete');

    Route::get('/support/delete/{id}',[SupportController::class,'delete'])->name('support.delete');
    Route::resource('/support', SupportController::class);
    

});



});

Route::get('/',[FrontController::class,'index'])->name('index.az');
Route::get('/en',[FrontController::class,'index'])->name('index.en');
Route::get('/ru',[FrontController::class,'index'])->name('index.ru');    

Route::get('/elaqe',[ContactController::class,'index'])->name('contact.az');
Route::get('/en/contact',[ContactController::class,'index'])->name('contact.en');
Route::get('/ru/contacti',[ContactController::class,'index'])->name('contact.ru');
Route::post('/contact',[ContactController::class,'contact_post'])->name('contact_post'); 

Route::post('/konsultasiya-post',[KonsultasiyaController::class,'kon_post'])->name('kon_post');  


Route::get('/muellimler',[TeachersController::class,'index'])->name('teacher.az');
Route::get('/en/teachers',[TeachersController::class,'index'])->name('teacher.en');
Route::get('/ru/ucitelya',[TeachersController::class,'index'])->name('teacher.ru');

Route::get('/muellim/{slug}',[TeachersController::class,'single'])->name('teacher_single.az');
Route::get('/en/teacher/{slug}',[TeachersController::class,'single'])->name('teacher_single.en');
Route::get('/ru/ucitel/{slug}',[TeachersController::class,'single'])->name('teacher_single.ru');

Route::get('/endirimler',[DiscountsController::class,'index'])->name('discount.az');
Route::get('/en/discounts',[DiscountsController::class,'index'])->name('discount.en');
Route::get('/ru/skidki',[DiscountsController::class,'index'])->name('discount.ru');

Route::get('/endirim/{slug}',[DiscountsController::class,'single'])->name('discount_single.az');
Route::get('/en/discount/{slug}',[DiscountsController::class,'single'])->name('discount_single.en');
Route::get('/ru/skidka/{slug}',[DiscountsController::class,'single'])->name('discount_single.ru');

Route::get('/vakansiyalar',[VacanciController::class,'index'])->name('vacancy.az');
Route::get('/en/vacancies',[VacanciController::class,'index'])->name('vacancy.en');
Route::get('/ru/vakansiyi',[VacanciController::class,'index'])->name('vacancy.ru');

Route::get('/vakansiya/{slug}',[VacanciController::class,'single'])->name('vacancy_single.az');
Route::get('/en/vacancy/{slug}',[VacanciController::class,'single'])->name('vacancy_single.en');
Route::get('/ru/vakansi/{slug}',[VacanciController::class,'single'])->name('vacancy_single.ru');

Route::get('/bloq-media',[NewsController::class,'index'])->name('blog.az');
Route::get('/en/blog-media',[NewsController::class,'index'])->name('blog.en');
Route::get('/ru/blog-media',[NewsController::class,'index'])->name('blog.ru');

Route::get('/mezunlar',[GraduatesController::class,'index'])->name('graduates.az');
Route::get('/en/graduates',[GraduatesController::class,'index'])->name('graduates.en');
Route::get('/ru/vipyckniki',[GraduatesController::class,'index'])->name('graduates.ru');

Route::get('/bloq-media/{slug}',[NewsController::class,'single'])->name('blog_single.az');
Route::get('/en/blog-media/{slug}',[NewsController::class,'single'])->name('blog_single.en');
Route::get('/ru/blog-media/{slug}',[NewsController::class,'single'])->name('blog_single.ru');

Route::get('/haqqimizda',[AboutController::class,'index'])->name('about.az');
Route::get('/en/about',[AboutController::class,'index'])->name('about.en');
Route::get('/ru/o-nas',[AboutController::class,'index'])->name('about.ru');

Route::get('/tedris-saheleri',[CoursesController::class,'index'])->name('course.az');
Route::get('/en/courses',[CoursesController::class,'index'])->name('course.en');
Route::get('/ru/kursi',[CoursesController::class,'index'])->name('course.ru');

Route::get('/tedris-sahesi/{slug}',[CoursesController::class,'single'])->name('course_single.az');
Route::get('/en/course',[CoursesController::class,'single'])->name('course_single.en');
Route::get('/ru/kurs/{slug}',[CoursesController::class,'single'])->name('course_single.ru');

Route::get('/qeydiyyatdan-kecin',[RegisterMessageController::class,'index'])->name('register.az');
Route::get('/en/register',[RegisterMessageController::class,'index'])->name('register.en');
Route::get('/ru/reqistr',[RegisterMessageController::class,'index'])->name('register.ru');

Route::get('/qeydiyyatdan-kecin/{id}',[RegisterMessageController::class,'index_id'])->name('register_id.az');
Route::get('/en/register/{id}',[RegisterMessageController::class,'index_id'])->name('register_id.en');
Route::get('/ru/reqistr/{id}',[RegisterMessageController::class,'index_id'])->name('register_id.ru');

Route::post('/register-post',[RegisterMessageController::class,'register_post'])->name('register_post');  

Route::get('/sertifikat',[SertifkatController::class,'index'])->name('sertifikat.az');
Route::get('/en/certifikat',[SertifkatController::class,'index'])->name('sertifikat.en');
Route::get('/ru/sertifikat',[SertifkatController::class,'index'])->name('sertifikat.ru');

Route::get('/sertifikat/search',[SertifkatController::class,'search'])->name('search');

Route::post('/subscripe',[SubscripeMessageController::class,'subscripe_post'])->name('subscripe_post');  
