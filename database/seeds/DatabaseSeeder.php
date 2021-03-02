<?php

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
        Storage:: deleteDirectory(directory:'cursos');
        Storage:: deleteDirectory(directory:'users');

        Storage::makeDirectory(path: 'cursos');
        Storage::makeDirectory(path: 'users');

        factory(\App\Role::class,1)->create(['name'=>'admin']);
        factory(\App\Role::class,1)->create(['name'=>'teacher']);
        factory(\App\Role::class,1)->create(['name'=>'student']);

        factory(\App\User::class,1)->create([
        'name'=>'admin',
        'email'=>'admin@mail.com',
        'password'=>bcrypt(value:'secret'),
        'role_id'=>\App\Role::ADMIN

        ])
        ->each(function(\App\User $u){
            factory(App\Student::class,1)->create(['user_id' => $u->id]);
    
    });

    factory(\App\User::class, 50)->create()
    ->each(function(\App\User $u) {
        factory(\App\Student::class, 1)->create(['user_id'=> $u->id]);
    });

    factory(\App\User::class, 10)->create()
    ->each(function(\App\User $u) {
        factory(App\Student::class,1)->create(['user_id' => $u->id]);
        factory(\App\Teacher::class, 1)->create(['user_id'=> $u->id]);
    });
        factory(\App\Level::class, 1)->create(['name' =>'Basicos']);
        factory(\App\Level::class, 1)->create(['name' =>'Intermedio']);
        factory(\App\Level::class, 1)->create(['name' =>'Avanzado']);
        factory(\App\Category::class, 3)->create();

        factory(\App\Curso::class, 50)
		    ->create()
		    ->each(function (\App\Curso $c) {
		    	$c->goals()->saveMany(factory(\App\Goal::class, 2)->create());
		    	$c->requirements()->saveMany(factory(\App\Requirement::class, 4)->create());
		    });
    }
}

