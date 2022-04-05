<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Generate Unique type_id key
    Controller definition : FunctionsController.php 
    #FunctionsController.php
    <code>
        public static function generateID($id){
                $rule = 'string|unique:'.str_replace ('_id', '', $id);

                $value = Str::random(15);

                do{
                    $value = Str::random(15);

                    $validator = Validator::make(
                        [$id=>$value],
                        [$id=>$rule]
                    );

                }while($validator->fails());

                return $value;
            }
        }
    </code>
    <code>
        $id = 'promotion_id';
        $request->request->set($id, FunctionsController::generateID($id));
        // this will create $request->promotion_id;
    </code>

