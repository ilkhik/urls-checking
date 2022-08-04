# Deployment
### Install dependencies using composer
```
composer install
```

### RabbitMQ
Application requires RabbitMQ or other message broker. 
Config example for RabbitMQ in **config/web.php** and **config/console.php**:
```
/*...*/
'components' => [
    /*...*/
    'queue' => [
        'class' => \yii\queue\amqp_interop\Queue::class,
        'port' => 5672,
        'user' => 'guest',
        'password' => 'guest',
        'queueName' => 'queue',
        'driver' => yii\queue\amqp_interop\Queue::ENQUEUE_AMQP_LIB,
    ],
]
```

### Database
Set database settings in **config/db.php** and run command:
```
./yii migrate/fresh
```

### Worker
To process the job queue, you need to run the worker as a daemon:
```
./yii queue/listen
```