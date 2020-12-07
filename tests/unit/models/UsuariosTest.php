<?php

namespace tests\unit\models;

use app\models\Usuarios;

class UsuariosTest extends \Codeception\Test\Unit
{
    public function testFindUsuarioPorId()
    {
        expect_that($usuarios = Usuarios::findIdentity(52));
    }

    // public function testFindUserByAccessToken()
    // {
    //     expect_that($usuarios = Usuarios::findIdentityByAccessToken('null'));
    //     expect($user->username)->equals('admin');

    //     expect_not(User::findIdentityByAccessToken('non-existing'));        
    // }

    // public function testFindUsuarioPorNombre()
    // {
    //     expect_that($usuarios = Usuarios::getMunicipio('Apozol'));
    //     expect_that($usuarios = Usuarios::findByUsername('jose'));
    //     expect_not(User::findByUsername('not-admin'));
    // }

    // /**
    //  * @depends testFindUserByUsername
    //  */
    // public function testValidateUser($usuarios)
    // {
    //     $usuarios = Usuarios::findByUsername('jose');
    //     expect_that($user->validateAuthKey('test100key'));
    //     expect_not($user->validateAuthKey('test102key'));

    //     expect_that($user->validatePassword('admin'));
    //     expect_not($user->validatePassword('123456'));
    // }

}
