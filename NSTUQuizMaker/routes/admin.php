<?php

    Route::GET('/home', 'AdminController@index')->name('admin.home');
    // Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
    Route::POST('/password/change', 'AdminController@changePassword');

    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');

    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

    Route::fallback(function () {
        return abort(404);
    });



// ----------------- Added custom route (role for Super Admin) ----------------

// for faculty
    Route::get('/faculties',[ 

        'uses' => 'FacultyController@index',
        'as'   => 'faculty.index'
       
    ])->middleware('role:super');

     Route::get('/faculties/create',[ 

        'uses' => 'FacultyController@create',
        'as'   => 'faculty.create'
       
    ])->middleware('role:super');

    Route::post('/faculties/store',[ 

        'uses' => 'FacultyController@store',
        'as'   => 'faculty.store'
       
    ])->middleware('role:super');

    Route::get('/faculties/edit/{id}',[ 

        'uses' => 'FacultyController@edit',
        'as'   => 'faculty.edit'
       
    ])->middleware('role:super');

    Route::patch('/faculties/update/{id}',[ 

        'uses' => 'FacultyController@update',
        'as'   => 'faculty.update'
       
    ])->middleware('role:super');

    Route::delete('/faculties/delete/{id}',[ 

        'uses' => 'FacultyController@destroy',
        'as'   => 'faculty.delete'
       
    ])->middleware('role:super');

// for department
Route::resource('department','DepartmentController')->middleware('role:super');    




// ----------------- (role for dept_admin) ------------------------

// New Routes for students

    Route::get('/students',[ 

        'uses' => 'StudentController@index',
        'as'   => 'student.index'
       
    ])->middleware('role:dept_admin');

    Route::delete('/students/{id}',[ 

        'uses' => 'StudentController@destroy',
        'as'   => 'student.delete'
       
    ])->middleware('role:dept_admin');

// New Routes for Teacher

    Route::get('/teachers',[ 

        'uses' => 'TeacherController@index',
        'as'   => 'teacher.index'
       
    ])->middleware('role:dept_admin');

    Route::delete('/teachers/{id}',[ 

        'uses' => 'TeacherController@destroy',
        'as'   => 'teacher.delete'
       
    ])->middleware('role:dept_admin');



// for degree 
Route::resource('degree','DegreesController')->middleware('role:dept_admin'); 
//for batch    
Route::resource('batch','BatchController')->middleware('role:dept_admin');     
//for course    
Route::resource('course','CourseController')->middleware('role:dept_admin');  
 












// For blade file -----------------------

    Route::get('posts',function(){
       return view('posts');
    });