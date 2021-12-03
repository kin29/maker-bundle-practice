# 導入方法
`composer require --dev symfony/maker-bundle`

ref: https://symfony.com/doc/current/SymfonyMakerBundle/index.html#sln

# どんなことができる？
`$ bin/console list make`でmakeコマンドのリストを確認できます。

- [make:auth](https://github.com/kin29/maker-bundle-practice#makeauthcreates-a-guard-authenticator-of-different-flavors)
- [make:command](https://github.com/kin29/maker-bundle-practice#makecommand-creates-a-new-console-command-class)
- [make:controller](https://github.com/kin29/maker-bundle-practice#makecontroller--creates-a-new-controller-class)
- [make:crud](https://github.com/kin29/maker-bundle-practice#makecrud-creates-crud-for-doctrine-entity-class)
- [make:docker:database](https://github.com/kin29/maker-bundle-practice#makedockerdatabase-adds-a-database-container-to-your-docker-composeyaml-file)
- [make:entity](https://github.com/kin29/maker-bundle-practice#makeentity-creates-or-updates-a-doctrine-entity-class-and-optionally-an-api-platform-resource)
- [make:fixtures](https://github.com/kin29/maker-bundle-practice#makefixtures-creates-a-new-class-to-load-doctrine-fixtures)
- [make:form](https://github.com/kin29/maker-bundle-practice#makeform-creates-a-new-form-class)
- [make:functional-test(deprecated)](https://github.com/kin29/maker-bundle-practice#makefunctional-test-creates-a-new-test-class)
- [make:message](https://github.com/kin29/maker-bundle-practice#makemessage-creates-a-new-message-and-handler)
- [make:messenger-middleware](https://github.com/kin29/maker-bundle-practice#makemessenger-middleware-creates-a-new-messenger-middleware)
- [make:migration](https://github.com/kin29/maker-bundle-practice#makemigration-creates-a-new-migration-based-on-database-changes)
- [make:registration-form](https://github.com/kin29/maker-bundle-practice#makeregistration-form-creates-a-new-registration-form-system)
- [make:user](https://github.com/kin29/maker-bundle-practice#makeuser-creates-a-new-security-user-class)
- [make:reset-password](https://github.com/kin29/maker-bundle-practice#makereset-password-create-controller-entity-and-repositories-for-use-with-symfonycastsreset-password-bundle)
- [make:serializer:encoder](https://github.com/kin29/maker-bundle-practice#makeserializerencoder-creates-a-new-serializer-encoder-class)
- [make:serializer:normalizer](https://github.com/kin29/maker-bundle-practice#makeserializernormalizer-creates-a-new-serializer-normalizer-class)
- [make:subscriber](https://github.com/kin29/maker-bundle-practice#makesubscribercreates-a-new-event-subscriber-class)
- [make:test](https://github.com/kin29/maker-bundle-practice#maketestmakeunit-testmakefunctional-test-creates-a-new-test-class)
- [make:twig-extension](https://github.com/kin29/maker-bundle-practice#maketwig-extensioncreates-a-new-twig-extension-class)
- [make:unit-test(deprecated)](https://github.com/kin29/maker-bundle-practice#makeunit-testcreates-a-new-test-class)
- [make:validator](https://github.com/kin29/maker-bundle-practice#makevalidatorcreates-a-new-validator-and-constraint-class)
- [make:voter](https://github.com/kin29/maker-bundle-practice#makevotercreates-a-new-security-voter-class)

## `make:auth`:Creates a Guard authenticator of different flavors
[diff](https://github.com/kin29/maker-bundle-practice/commit/7ac4e7a5b34b7c744bff166d826988beb8385573)

[メモ] `security`が必要。
```
$ bin/console make:auth

                                                                                                                        
 [ERROR] Missing package: to use the make:auth command, run:                                                            
                                                                                                                        
         composer require security                                                                                      
                                                                                                                        

$ composer require security
```

```
$ bin/console make:auth

 What style of authentication do you want? [Empty authenticator]:
  [0] Empty authenticator
  [1] Login form authenticator
 > 0

 The class name of the authenticator to create (e.g. AppCustomAuthenticator):
 > AppCustomAuthenticator

 created: src/Security/AppCustomAuthenticator.php
 updated: config/packages/security.yaml

           
  Success! 
           

 Next:
 - Customize your new authenticator.
 
```

##  `make:command`: Creates a new console command class
[diff](https://github.com/kin29/maker-bundle-practice/commit/43eedbede1b345ab17634458bf9393b78dc4b3c2)


src/Command/DeliciousPizzaCommandが作成される。
```
$ bin/console make:command

 Choose a command name (e.g. app:delicious-pizza):
 > app:delicious-pizza

 created: src/Command/DeliciousPizzaCommand.php

           
  Success! 
           

 Next: open your new command class and customize it!
 Find the documentation at https://symfony.com/doc/current/console.html
```

## `make:controller`:  Creates a new controller class
[diff](https://github.com/kin29/maker-bundle-practice/commit/07684e4602da54ac36ff957ec1f6d3cb3d82c3b7)

src/Controller/GentlePopsicleControllerが作成される。
```
$ bin/console make:controller

 Choose a name for your controller class (e.g. GentlePopsicleController):
 > GentlePopsicleController

 created: src/Controller/GentlePopsicleController.php

           
  Success! 
           

 Next: Open your new controller class and add some pages!
```

## `make:crud`: Creates CRUD for Doctrine entity class
<img width="393" alt="スクリーンショット 2021-12-03 17 21 41" src="https://user-images.githubusercontent.com/12015851/144569467-6eb99137-5984-47e5-a1d6-6b280a33970d.png">


`form validator twig-bundle orm`が必要。
```
$ bin/console make:crud

                                                                                                                        
 [ERROR] Missing packages: to use the make:crud command, run:                                                           
                                                                                                                        
         composer require form validator twig-bundle orm                                                                
                                                                                                                        
```

entityを先に作る必要がある([make:entity](https://github.com/kin29/maker-bundle-practice#makeentity-creates-or-updates-a-doctrine-entity-class-and-optionally-an-api-platform-resource))
```
$ bin/console make:crud

 The class name of the entity to create CRUD (e.g. FierceGnome):
 > GentlePopsicle

 Choose a name for your controller class (e.g. GentlePopsicleController) [GentlePopsicleController]:
 > GentlePopsicleController


                                                                                                                        
 [ERROR] There are no registered entities; please create an entity before using this command.                           
                                                                                                                        

```
[diff](https://github.com/kin29/maker-bundle-practice/commit/a075e314891fa2203eb2af8e84cb4f31a401e8c9)
```angular2html
$ bin/console make:entity

Class name of the entity to create or update (e.g. VictoriousPizza):
> VictoriousPizza

created: src/Entity/VictoriousPizza.php
created: src/Repository/VictoriousPizzaRepository.php

Entity generated! Now let's add some fields!
You can always add more fields later manually or by re-running this command.

New property name (press <return> to stop adding fields):
  > name

  Field type (enter ? to see all types) [string]:
  >

  Field length [255]:
  >

  Can this field be null in the database (nullable) (yes/no) [no]:
  >

  updated: src/Entity/VictoriousPizza.php

  Add another property? Enter the property name (or press <return> to stop adding fields):
    >



    Success!


    Next: When you're ready, create a migration with php bin/console make:migration

$ bin/console make:crud

    The class name of the entity to create CRUD (e.g. DeliciousPopsicle):
    > VictoriousPizza

    Choose a name for your controller class (e.g. VictoriousPizzaController) [VictoriousPizzaController]:
    >

    created: src/Controller/VictoriousPizzaController.php
    created: src/Form/VictoriousPizzaType.php
    created: templates/victorious_pizza/_delete_form.html.twig
    created: templates/victorious_pizza/_form.html.twig
    created: templates/victorious_pizza/edit.html.twig
    created: templates/victorious_pizza/index.html.twig
    created: templates/victorious_pizza/new.html.twig
    created: templates/victorious_pizza/show.html.twig


    Success!


    Next: Check your new CRUD by going to /victorious/pizza/

```


## `make:docker:database`: Adds a database container to your docker-compose.yaml file
[diff](https://github.com/kin29/maker-bundle-practice/commit/6bc376d9906535f387a7ff0151f2fd018de113b1)

docker-compose.yml
```
$ git diff
diff --git a/docker-compose.yml b/docker-compose.yml
index a80a8cf..efa3ef8 100644
--- a/docker-compose.yml
+++ b/docker-compose.yml
@@ -3,14 +3,16 @@ version: '3'
 services:
 ###> doctrine/doctrine-bundle ###
   database:
-    image: postgres:${POSTGRES_VERSION:-13}-alpine
+    image: 'mysql:latest'
     environment:
-      POSTGRES_DB: ${POSTGRES_DB:-app}
-      # You should definitely change the password in production
-      POSTGRES_PASSWORD: ${POSTGRES_PASSWORD:-ChangeMe}
-      POSTGRES_USER: ${POSTGRES_USER:-symfony}
-    volumes:
-      - db-data:/var/lib/postgresql/data:rw
+      MYSQL_ROOT_PASSWORD: password
+      MYSQL_DATABASE: main
+    ports:
+      # To allow the host machine to access the ports below, modify the lines below.
+      # For example, to allow the host to connect to port 3306 on the container, you would change
+      # "3306" to "3306:3306". Where the first port is exposed to the host and the second is the container port.
+      # See https://docs.docker.com/compose/compose-file/#ports for more information.
+      - '3306'
       # You may use a bind-mounted host directory instead, so that it is harder to accidentally remove the volume and lose all your data!
       # - ./docker/db/data:/var/lib/postgresql/data:rw
 ###< doctrine/doctrine-bundle ###
```

## `make:entity`: Creates or updates a Doctrine entity class, and optionally an API Platform resource
[diff(annotation)](https://github.com/kin29/maker-bundle-practice/commit/4f565609ce850c7d0555f22cf565dd07601b4404)
```
$ bin/console make:entity

 Class name of the entity to create or update (e.g. TinyPuppy):
 > GentlePopsicle

 created: src/Entity/GentlePopsicle.php
 created: src/Repository/GentlePopsicleRepository.php
 
 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > 


           
  Success! 
           

 Next: When you're ready, create a migration with php bin/console make:migration
 
```

アトリビューションで生成したいときは以下に変更する。

config/packages/doctrine.yaml
```
doctrine:
    orm:
        mappings:
            App:
                type: attribute
```
[diff(attribute)](https://github.com/kin29/maker-bundle-practice/commit/f9cea50e60b13a30c9e91fdcf7b983cc6ea05a8b)
```
$ bin/console make:entity

 Class name of the entity to create or update (e.g. GentlePuppy):
 > GentlePuppy

 created: src/Entity/GentlePuppy.php
 created: src/Repository/GentlePuppyRepository.php
 
 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > 


           
  Success! 
           

 Next: When you're ready, create a migration with php bin/console make:migration
 
```

EntityとRepositoryが生成される。
- src/Entity/GentlePuppy.php
- src/Repository/GentlePuppyRepository.php


## `make:fixtures`: Creates a new class to load Doctrine fixtures
[diff](https://github.com/kin29/maker-bundle-practice/commit/6fce4697096d5cf2505ddd942f6dd3d63c5e940f)
 
[メモ]`orm-fixtures`が必要。

```bash
$ bin/console make:fixtures

                                                                                                                        
 [ERROR] Missing package: to use the make:fixtures command, run:                                                        
                                                                                                                        
         composer require orm-fixtures --dev                                                                            
                                                                                                                        

```

```
$ bin/console make:fixtures

 The class name of the fixtures to create (e.g. AppFixtures):
 > TestFixtures

 created: src/DataFixtures/TestFixtures.php

           
  Success! 
           

 Next: Open your new fixtures class and start customizing it.
 Load your fixtures by running: php bin/console doctrine:fixtures:load
 Docs: https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html
```

src/DataFixtures/TestFixtures.phpが生成された

## `make:form`: Creates a new form class
[diff](https://github.com/kin29/maker-bundle-practice/commit/f6bcc77f88ef64b9d025cf1496b8eae5e09b7965)
```
$ bin/console make:form

 The name of the form class (e.g. DeliciousGnomeType):
 > DeliciousGnomeType

 The name of Entity or fully qualified model class name that the new form will be bound to (empty for none):
 > 

 created: src/Form/DeliciousGnomeType.php

           
  Success! 
           

 Next: Add fields to your form and start using it.
 Find the documentation at https://symfony.com/doc/current/forms.html
```

src/Form/DeliciousGnomeTypeが生成された。


## `make:functional-test`: Creates a new test class
[diff](https://github.com/kin29/maker-bundle-practice/commit/0f90a025763bbbe3f3528cc2a63435d038a84af9)

[メモ] 
- `make:functional-test`はdeprecatedで、`make:test`使えらしい。
- `symfony/panther`が必要

tests/Command/DeliciousPizzaCommandTest.phpが作成される。
```
$ bin/console make:functional-test

                                                                                                                        
 [WARNING] The "make:functional-test" command is deprecated, use "make:test" instead.                                   
                                                                                                                        

                                                                                                                        
 [WARNING] symfony/panther is required for this test type. Install it with                                              
                                                                                                                        
           composer require symfony/panther --dev                                                                       
                                                                                                                        


Choose a class name for your test, like:
 * UtilTest (to create tests/UtilTest.php)
 * Service\UtilTest (to create tests/Service/UtilTest.php)
 * \App\Tests\Service\UtilTest (to create tests/Service/UtilTest.php)

 The name of the test class (e.g. BlogPostTest):
 > \App\Tests\Command\DeliciousPizzaCommandTest

 created: tests/Command/DeliciousPizzaCommandTest.php

           
  Success! 
           

 Next: Open your new test class and start customizing it.
 Find the documentation at https://github.com/symfony/panther#testing-usage

```


## `make:message`: Creates a new message and handler
[diff](https://github.com/kin29/maker-bundle-practice/commit/da2f02f99f23be8ca9c1ccdfd02d6606b2b32037)

[メモ] `messenger`が必要

```
$ bin/console make:message

                                                                                                                        
 [ERROR] Missing package: to use the make:message command, run:                                                         
                                                                                                                        
         composer require messenger                                                                                     
                                                                                                                        

```

以下2ファイルが作成された
- src/Message/SendEmailMessage.php
- src/MessageHandler/SendEmailMessageHandler.php

```
$ bin/console make:message

 The name of the message class (e.g. SendEmailMessage):
 > SendEmailMessage

 created: src/Message/SendEmailMessage.php
 created: src/MessageHandler/SendEmailMessageHandler.php

           
  Success! 
           

 Next: Open your new message class and add the properties you need.
       Then, open the new message handler and do whatever work you want!
 Find the documentation at https://symfony.com/doc/current/messenger.html
```

## `make:messenger-middleware`: Creates a new messenger middleware
[diff](https://github.com/kin29/maker-bundle-practice/commit/cba147003f7e75d725216611eff95a3ca44bd470)

```
$ bin/console make:messenger-middleware

 The name of the middleware class (e.g. CustomMiddleware):
 > CustomMiddleware

 created: src/Middleware/CustomMiddleware.php

           
  Success! 
           

 Next:
 - Open the App\Middleware\CustomMiddleware class and add the code you need
 - Add the middleware to your config/packages/messenger.yaml file
 Find the documentation at https://symfony.com/doc/current/messenger.html#middleware
```

## `make:migration`: Creates a new migration based on database changes
[diff](https://github.com/kin29/maker-bundle-practice/commit/b4dd3f4a4619fed566d41481466230dc60c34069)

[make:entity](https://github.com/kin29/maker-bundle-practice#makeentity-creates-or-updates-a-doctrine-entity-class-and-optionally-an-api-platform-resource) で作ったエンティティのmigrationファイル作ってくれた。
```
$ bin/console make:migration


           
  Success! 
           

 Next: Review the new migration "migrations/Version20211110083306.php"
 Then: Run the migration with php bin/console doctrine:migrations:migrate
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html
```

## `make:registration-form`: Creates a new registration form system
[diff](https://github.com/kin29/maker-bundle-practice/commit/2c2e6405e2fd42628e74906e18317699bf6ad26c)

こんな感じの登録フォームが簡単にできる。EntityもFormTypeもControllerもテンプレもいい感じに作ってくれる。
<img width="379" alt="スクリーンショット 2021-11-10 17 56 37" src="https://user-images.githubusercontent.com/12015851/142155704-c5a6f380-6990-447d-a91b-ed1a2131f20f.png">


[メモ] Symfony\Component\Security\Core\User\UserInterfaceを実装したEntityがないとらしい。

```
$ bin/console make:registration-form
                                                                                                                       
 Enter the User class that you want to create during registration (e.g. App\Entity\User) []:
 > App\Entity\GentlePuppy


                                                                                                                        
 [ERROR] The class "App\Entity\GentlePuppy" must implement "Symfony\Component\Security\Core\User\UserInterface".        
                                                                                                                        
```
`$bin/console make:user`実行後にもう一回やってみる

[メモ] `symfonycasts/verify-email-bundle symfony/mailer`が必要
```
$ bin/console make:registration-form

 Creating a registration form for App\Entity\User

 Do you want to add a @UniqueEntity validation annotation on your User class to make sure duplicate accounts aren't created? (yes/no) [yes]:
 > 

 Do you want to send an email to verify the user's email address after registration? (yes/no) [yes]:
 > 

                                                                                                                        
 [WARNING] We're missing some important components. Don't forget to install these after you're finished.                
                                                                                                                        
           composer require symfonycasts/verify-email-bundle symfony/mailer                                             
                                                                                                                        

 By default, users are required to be authenticated when they click the verification link that is emailed to them.
 This prevents the user from registering on their laptop, then clicking the link on their phone, without
 having to log in. To allow multi device email verification, we can embed a user id in the verification link.

 Would you like to include the user id in the verification link to allow anonymous email verification? (yes/no) [no]:
 >                                                                              
                                                                                                                        

 What email address will be used to send registration confirmations? e.g. mailer@your-domain.com:
 > 


                                                                                                                        
 [ERROR] "" is not a valid email address.                                                                               
                                                                                                                        

 What email address will be used to send registration confirmations? e.g. mailer@your-domain.com:
 >  mailer@your-domain.com         

 What "name" should be associated with that email address? e.g. "Acme Mail Bot":
 > Acme Mail Bot

 Do you want to automatically authenticate the user after registration? (yes/no) [yes]:
 > 

 ! [NOTE] No Guard authenticators found - so your user won't be automatically authenticated after registering.          

 What route should the user be redirected to after registration?:
  [0] gentle_popsicle
  [1] _preview_error
 > 0

 updated: src/Entity/User.php
 updated: src/Entity/User.php
 created: src/Security/EmailVerifier.php
 created: templates/registration/confirmation_email.html.twig
 created: src/Form/RegistrationFormType.php
 created: src/Controller/RegistrationController.php
 created: templates/registration/register.html.twig

           
  Success! 
           

 Next:
 1) Install some missing packages:
      composer require symfonycasts/verify-email-bundle symfony/mailer
 2) In RegistrationController::verifyUserEmail():
    * Customize the last redirectToRoute() after a successful email verification.
    * Make sure you're rendering success flash messages or change the $this->addFlash() line.
 3) Review and customize the form, controller, and templates as needed.
 4) Run "php bin/console make:migration" to generate a migration for the newly added User::isVerified property.

 Then open your browser, go to "/register" and enjoy your new form!

```

## `make:user`: Creates a new security user class
[diff](https://github.com/kin29/maker-bundle-practice/commit/1e91b66e34ed7fe32431ae4ded189388804072c7)
```
$ bin/console make:user

 The name of the security user class (e.g. User) [User]:
 > 

 Do you want to store user data in the database (via Doctrine)? (yes/no) [yes]:
 > 

 Enter a property name that will be the unique "display" name for the user (e.g. email, username, uuid) [email]:
 > 

 Will this app need to hash/check user passwords? Choose No if passwords are not needed or will be checked/hashed by some other system (e.g. a single sign-on server).

 Does this app need to hash/check user passwords? (yes/no) [yes]:
 > 

 created: src/Entity/User.php
 created: src/Repository/UserRepository.php
 updated: src/Entity/User.php
 updated: config/packages/security.yaml

           
  Success! 
           

 Next Steps:
   - Review your new App\Entity\User class.
   - Use make:entity to add more fields to your User entity and then run make:migration.
   - Create a way to authenticate! See https://symfony.com/doc/current/security.html
```

## `make:reset-password`: Create controller, entity, and repositories for use with symfonycasts/reset-password-bundle
[diff](https://github.com/kin29/maker-bundle-practice/commit/fc73769296f09c181cf4f625ace5bc6463f16af7)

こんな感じのフォームが簡単にできる。EntityもFormTypeもControllerもテンプレもいい感じに作ってくれる。
<img width="391" alt="スクリーンショット 2021-11-10 18 02 12" src="https://user-images.githubusercontent.com/12015851/142155706-84cfbf59-e324-405a-a775-0422a434a34e.png">


[メモ] `symfonycasts/reset-password-bundle`が必要

```
$ bin/console make:reset-password

                                                                                                                        
 [ERROR] Missing package: to use the make:reset-password command, run:                                                  
                                                                                                                        
         composer require symfonycasts/reset-password-bundle                                                            
                                                                                                                        

```

```
$ bin/console make:reset-password

Let's make a password reset feature!
====================================

 Implementing reset password for App\Entity\User

- ResetPasswordController -
---------------------------

 A named route is used for redirecting after a successful reset. Even a route that does not exist yet can be used here.

 What route should users be redirected to after their password has been successfully reset? [app_home]:
 > gentle_popsicle

- Email -
---------

 These are used to generate the email code. Don't worry, you can change them in the code later!

 What email address will be used to send reset confirmations? e.g. mailer@your-domain.com:
 > mailer@your-domain.com

 What "name" should be associated with that email address? e.g. "Acme Mail Bot":
 > Acme Mail Bot

 created: src/Controller/ResetPasswordController.php
 created: src/Entity/ResetPasswordRequest.php
 updated: src/Entity/ResetPasswordRequest.php
 created: src/Repository/ResetPasswordRequestRepository.php
 updated: src/Repository/ResetPasswordRequestRepository.php
 updated: config/packages/reset_password.yaml
 created: src/Form/ResetPasswordRequestFormType.php
 created: src/Form/ChangePasswordFormType.php
 created: templates/reset_password/check_email.html.twig
 created: templates/reset_password/email.html.twig
 created: templates/reset_password/request.html.twig
 created: templates/reset_password/reset.html.twig

           
  Success! 
           

 Next:
   1) Run "php bin/console make:migration" to generate a migration for the new "App\Entity\ResetPasswordRequest" entity.
   2) Review forms in "src/Form" to customize validation and labels.
   3) Review and customize the templates in `templates/reset_password`.
   4) Make sure your MAILER_DSN env var has the correct settings.
   5) Create a "forgot your password link" to the app_forgot_password_request route on your login form.

 Then open your browser, go to "/reset-password" and enjoy!

```

##  `make:serializer:encoder`: Creates a new serializer encoder class
[diff](https://github.com/kin29/maker-bundle-practice/commit/fc8b6aaf4aef0890c912f6b71257e6da59cc3230)

[メモ]`serializer`が必要

```angular2html
 bin/console make:serializer:encoder

                                                                                                                        
 [ERROR] Missing package: to use the make:serializer:encoder command, run:                                              
                                                                                                                        
         composer require serializer                                                                                    

```

src/Serializer/YamlEncoder.phpが作成される
```angular2html
$ bin/console make:serializer:encoder

 Choose a class name for your encoder (e.g. YamlEncoder):
 > YamlEncoder

 Pick your format name (e.g. yaml):
 > yaml

 created: src/Serializer/YamlEncoder.php

           
  Success! 
           

 Next: Open your new serializer encoder class and start customizing it.
 Find the documentation at http://symfony.com/doc/current/serializer/custom_encoders.html

```

## `make:serializer:normalizer`: Creates a new serializer normalizer class
[diff](https://github.com/kin29/maker-bundle-practice/commit/9139a81f8b6dfad5475e31f49918251d9c669127)
src/Serializer/Normalizer/UserNormalizer.phpが作成された。
```
$ bin/console make:serializer:normalizer

 Choose a class name for your normalizer (e.g. UserNormalizer):
 > UserNormalizer

 created: src/Serializer/Normalizer/UserNormalizer.php

           
  Success! 
           

 Next: Open your new serializer normalizer class and start customizing it.
 Find the documentation at https://symfony.com/doc/current/serializer/custom_normalizer.html
```

## `make:subscriber`:Creates a new event subscriber class
[diff](https://github.com/kin29/maker-bundle-practice/commit/614eeaaebf2c9a5e4e51fc8c98ff9e60b760fc7a)

src/EventSubscriber/ExceptionSubscriber.phpが作成された。
Suggested Eventsがでてきて親切。

```
$ bin/console make:subscriber

 Choose a class name for your event subscriber (e.g. ExceptionSubscriber):
 > ExceptionSubscriber

 Suggested Events:
 * Symfony\Component\Mailer\Event\MessageEvent (Symfony\Component\Mailer\Event\MessageEvent)
 * Symfony\Component\Messenger\Event\WorkerMessageFailedEvent (Symfony\Component\Messenger\Event\WorkerMessageFailedEvent)
 * Symfony\Component\Messenger\Event\WorkerMessageHandledEvent (Symfony\Component\Messenger\Event\WorkerMessageHandledEvent)
 * Symfony\Component\Messenger\Event\WorkerRunningEvent (Symfony\Component\Messenger\Event\WorkerRunningEvent)
 * Symfony\Component\Messenger\Event\WorkerStartedEvent (Symfony\Component\Messenger\Event\WorkerStartedEvent)
 * Symfony\Component\Security\Http\Event\CheckPassportEvent (Symfony\Component\Security\Http\Event\CheckPassportEvent)
 * Symfony\Component\Security\Http\Event\LoginSuccessEvent (Symfony\Component\Security\Http\Event\LoginSuccessEvent)
 * Symfony\Component\Security\Http\Event\LogoutEvent (Symfony\Component\Security\Http\Event\LogoutEvent)
 * console.command (Symfony\Component\Console\Event\ConsoleCommandEvent)
 * console.error (Symfony\Component\Console\Event\ConsoleErrorEvent)
 * console.terminate (Symfony\Component\Console\Event\ConsoleTerminateEvent)
 * debug.security.authorization.vote (Symfony\Component\Security\Core\Event\VoteEvent)
 * kernel.controller (Symfony\Component\HttpKernel\Event\ControllerEvent)
 * kernel.controller_arguments (Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent)
 * kernel.exception (Symfony\Component\HttpKernel\Event\ExceptionEvent)
 * kernel.finish_request (Symfony\Component\HttpKernel\Event\FinishRequestEvent)
 * kernel.request (Symfony\Component\HttpKernel\Event\RequestEvent)
 * kernel.response (Symfony\Component\HttpKernel\Event\ResponseEvent)
 * kernel.terminate (Symfony\Component\HttpKernel\Event\TerminateEvent)
 * kernel.view (Symfony\Component\HttpKernel\Event\ViewEvent)
 * security.authentication.failure (Symfony\Component\Security\Core\Event\AuthenticationFailureEvent)
 * security.authentication.success (Symfony\Component\Security\Core\Event\AuthenticationEvent)
 * security.interactive_login (Symfony\Component\Security\Http\Event\InteractiveLoginEvent)
 * security.switch_user (Symfony\Component\Security\Http\Event\SwitchUserEvent)

  What event do you want to subscribe to?:
 > console.command

 created: src/EventSubscriber/ExceptionSubscriber.php


  Success!


 Next: Open your new subscriber class and start customizing it.
 Find the documentation at https://symfony.com/doc/current/event_dispatcher.html#creating-an-event-subscriber
2021-11-17T02:34:57+00:00 [info] User Deprecated: Since symfony/security-core 5.3: The "Symfony\Component\Security\Core\Event\AuthenticationFailureEvent" class is deprecated, use "Symfony\Component\Security\Http\Event\LoginFailureEvent" with the new authenticator system instead.
```


## `make:test`:[make:unit-test|make:functional-test] Creates a new test class
[diff](https://github.com/kin29/maker-bundle-practice/commit/0dbe3493f9aa85b5174115f37c5c2d273716ccdd)

テストのタイプを聞いてくれる。
tests/BlogPostTest.phpが作成されました。
`ApiTestCase`を千楽して見ました。（`composer require api`が必要）

```
$ bin/console make:test

 Which test type would you like?:
  [TestCase       ] basic PHPUnit tests
  [KernelTestCase ] basic tests that have access to Symfony services
  [WebTestCase    ] to run browser-like scenarios, but that don't execute JavaScript code
  [ApiTestCase    ] to run API-oriented scenarios
  [PantherTestCase] to run e2e scenarios, using a real-browser or HTTP client and a real web server
 > ApiTestCase


 [WARNING] API Platform is required for this test type. Install it with

           composer require api



Choose a class name for your test, like:
 * UtilTest (to create tests/UtilTest.php)
 * Service\UtilTest (to create tests/Service/UtilTest.php)
 * \App\Tests\Service\UtilTest (to create tests/Service/UtilTest.php)

 The name of the test class (e.g. BlogPostTest):
 > BlogPostTest

 created: tests/BlogPostTest.php


  Success!


 Next: Open your new test class and start customizing it.
 Find the documentation at https://api-platform.com/docs/distribution/testing/
```

## `make:twig-extension`:Creates a new Twig extension class
[diff](https://github.com/kin29/maker-bundle-practice/commit/109d0ca1ef49ef81751f35f315eaee47c89ec9c3)

src/Twig/AppExtension.phpが作成される。
```
$ bin/console make:twig-extension

 The name of the Twig extension class (e.g. AppExtension):
 > AppExtension

 created: src/Twig/AppExtension.php


  Success!


 Next: Open your new extension class and start customizing it.
 Find the documentation at http://symfony.com/doc/current/templating/twig_extension.html
```

## `make:unit-test`:Creates a new test class
[diff](https://github.com/kin29/maker-bundle-practice/commit/d267ba62de63cbe72ceeab87d98b48f81a4bf1cc)

deprecatedらしいです。`make:test`を使ってとのこと。
tests/BlogPutTest.phpが作成される。

```
$ bin/console make:unit-test


 [WARNING] The "make:unit-test" command is deprecated, use "make:test" instead.



Choose a class name for your test, like:
 * UtilTest (to create tests/UtilTest.php)
 * Service\UtilTest (to create tests/Service/UtilTest.php)
 * \App\Tests\Service\UtilTest (to create tests/Service/UtilTest.php)

 The name of the test class (e.g. BlogPostTest):
 > BlogPutTest

 created: tests/BlogPutTest.php


  Success!


 Next: Open your new test class and start customizing it.
 Find the documentation at https://symfony.com/doc/current/testing.html#unit-tests
```

## `make:validator`:Creates a new validator and constraint class
[diff](https://github.com/kin29/maker-bundle-practice/commit/fa520cb7f0b909ca2c2e98005e4ca780be7c3956)

以下2ファイルが作成される。
src/Validator/EnabledValidator.php
src/Validator/Enabled.php

```angular2html
bin/console make:validator

 The name of the validator class (e.g. EnabledValidator):
 > EnabledValidator

 created: src/Validator/EnabledValidator.php
 created: src/Validator/Enabled.php

           
  Success! 
           

 Next: Open your new constraint & validators and add your logic.
 Find the documentation at http://symfony.com/doc/current/validation/custom_constraint.html
```

## `make:voter`:Creates a new security voter class
[diff](https://github.com/kin29/maker-bundle-practice/commit/b901ccc20959028a99dcfe8260ad604a4002faab)

src/Security/Voter/BlogPostVoter.phpが作成される。
```angular2html
 bin/console make:voter

 The name of the security voter class (e.g. BlogPostVoter):
 > BlogPostVoter

 created: src/Security/Voter/BlogPostVoter.php

           
  Success! 
           

 Next: Open your voter and add your logic.
 Find the documentation at https://symfony.com/doc/current/security/voters.html

```
