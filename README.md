## Test
### Task
    С использованием Yii2 нужно сделать проект, которые позволяет:

    1. Авторизоваться под учёткой admin, которая может добавлять и удалять пользователей(эти пользователи могут только использовать REST)
    2. REST, которое работает с сущностью автозапчасть и позволяет осуществлять поиск и просмотр конкретной детали. Аттрибуты автозапчасти - номер, название, количество, цена
    3. REST, корзина которая позволяет добавить запчасть в корзину и получить активную корзину у конкретного пользователя
    4. Нагенерируй в миграции данных.

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


