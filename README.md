# Back-End Engineer technical task

## What I Do and Why

This application purpose is to send `Messages` to the `Customer` over several channels: mail, push notifications and SMS.

I've decided to choose symfony framework as a base, because OTB it provides services such as mailer or messenger, which
were crucial for this implementation. Also, I know it quite well, so it was easy for me to spin everything up.

As for architecture I've decided to implement Domain Driven Design and Command Query Responsibility Segregation pattern.
Unfortunately this provides quite a bit overhead in case of the amount of code and classes that have to be created,
is time-consuming. Nevertheless, I wanted present my skills in this matter even though I was aware that there is not
enough time to make it fully work.

### Assumptions

There is a `Customer` entity (in plain PHP as no DB implementation was done) in the system which is registered by email 
address, so this is the thing that always will be present. Then `Customer` may add phone number or register the device 
(this wasn't implemented also) and based on that `Notification Service` chooses method to deliver the `Message`.

### Trade-offs

`SmsNotifier` is missing. Application has interface for it, but I didn't have time to proper implement it.
Also, implementation of `Pushy` is very sketchy. I just pasted the code from the docs and tweak it a little just to 
make it work, but it requires for sure proper implementation.  
I wanted application to react on some event in the system and then send notification to the user.
Didn't have time to implement an actual event dispatching and subscribing.
Also, no database was used to store anything and although Domain is prepared for language adjustments I didn't have time
to implement translator in infrastructure layer.
Application is prepared to run asynchronously (using redis), but this also wasn't implement.

Not all tests were written. 

I've also noticed that in symfony 5.2 they've changed registration of `AppExtension` which I've always used to provide
custom configuration for my applications. I didn't have time to deeply dig into it on how this suppose to be done now.
In the past I've simply created `AppExtension` and `Configuration` and register Extension in the `Kernel`.
No I saw that `Container::registerExtension` method is no longer there, so I was unable to provide my custom config.
I wanted to use this for switching on and off the channels in `NotificationService`. For now configuration of channels
is not perfect (as done simply on constants) and placed in the `NotificationService`.

## Installation

Requirements: 
* [PHP 7.4](https://www.php.net/downloads.php)
* [Docker](https://docs.docker.com/get-docker/)
* [Docker Compose](https://docs.docker.com/compose/install/)
* [Composer](https://getcomposer.org/download/)
* [Symfony Local Web Server](https://symfony.com/download)
* [Postmark API](https://postmarkapp.com/)
* [Pushy API](https://pushy.me/)

Make sure all requirements are met in your operating system and accessible in PATH.

File `.env.local` should contain Postmark API Key and Pushy API Key:
```dotenv
MAILER_DSN=postmark+api://POSTMARK_API_KEY@default
PUSHY_API_KEY=SECRET_API_KEY
```

Then just run:

```bash
make start
```

