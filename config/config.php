<?php

/*
 * You can place your custom package configuration in here.
 */
return [

                 //apply middlewares for the routes
              'middleware' => ['api'],

               //define route prefixes
              'prefix'  => 'api',

          //define your own response transformer class
        'dataTransporter' => \PrageethPeiris\SiteAllocator\Http\Transporter\DefaultTransporter::class,

            //user model you are using
           'user' =>  'App\Models\User',


            //this package uses spatie laravel data package.
          'spatie-laravel-data-configs' => [
              /*
               * The package will use this date format when working with dates through the app
               */
              'date_format' => DATE_ATOM,

              /*
               * Global transformers will take complex types and transform them into simple
               * types.
               */
              'transformers' => [
                  DateTimeInterface::class => \Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer::class,
                  \Illuminate\Contracts\Support\Arrayable::class => \Spatie\LaravelData\Transformers\ArrayableTransformer::class,
                  // BackedEnum::class => Spatie\LaravelData\Transformers\EnumTransformer::class,
              ],

              /*
               * Global casts will cast values into complex types when creating a data
               * object from simple types.
               */
              'casts' => [
                  DateTimeInterface::class => Spatie\LaravelData\Casts\DateTimeInterfaceCast::class,
                  // BackedEnum::class => Spatie\LaravelData\Casts\EnumCast::class,
              ],

              /*
               * Rule inferrers can be configured here. They will automatically add
               * validation rules to properties of a data object based upon
               * the type of the property.
               */
              'rule_inferrers' => [
                  Spatie\LaravelData\RuleInferrers\BuiltInTypesRuleInferrer::class,
                  Spatie\LaravelData\RuleInferrers\AttributesRuleInferrer::class,
                  Spatie\LaravelData\RuleInferrers\NullableRuleInferrer::class,
                  Spatie\LaravelData\RuleInferrers\RequiredRuleInferrer::class,
              ],
          ]


];