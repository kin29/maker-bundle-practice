# 導入方法
`composer require --dev symfony/maker-bundle`

ref: https://symfony.com/doc/current/SymfonyMakerBundle/index.html#sln

# どんなことができそう？
こん感じでいっぱいある
```bash
$ bin/console list make
Symfony 5.3.10 (env: dev, debug: true)

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -e, --env=ENV         The Environment name. [default: "dev"]
      --no-debug        Switch off debug mode.
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands for the "make" namespace:
  make:auth                   Creates a Guard authenticator of different flavors
  make:command                Creates a new console command class
  make:controller             Creates a new controller class
  make:crud                   Creates CRUD for Doctrine entity class
  make:docker:database        Adds a database container to your docker-compose.yaml file
  make:entity                 Creates or updates a Doctrine entity class, and optionally an API Platform resource
  make:fixtures               Creates a new class to load Doctrine fixtures
  make:form                   Creates a new form class
  make:functional-test        Creates a new test class
  make:message                Creates a new message and handler
  make:messenger-middleware   Creates a new messenger middleware
  make:migration              Creates a new migration based on database changes
  make:registration-form      Creates a new registration form system
  make:reset-password         Create controller, entity, and repositories for use with symfonycasts/reset-password-bundle
  make:serializer:encoder     Creates a new serializer encoder class
  make:serializer:normalizer  Creates a new serializer normalizer class
  make:subscriber             Creates a new event subscriber class
  make:test                   [make:unit-test|make:functional-test] Creates a new test class
  make:twig-extension         Creates a new Twig extension class
  make:unit-test              Creates a new test class
  make:user                   Creates a new security user class
  make:validator              Creates a new validator and constraint class
  make:voter                  Creates a new security voter class
```

## `make:auth`:Creates a Guard authenticator of different flavors
[メモ] `security`が必要でした。
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
 
 
 $ git diff
diff --git a/config/packages/security.yaml b/config/packages/security.yaml
index fc65577..f1bdd05 100644
--- a/config/packages/security.yaml
+++ b/config/packages/security.yaml
@@ -13,6 +13,7 @@ security:
         main:
             lazy: true
             provider: users_in_memory
+            custom_authenticator: App\Security\AppCustomAuthenticator
 
             # activate different ways to authenticate



$ git status  //src/Security/AppCustomAuthenticatorが作成された
On branch master
Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git restore <file>..." to discard changes in working directory)
        modified:   config/packages/security.yaml

Untracked files:
  (use "git add <file>..." to include in what will be committed)
        src/Security/

no changes added to commit (use "git add" and/or "git commit -a")

$ git diff
diff --git a/config/packages/security.yaml b/config/packages/security.yaml
index fc65577..f1bdd05 100644
--- a/config/packages/security.yaml
+++ b/config/packages/security.yaml
@@ -13,6 +13,7 @@ security:
         main:
             lazy: true
             provider: users_in_memory
+            custom_authenticator: App\Security\AppCustomAuthenticator

```

```
$ cat src/Security/AppCustomAuthenticator.php 
<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;

class AppCustomAuthenticator extends AbstractAuthenticator
{
    public function supports(Request $request): ?bool
    {
        // TODO: Implement supports() method.
    }

    public function authenticate(Request $request): PassportInterface
    {
        // TODO: Implement authenticate() method.
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        // TODO: Implement onAuthenticationFailure() method.
    }

//    public function start(Request $request, AuthenticationException $authException = null): Response
//    {
//        /*
//         * If you would like this class to control what happens when an anonymous user accesses a
//         * protected page (e.g. redirect to /login), uncomment this method and make this class
//         * implement Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface.
//         *
//         * For more details, see https://symfony.com/doc/current/security/experimental_authenticators.html#configuring-the-authentication-entry-point
//         */
//    }
}
```

##  `make:command`: Creates a new console command class
```
$ bin/console make:command

 Choose a command name (e.g. app:delicious-pizza):
 > app:delicious-pizza

 created: src/Command/DeliciousPizzaCommand.php

           
  Success! 
           

 Next: open your new command class and customize it!
 Find the documentation at https://symfony.com/doc/current/console.html
```

src/Command/DeliciousPizzaCommandが作成された。
```
<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:delicious-pizza',
    description: 'Add a short description for your command',
)]
class DeliciousPizzaCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
```

## `make:controller`:  Creates a new controller class
```
$ bin/console make:controller

 Choose a name for your controller class (e.g. GentlePopsicleController):
 > GentlePopsicleController

 created: src/Controller/GentlePopsicleController.php

           
  Success! 
           

 Next: Open your new controller class and add some pages!
```

src/Controller/GentlePopsicleControllerが作成された
```
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GentlePopsicleController extends AbstractController
{
    #[Route('/gentle/popsicle', name: 'gentle_popsicle')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GentlePopsicleController.php',
        ]);
    }
}
```

## `make:crud`: Creates CRUD for Doctrine entity class
`form validator twig-bundle orm`が必要でした。
```
$ bin/console make:crud

                                                                                                                        
 [ERROR] Missing packages: to use the make:crud command, run:                                                           
                                                                                                                        
         composer require form validator twig-bundle orm                                                                
                                                                                                                        
```
entity先に作ってないとでした(make:entity)
```
$ bin/console make:crud

 The class name of the entity to create CRUD (e.g. FierceGnome):
 > GentlePopsicle

 Choose a name for your controller class (e.g. GentlePopsicleController) [GentlePopsicleController]:
 > GentlePopsicleController


                                                                                                                        
 [ERROR] There are no registered entities; please create an entity before using this command.                           
                                                                                                                        

```

## `make:docker:database`: Adds a database container to your docker-compose.yaml file

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

アトリビューションで生成したいとき
config/packages/doctrine.yaml
```
doctrine:
    orm:
        mappings:
            App:
                type: attribute
```

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


src/Entity/GentlePuppy
```
<?php

namespace App\Entity;

use App\Repository\GentlePuppyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GentlePuppyRepository::class)]
class GentlePuppy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
```

## `make:fixtures`: Creates a new class to load Doctrine fixtures

[メモ]`orm-fixtures`が必要でした。

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
```
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TestFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
```

## `make:form`: Creates a new form class

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
```
<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliciousGnomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('field_name')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
```

## `make:functional-test`: Creates a new test class
[メモ] `make:functional-test`はdeprecatedで、`make:test`使えらしい。
[メモ] `symfony/panther`が必要

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

tests/Command/DeliciousPizzaCommandTest.php
```
<?php

namespace App\Tests\Command;

use Symfony\Component\Panther\PantherTestCase;

class DeliciousPizzaCommandTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Hello World');
    }
}
```

## `make:message`: Creates a new message and handler
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
さっき作ったエンティティのmigrationファイル作ってくれた。
```
$ bin/console make:migration


           
  Success! 
           

 Next: Review the new migration "migrations/Version20211110083306.php"
 Then: Run the migration with php bin/console doctrine:migrations:migrate
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html
```

## `make:registration-form`: Creates a new registration form system
こんな感じの登録フォームが簡単にできる。EntityもFormTypeもControllerもテンプレもいい感じに作ってくれる。
<img width="379" alt="スクリーンショット 2021-11-10 17 56 37" src="https://user-images.githubusercontent.com/12015851/141081822-f39edc2a-9ecd-4518-9b41-0d2f8873d5fa.png">


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
こんな感じのフォームが簡単にできる。EntityもFormTypeもControllerもテンプレもいい感じに作ってくれる。
<img width="391" alt="スクリーンショット 2021-11-10 18 02 12" src="https://user-images.githubusercontent.com/12015851/141082678-afc561a6-8c20-4f26-b76d-f734a13dfc35.png">


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

