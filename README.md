## Keep Calm Test

Реализовать страницу с комментариями к произвольному статичному тексту.

Задачи:

Реализовать добавление комментария, оно должно происходить без перезагрузки страницы.

Изначально показывать 3 комментария, остальные должны подгружаться (3 за один раз) по нажатию на кнопку “Показать ещё”.

* Страница должна быть защищена авторизацией. Неавторизованному пользователю доступен только просмотр. Логин и пароль должны храниться в БД.

* Реализовать фильтрацию комментариев по автору. Поле фильтра по автору должно быть текстовым. В процессе ввода (начиная с 3х символов) должны предлагаться варианты авторов. Автор = логин.

* Реализовать слайдер с 5 случайными комментариями. Единовременно должны отображаться только 2 комментария остальные доступны при пролистывании. Слайдер зациклить (после последнего снова отображается первый) Слайдер расположить выше статичного текста.

---

git clone https://github.com/dralexsand/keepcalmtest.git

cd keepcalmtest

cp .env.example .env

docker-compose up --build

#### Основная страница:
http://127.0.0.1:8088

#### Информация о пользователях (для регистрации)
http://127.0.0.1:8088/info

#### Доступ к админке БД:
http://127.0.0.1:8989/?server=db&username=root&db=keepcalmtest_db


