<?php


class ExampleTest extends FeatureTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(\App\User::class)->create([
            'name'  => 'Yhensel benitez',
            'email' => 'yhensel@gmail.com',
        ]);

        $this->actingAs($user, 'api');

        $this->visit('api/user')
             ->visit('api/user')
             ->see('Yhensel benitez')
             ->see('yhensel@gmail.com');
    }
}
