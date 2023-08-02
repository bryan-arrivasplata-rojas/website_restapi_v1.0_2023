<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Helpers

> Si no tiene la carpeta vendor realizar lo siguiente: composer install
>
> Reconocer que para poder crear un api en Laravel primer paso es saber que en routes debemos usar api.php , esto  mismo permitira que en la url para llamar una api sea host/api/data_buscar.

-- Es necesario tener el archivo .env , puedes usar de ejemplo.env.example copy paste y dejar con nombre .env: Modificar los valores segun corresponda a su Base de Datos.

-- Puede ejecutar de manera local con el comando: php artisan serve

Desarollaremos los siguiente pasos de acuerdo corresponda:

1. php artisan make:model Api/Profile
2. php artisan make:controller Api/ProfileController --api
3. (Solo si este modelo que usaras realizara consultas en el controlador de Store and Update)

   * php artisan make:request Profile/AddProfileRequest
   * php artisan make:request Profile/UpdateProfileRequest
4. En api.php incorporar lo siguiente segun corresponda.

   * use App\Http\Controllers\Api\ProfileController;
   * Route::name('api.')->group(function(){Route::resource('profiles',ProfileController::class);});

### Modelo File creado con anterioridad

* **Tabla de DB:** protected $table ='profile';
* **Si la tabla de la DB no contiene created_at and updated_at:** public $timestamps =false;
* **Si el primary key no es id en la Tabla:** protected $primaryKey = 'idPRofile';
* Lo siguiente permira saber que valores se consideran (el identificador no es necesario incluir)

  * protected$fillable = [

    'description',

    'number',

    'birthday',

    'id',

    'name'

    ];
* Requiero que se relacione con una segunda tabla User que ya existe y me combine sus valores para ello usare lo siguiente:

  * publicfunctionusers(){

    return$this->hasOne(User::class,'id','id');

    }

### Request Add and Update de File

#### AddProfileRequest:

* In autorizhe Cambiar False por True
* In rules incluir lo siguiente:
  * return [

    "description"=>"required",

    "number"=>"required",

    "birthday"=>"required",

    "id"=>"required|unique:profile,id", //Permitira que sea requerido y unico en la tabla

    ];

#### UpdateProfileRequest

* Agregar lo siguiente: use Illuminate\Validation\Rule;
* In autorizhe Cambiar False por True
* In rules incluir lo siguiente:
  * return [

    "description"=>"required",

    "number"=>"required",

    "birthday"=>"required",

    "id"=>[

    "required",

    Rule::unique('profile')->ignore($this->profile->idProfile,'idProfile')

    ] //Permitira que no cuente este valor cuando verifique si es unico en la tabla

    ];

### Controller ProfileController

Agregar segun corresponda lo siguiente:

* use App\Http\Requests\Profile\AddProfileRequest;
* use App\Http\Requests\Profile\UpdateProfileRequest;
* use App\Models\Api\Profile;

Esta dividido por 5 importantes caracteristicas:

1. index: El uso correcto es una llamada global de la data
2. store: Su uso es para insertar datos en la tabla
3. show: Su uso es para mostrar datos con un primary key especifico
4. update: Actualizar datos con respecto su primary key
5. destroy: Eliminar registro con respecto su primary key

#### Index

Recuperar todos su valores pero incluya los de una tabla relacionada users: returnProfile::with('users')->get();

#### Store

Modificar parametros de entrada por: AddProfileRequest $request

Lo siguiente permitira agregar valores:

    Profile::create($request->all());

    return response()->json([

    'res'=>true,

    'msg'=>'Profile created success'

    ],200);

#### Show

Modificar parametros de entrada por: Profile $profile

Lo siguiente permitira mostrar valores respecto un primary key:

    return response()->json([

    'res'=>true,

    'profile'=>$profile

    ],200);

#### Update

Modificar parametros de entrada por: UpdateProfileRequest $request, Profile $profile

Lo siguiente permitira actualizar valores respecto un primary key:

    $profile->update($request->all());

    returnresponse()->json([

    'res'=>true,

    'msg'=>'Profile updated success'

    ],200);

#### Destroy

Modificar parametros de entrada por: Profile $profile

Lo siguiente permitira eliminar valores respecto un primary key:

    $profile->delete();

    returnresponse()->json([

    'res'=>true,

    'msg'=>'Profile deleted success'

    ],200);

### Control de Errores

Dirigirse a la ubicacion app/Exceptions/Handler.php.

Agrega lo siguiente en la parte final:

protectedfunctioninvalidJson($request,ValidationException$exception){

    returnresponse()->json([

    'res'=>__('Los datos proporcionados no son válidos.'),

    'errors'=> $exception -> errors(),

    ],$exception->status);

}

publicfunctionrender($request, Throwable$exception){

    if($exception instanceof ModelNotFoundException){

    returnresponse()->json([

    "res"=>false,

    "error"=>"Error modelo no encontrado"

    ],400);

    }elseif($exception instanceof PDOException){

    returnresponse()->json([

    "res"=>false,

    "error"=>$exception->getMessage(),

    ],400);

    }

    returnparent::render($request,$exception);

    }
