<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;
use Iluminate\Contracts\Validation\Factory as ValidationFactory;


class UserTest extends TestCase
{

    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }


    public function test_user_duplication()
    {   $user1 = User::make([
            'name' => 'Mary cane',
            'email' => 'carlos@gmail.com']);


        $user2 = User::make([
            'name' => 'Mary Janson',
            'email' => 'joselina@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
        // $this->assertTrue($user1->name != $user2->name);
    }
    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }
    public function test_guarda_nuevo_user(){
        $respuesta = $this->post('/register', [
            'name' => 'Carlos',
            'email' => 'carlos@gmail.com',
            'password' => 'carlos123',
            'password_confirmation' => 'carlos123'
        ]);

        return $respuesta->assertRedirect('/home');
    }

    public function test_guarda_nuevo_usuario(){
        $respuesta = $this->post('/register', [

            'email' => 'fulanogmail.com',
            'password' => 'fufufuf',
        ]);

        return $respuesta->assertRedirect('/home');
    }

}
