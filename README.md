## Test

### Installation
```
$ git clone https://github.com/HarryButtowski/yii2-test.git yii2-test
$ cd yii2-test
$ composer install
```

### Configuration
DB
```
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mysql;dbname=db',
    'username' => 'user',
    'password' => 'password',
    'charset' => 'utf8',
];
```

### Migration
```
$ php yii migrate
```


