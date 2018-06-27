
<?php


class CreatePostsTest extends FeatureTestCase
{
    public function test_user_create_post()
    {
        //Having
        $user = $this->defaultUser();
        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';

        $this->actingAs($user);

        //When
        $this->visit(route('posts.create'))
        ->type($title, 'title')
        ->type($content, 'content')
        ->press('Publicar');

        //Then
        $this->seeInDatabase('posts', [
            'title'    => $title,
            'content'  => 'Este es el contenido',
            'status'   => true,
            'user_id'  => $user->id,
        ]);

        //User is redirected to the posts details
        //$this->seeInElement('h1', $title);

        $this->see($title);
    }

    public function test_creation_a_post_requires_authentication()
    {
        $this->visit(route('posts.create'))
        ->seePageIs(route('login'));
    }

    public function test_create_post_form_validation()
    {
        $this->actingAs($this->defaultUser())
        ->visit(route('posts.create'))
        ->press('Publicar')
        ->seePageIs(route('posts.create'))
            ->seeErrors([
                'title' => 'El campo título es obligatorio',
                'content' => 'El campo contenido es obligatorio'
            ]);
    }
}
