<?php

use App\Student;
use App\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeacherTableSeeder::class);
        $this->call(StudentTableSeeder::class);
    }
}

class TeacherTableSeeder extends Seeder {

    public function run()
    {
        DB::table('teachers')->delete();

        Teacher::create(array(
            'name'              => 'Iftekhar Mahmud Towhid',
            'designation'       => 'Assistant Professor',
            'email'             => 'tlabs.im@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10)
        ));
    }
}

class StudentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('students')->delete();
        
        Student::create(array(
            'name'              => 'pijush karmakar',
            'student_id'        => 'ASH1501030M',
            'batch_id'         => '1',
            'degree_id'        => '1',
            'roll'             => '30',
            'is_registered'     => true,
            'is_active'        => true,
            'email'             => 'pijush@gmail.com',
            'reg_code'        => 'ASH1501030Mh',
            'email_verified_at' => now(),
            'password'          => bcrypt('pijush123'),
            'remember_token'    => Str::random(10)
        ));
        
    }


}

