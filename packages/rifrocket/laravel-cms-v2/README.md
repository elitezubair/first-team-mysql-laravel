# Laravel Content Management System Version 2


## **INSTALLATION**
Follow the below steps to install this package

## STEP - 1

download zip from repository and place files in following directory manner



## STEP - 2

add flowing package name in composer json require 

```json
    "rifrocket/laravel-cms-v2": "@dev",
    "spatie/laravel-permission": "dev-rifrocket-patch-1"
```

## STEP - 3

add repository in composer json just below require-dev 

```json
    "repositories": [
        {
            "type": "path",
            "url": "packages/laravel-cms",
            "options": {
                "symlink": true
            }
        },
        {
            "type": "vcs",
            "url": "git@github.com:rifrocket/laravel-permission.git"
        }
    ],
```

## STEP - 4
Changes In .env
```env

APP_NAME=your_project_name
APP_ENV=local
APP_KEY=app_key  //Generate Key with: php artisan key:generate
APP_DEBUG=true
APP_URL=your_website_url
APP_DOMAIN=your_domain_name


chnage Queue Driver: 
QUEUE_CONNECTION=database  // Queue Worker is Required

```

## STEP - 5
Migrate Database
```console
php artisan migrate:fresh
```

## STEP - 6
Seed Database
```console
for Windows:
php artisan db:seed --class=rifrocket\LaravelCms\Database\seeders\LbsSeeder

for Linux:
php artisan db:seed --class=rifrocket\\LaravelCms\\Database\\seeders\\LbsSeeder
```

## STEP - 7
Publish File in Public Directory
```console
php artisan vendor:publish --tag=lbs:config --force   #config
php artisan vendor:publish --tag=lbs:assets --force   #assets

if you want ot publish admin layout views
php artisan vendor:publish --tag=lbs:admin_layouts --force   #admin layouts
```


## STEP - 8
In Your RouteServiceProvider add Domain
``` 
*app/Providers/RouteServiceProvider

Route::domain(env('APP_DOMAIN'))->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));
```

## STEP - 9    
In Your Authenticate Middleware
```console
if (! $request->expectsJson()) {
            return route('lbs.auth.admin.login');
        }
```


## STEP - 10
In Your files systems configuration file
```
    'disks' => [
        'storage' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
    ],
```

## STEP - 11
Link Storage file
```console
php artisan storage:link
```

# Utilities

 ## Media Helper 
```
@include('LbsViews::utility.utility-media-uploader',['name'=>'avatar','datatype'=>'image','multiple'=>false, 'preview'=>false, 'old_media'=>$avatar])

- name = name of the imput field ( mendetory )
- datatype = restrict media type : image, pdf, doc, video, music ( optional )
- multiple = single select/multiple select media
- preview = show media preview
```

## Loaders
- ### Default Loader
You can define default loader using ENV or from setting panel, this loader will be available through out the project.
```html
<div class="loading" wire:loading>
    @include('LbsViews::utility.utility-default-loader',[env('APP_LOADER')=>true])
</div>

Available loaders are following:

- loader_multi_spinner
- loader_single_spinner
- loader_flip_square
- mini_loader
- mesh_loader
```

## Pagination 

## Simple Pagination 


## SUPERVISOR SETTING 
create file  laravel-worker.ini in supervisord.d directory <br/>
sudo nano /etc/supervisord.d/laravel-worker.ini
```
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /data/www/YouProjectDirectory/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
numprocs=8
redirect_stderr=true
stdout_logfile=/data/www/YouProjectDirectory/storage/logs/worker.log
```

## AVAILABLE COMMANDS
```code
php artisan Lbs:clear-old-records

```

## AVAILABLE UTILITIES
```html
<-- single line spinner -->
@include('LbsViews::utility.utility-default-loader',['loader_single_spinner'=>true])

<-- multi line spinner -->
@include('LbsViews::utility.utility-default-loader',[env('APP_LOADER')=>true])

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please do not try to contact me.

## Credits

-   [Mohammad Arif](https://github.com/rifrocket)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
