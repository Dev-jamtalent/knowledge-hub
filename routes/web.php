<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\TemplateController;
use App\Http\Controllers\Backend\TagComtroller;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\SessionController;
use App\Http\Controllers\Backend\ChannelContrller;
use App\Http\Controllers\Backend\DigitalStoreController;
use App\Http\Controllers\Backend\LibraryController;
use App\Http\Controllers\Backend\PodcastController;
use App\Http\Controllers\Fontend\PagesController;
use App\Http\Controllers\Instructor\InstructorContrller;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\AudioController;
use App\Http\Controllers\User\UserContrller;
//convert jamflix
Route::get('/jam-flix',[SessionController::class, 'jamFlix'])->name('jam.flix');
Route::get('/knowledge-hub',[SessionController::class, 'knowledgeHub'])->name('jam.knowledgeHub');
// fontend routes
Route::get('/',[PagesController::class, 'index'])->name('home');
Route::get('user/login',[PagesController::class, 'login'])->name('user.login');
Route::get('user/register',[PagesController::class, 'register'])->name('user.register');
Route::get('book/{slug}',[PagesController::class,'bookDetails'])->name('home.book.details');
//channel 
Route::get('channel/{id}/{slug}',[PagesController::class,'channel'])->name('home.channel.details');
Route::get('download/{slug}',[BookController::class,'bookDownload'])->name('book.download');
Route::get('video/download/{slug}',[VideoController::class,'vidoeDownload'])->name('video.download');
Route::post('store',[CategoryController::class,'store']);
// video route
Route::get('video/{slug}',[PagesController::class,'videoDetails'])->name('home.video.details');

//instructor profile
Route::get('admin-profile/{id}',[InstructorContrller::class,'show'])->name('instructor.show');
// ====================================== Intructor Routes =====================================
Route::group(['prefix'=>'admin','middleware' =>['instructor','auth']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    /** profile **/
    Route::group(['prefix'=>'profile'],function(){
        Route::get('edit',[InstructorContrller::class,'edit'])->name('admin.profile.edit');
        Route::post('update',[InstructorContrller::class,'update'])->name('admin.profile.update');
        Route::get('move',[UserContrller::class,'modeUser'])->name('admin.move.user');
    });
    

    /** Video Routes **/
    Route::group(['prefix'=>'video'],function(){
        Route::get('add',[VideoController::class,'create'])->name('book.create');
        Route::post('store',[VideoController::class,'store'])->name(' .store');
        Route::get('manage',[VideoController::class,'manage'])->name('book.manage');
        Route::get('details/{id}',[VideoController::class,'bookDetails'])->name('book.details');
        
    });
    /** templete Routes **/
    Route::group(['prefix'=>'template'],function(){
        Route::get('add',[TemplateController::class,'create'])->name('templete.create');
        Route::post('store',[TemplateController::class,'store'])->name('templete.store');

        Route::get('manage',[TemplateController::class,'manage'])->name('templete.manage');
        Route::get('details/{id}',[TemplateController::class,'templeteDetails'])->name('templete.details');

        /** templete Category **/
        Route::group(['prefix'=>'course'],function(){
            
            Route::get('manage',[TemplateController::class,'manage'])->name('course.manage');
            Route::get('details/{id}',[TemplateController::class,'templeteDetails'])->name('course.details');
        
         });
        
    });
    
});


// ====================================== User Routes =====================================
Route::group(['prefix'=>'user','middleware' =>['user','auth']], function(){
    Route::get('dashboard',[UserContrller::class,'index'])->name('user.dashboard');
    Route::get('details',[UserContrller::class,'userDetails'])->name('user.details');

    Route::get('/now-how',[UserContrller::class, 'nowhow'])->name('now.how');
    Route::get('account/setting',[UserContrller::class,'accountSetting'])->name('user.setting');
    Route::get('change-password',[UserContrller::class,'changePassword'])->name('user.change.password');
    Route::post('update-password',[UserContrller::class,'updatePassword'])->name('user.update.password');
    Route::post('update-accout-detail-ajax',[UserContrller::class,'updateAccDetailAjax'])->name('user.update.details');
    Route::group(['prefix'=>'category'],function(){
            Route::get('add',[CategoryController::class,'create'])->name('category.manage');
            Route::post('store',[CategoryController::class,'store']);
            Route::get('manage',[CategoryController::class,'index']);
            
        });
    /** templete Routes **/
    Route::group(['prefix'=>'template'],function(){
        Route::get('add',[TemplateController::class,'create'])->name('template.create');
        Route::get('category/ajax/{id}',[CategoryController::class,'templeteCategoryAjax']);
        Route::post('store',[TemplateController::class,'store'])->name('templete.store');
        Route::get('manage',[TemplateController::class,'manage'])->name('template.manage');
        Route::post('delete/{id}',[TemplateController::class,'delete'])->name('template.delete');
        Route::get('details/{id}',[TemplateController::class,'templeteDetails'])->name('templete.details');  
        /*** categories **/
         Route::group(['prefix'=>'category'],function(){
            Route::get('manage',[CategoryController::class,'category'])->name('category.manage');
            Route::post('store',[CategoryController::class,'store']);
            Route::get('all',[CategoryController::class,'index']);
            
        });

         /***sub categories **/
         Route::group(['prefix'=>'sub-category'],function(){
            Route::get('manage',[CategoryController::class,'subCategory'])->name('user.sub.category.manage');
            Route::post('store',[CategoryController::class,'subCategoryStore']);
            Route::get('all',[CategoryController::class,'allSubCat']);
            
        });
         /*** tags **/
         Route::group(['prefix'=>'tag'],function(){
            Route::get('manage',[App\Http\Controllers\Backend\TemplateController::class,'manage'])->name('user.tag.manage');
            Route::post('store',[App\Http\Controllers\Backend\TemplateController::class,'tagStore']);
            Route::get('all',[App\Http\Controllers\Backend\TemplateController::class,'allTags']);
            
        });
        
    });
    /** Video Routes **/
    Route::group(['prefix'=>'video'],function(){
        Route::get('add',[VideoController::class,'create'])->name('video.create');
        Route::post('store',[VideoController::class,'store'])->name('video.store');
        Route::post('delete/{id}',[VideoController::class,'delete'])->name('video.delete');
        Route::get('manage',[VideoController::class,'manage'])->name('video.manage');
        Route::get('details/{id}',[VideoController::class,'bookDetails'])->name('book.details');

        /*** categories **/
         Route::group(['prefix'=>'category'],function(){
            Route::get('ajax/{id}',[CategoryController::class,'vidoeCategoryAjax']);
            Route::get('manage',[CategoryController::class,'userVideoCatManage'])->name('user.video.category.manage');
            Route::post('store',[CategoryController::class,'userVideoCategoryStore']);
            Route::get('all',[CategoryController::class,'userVideoCatAll']);
            
        });
        /***sub categories **/
         Route::group(['prefix'=>'sub-category'],function(){
            Route::get('manage',[CategoryController::class,'userVideoSubCategory'])->name('user.video.sub.category.manage');
            Route::post('store',[CategoryController::class,'userVideoSubCategoryStore']);
            Route::get('all',[CategoryController::class,'userVideoAllSubCat'])->name('monim');
            
        });

        /*** tags **/
         Route::group(['prefix'=>'tag'],function(){
            Route::get('manage',[TagComtroller::class,'userVidoeTagManage'])->name('user.video.tag.manage');
            Route::post('store',[TagComtroller::class,'userVidoeTagStore']);
            Route::get('all',[TagComtroller::class,'userVidoeAllTags']);
            
        }); 
       
    });
    /** AUDIO Routes **/
    Route::group(['prefix'=>'audio'],function(){
        Route::get('add',[AudioController::class,'create'])->name('audio.create');
        Route::post('store',[AudioController::class,'store'])->name('audio.store');
        Route::get('manage',[AudioController::class,'manage'])->name('audio.manage');
        Route::post('delete/{id}',[AudioController::class,'delete'])->name('audio.delete');
        Route::get('details/{id}',[AudioController::class,'bookDetails'])->name('audio.details');

        /*** categories **/
         Route::group(['prefix'=>'category'],function(){
            Route::get('ajax/{id}',[CategoryController::class,'audioCategoryAjax']);
            Route::get('manage',[CategoryController::class,'userAudioCatManage'])->name('user.audio.category.manage');
            Route::post('store',[CategoryController::class,'userAudioCategoryStore']);
            Route::get('all',[CategoryController::class,'userAudioCatAll']);
            
        });
        /***sub categories **/
         Route::group(['prefix'=>'sub-category'],function(){
            Route::get('manage',[CategoryController::class,'userAudioSubCategory'])->name('user.audio.sub.category.manage');
            Route::post('store',[CategoryController::class,'userAudioSubCategoryStore']);
            Route::get('all',[CategoryController::class,'userAudioAllSubCat']);
            
        });

        /*** tags **/
         Route::group(['prefix'=>'tag'],function(){
            Route::get('manage',[TagComtroller::class,'userAudioTagManage'])->name('user.audio.tag.manage');
            Route::post('store',[TagComtroller::class,'userAudioTagStore']);
            Route::get('all',[TagComtroller::class,'userAudioAllTags']);
            
        }); 
       
    });
    /** book Routes **/
    Route::group(['prefix'=>'book'],function(){
        Route::get('add',[BookController::class,'create'])->name('book.upload');
        Route::post('store',[BookController::class,'store'])->name('book.store');
        Route::get('manage',[BookController::class,'manage'])->name('book.manage');
        Route::post('delete/{id}',[BookController::class,'delete'])->name('book.delete');
        Route::get('details/{id}',[BookController::class,'bookDetails'])->name('book.details');

        /*** categories **/
         Route::group(['prefix'=>'category'],function(){
            Route::get('manage',[CategoryController::class,'BookCategory'])->name('book.category.manage');
            Route::get('ajax/{id}',[CategoryController::class,'bookCategoryAjax']);
            Route::post('store',[CategoryController::class,'bookStore']);
            Route::get('all',[CategoryController::class,'UserAllBook']);
            
        });

         /***sub categories **/
         Route::group(['prefix'=>'sub-category'],function(){
            Route::get('manage',[CategoryController::class,'userBookSubCategory'])->name('user.book.sub.category.manage');
            Route::post('store',[CategoryController::class,'userBookSubCategoryStore']);
            Route::get('all',[CategoryController::class,'userBookAllSubCat']);
        });
         /*** tags **/
         Route::group(['prefix'=>'tag'],function(){
            Route::get('manage',[TagComtroller::class,'userBookTagManage'])->name('user.book.tag.manage');
            Route::post('store',[TagComtroller::class,'userBookTagStore']);
            Route::get('all',[TagComtroller::class,'userBookAllTags']);
        });
    });
    /** Post Routes **/
    Route::group(['prefix'=>'post'],function(){
        Route::get('add',[PostController::class,'create'])->name('post.create');
        Route::post('store',[PostController::class,'store'])->name('post.store');
        Route::get('manage',[PostController::class,'manage'])->name('post.manage');
        Route::post('delete/{id}',[PostController::class,'delete'])->name('post.delete');
        Route::get('details/{id}',[PostController::class,'postDetails'])->name('post.details');

        /*** categories **/
         Route::group(['prefix'=>'category'],function(){
            Route::get('ajax/{id}',[CategoryController::class,'postCategoryAjax']);
            Route::get('manage',[CategoryController::class,'userPostCatManage'])->name('user.post.category.manage');
            Route::post('store',[CategoryController::class,'userPostCategoryStore']);
            Route::get('all',[CategoryController::class,'userPostCatAll']);
            
        });
        /***sub categories **/
         Route::group(['prefix'=>'sub-category'],function(){
            Route::get('manage',[CategoryController::class,'userPostSubCategory'])->name('user.post.sub.category.manage');
            Route::post('store',[CategoryController::class,'userPostSubCategoryStore']);
            Route::get('all',[CategoryController::class,'userPostAllSubCat']);
        });
        /*** tags **/
         Route::group(['prefix'=>'tag'],function(){
            Route::get('manage',[TagComtroller::class,'userPostTagManage'])->name('user.post.tag.manage');
            Route::post('store',[TagComtroller::class,'userPostTagStore']);
            Route::get('all',[TagComtroller::class,'userPostAllTags']);  
        }); 
    }); 

    Route::group(['prefix'=>'flax-flix'],function(){
        Route::group(['prefix'=>'channel'],function(){
            Route::get('manage',[ChannelContrller::class,'channelManage'])->name('channel.manage');
            Route::post('store',[ChannelContrller::class,'userChannelStore']);
            Route::get('all',[ChannelContrller::class,'userChannelAll']);
            Route::get('add-video/{id}',[ChannelContrller::class,'addVideoChannel'])->name('channel.add.video');
            Route::get('all-video/{id}',[ChannelContrller::class,'allVideoChannel'])->name('channel.all.video');
            Route::get('all-video-show/{id}',[ChannelContrller::class,'allVideoChannelShow']);
            Route::post('video-store',[ChannelContrller::class,'userChannelVideoStore']);
        });

        Route::group(['prefix'=>'digital-store'],function(){
            Route::get('manage',[DigitalStoreController::class,'digitalStoreManage'])->name('digital.store.manage');
            Route::post('store',[DigitalStoreController::class,'userDigitalStore']);
            Route::get('all',[DigitalStoreController::class,'userDigitalStoreAll']);
            Route::get('all-template/{id}',[DigitalStoreController::class,'alltemplateDigital'])->name('digital.store.all.template');
            Route::get('all-teplate-show/{id}',[DigitalStoreController::class,'alltemplateDigitalShow']);
            Route::post('template-store',[DigitalStoreController::class,'userDigitalStoreTemplateStore']);
        });
        Route::group(['prefix'=>'library'],function(){
            Route::get('manage',[LibraryController::class,'libraryManage'])->name('library.manage');
            Route::post('store',[LibraryController::class,'userLibraryStore']);
            Route::get('all',[LibraryController::class,'userLibraryAll']);
            Route::get('all-book/{id}',[LibraryController::class,'allBookLibrary'])->name('library.all.book');
            Route::get('all-book-show/{id}',[LibraryController::class,'allLibraryBookShow']);
            Route::post('book-store',[LibraryController::class,'userLibraryBookStore']);
        });
        Route::group(['prefix'=>'podcast'],function(){
            Route::get('manage',[PodcastController::class,'podcastManage'])->name('library.manage');
            Route::post('store',[PodcastController::class,'podcastStore']);
            Route::get('all',[PodcastController::class,'userPodcastAll']);
            Route::get('all-audio/{id}',[PodcastController::class,'allPodcastAudio'])->name('podcast.all.audio');
            Route::get('all-audio-show/{id}',[PodcastController::class,'allPodcastAudioShow']);
            Route::post('audio-store',[PodcastController::class,'userPodcastAudioStore']);
        });
    });
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('page',[AdminController::class, 'index']);
require __DIR__.'/auth.php';
