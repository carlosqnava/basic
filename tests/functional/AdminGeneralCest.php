<?php

class AdminGeneralCest
{
    public function nombreVacio(\FunctionalTester $I)
    {
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        //$I->fillField('Usuarios[nombre]','aa');
        $I->click('Guardar');
        //$I->see('Mínimo 3 y máximo 50 caracteres');
        $I->see('Nombre requerido');
    }

    public function nombreInvalido(\FunctionalTester $I)
    {
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        $I->fillField('Usuarios[nombre]', '****');
        $I->click('Guardar');
        //$I->see('Mínimo 3 y máximo 50 caracteres');
        $I->see('Solo se aceptan letras');
    }

    public function apellidoVacio(\FunctionalTester $I)
    {
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        //$I->fillField('Usuarios[nombre]','aa');
        $I->click('Guardar');
        //$I->see('Mínimo 3 y máximo 50 caracteres');
        $I->see('Apellidos requerido');
    }

    public function apellidoInvalido(\FunctionalTester $I)
    {
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        $I->fillField('Usuarios[apellidos]', '****');
        $I->click('Guardar');
        //$I->see('Mínimo 3 y máximo 50 caracteres');
        $I->see('Solo se aceptan letras');
    }

    public function correoVacio(\FunctionalTester $I)
    {
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        //$I->fillField('Usuarios[nombre]','aa');
        $I->click('Guardar');
        //$I->see('Mínimo 3 y máximo 50 caracteres');
        $I->see('Correo requerido');
    }

    public function correoInvalido(\FunctionalTester $I)
    {
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        $I->fillField('Usuarios[correo]', 'aaaaaaa');
        $I->click('Guardar');
        $I->see('Formato no válido');
    }

    public function verComisarioMunicipal(\FunctionalTester $I)
    {   
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        $I->fillField('Usuarios[correo]', 'aaaaaaa@gmail.com');
        $I->see('Comisario Municipal');
    }

    public function verComisarioADeportista(\FunctionalTester $I)
    {   
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'comisario@gmail.com');
        $I->fillField('#loginform-contraseña', 'comisario');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        $I->fillField('Usuarios[correo]', 'aaaaaaa@gmail.com');
        $I->see('Deportista');
    }

    public function verComisarioAEntrenador(\FunctionalTester $I)
    {   
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'comisario@gmail.com');
        $I->fillField('#loginform-contraseña', 'comisario');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        $I->fillField('Usuarios[correo]', 'aaaaaaa@gmail.com');
        $I->see('Entrenador');
    }

    public function seleccionarComisario(\FunctionalTester $I)
    {   
        $I->amOnPage(['site/login']);
        $I->submitForm('#login-form', []);
        $I->fillField('#loginform-correo', 'aaa@gmail.com');
        $I->fillField('#loginform-contraseña', 'aaa');
        $I->click('login-button');
        $I->amOnPage(['/usuarios/index']);
        $I->expectTo('Ver los errores de validación');
        $I->see('Registro de Usuarios');
        $I->click('Crear Nuevo Usuario');
        $I->see('Comisario Municipal');
    }

}
