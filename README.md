# sputnik-test
test-task for Sputnik:
Проект Laravel + Postman-коллекция запросов

- PHP 8.3.15
- Laravel Framework 11.36.1
- PostgreSQL 12
- Docker version 24.0.2


## API Reference

#### Get all users
```http
  GET /users
```

#### Get all places
```http
  GET /places
```

#### Get wishlist
```http
  GET /wishlist/{id}
```
| Parameter | Type     | Description              |
| :-------- | :------- | :----------------------  |
| `id`      |`integer` | **Required**. Id of user |


#### Create user
```http
  POST /users
```
| Parameter | Type     | Description              |
| :-------- | :------- | :----------------------  |
| `login`   |`string`  | **Required**. Unique     |
| `password`|`string`  | **Required**. 8 symbols  |


#### Create place
```http
  POST /places
```
| Parameter | Type     | Description              |
| :-------- | :------- | :----------------------  |
| `placename`|`string`   | **Required**. Unique   |
| `longitude`|`integer`  | **Required**.          |
| `latitude` |`integer`  | **Required**.          |


#### Add place to wishlist
```http
  POST /wishlist/add
```
| Parameter | Type     | Description              |
| :-------- | :------- | :----------------------  |
| `user_id` |`integer` | **Required**.   id       |
| `place_id`|`integer` | **Required**.   id       |
