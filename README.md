# Important

Исполнитель в первую очередь должен показать свой код и свой подход к решению задачи
Использование сторонних библиотек/фреймворков приветствуется только в том случае, когда они Действительно нужны (по мнению исполнителя)
Ограничение по времени в задачах по большей части для того, что бы не тратить его на ненужные вещи (а может тут красненьким сделать…), а сосредоточиться на условии задачи


# Simple 1

Данные хранятся в json файле data.json
название товара, описание товара, цена товара
Количество единиц - 12

нужно сверстать html траницу и вывести на ней товар из файла data.json

Страница должна иметь следующий вид:
- Шапка с Навигационным меню и ссылками на статические страницы (Главная, о нас, контакты) - сами эти страницы делать не надо
- Контент из трех колонок, в которых, собственно, наш товар
- Футер с контактными данными и копирайтом

В результате страница должна Адекватно выглядеть в браузере, но сильно над ее Внешним видом трудиться не надо

Время выполнения - до 1 часа


# Simple 1.1

Теперь каждая строка нашей "таблицы" кликабельна и при клике на нее открывается "окно", информирующее пользователя о времени добавления данных этой строки в таблицу MySQL
Таблица MySQL имеет вид, аналогичный структуре файла data.json

Время выполнения - до 1 часа


# Medium 1

- Спарсить данные из файла data.json, отсортировать по цене (в порядке возрастания) и имени (в порядке убывания) и поместить в таблицу базы данных, в случае совпадения имен - обновлять цену. Скрипт подготовить для запуска их консоли
- Взять из БД список и вывести таблицей (имя/цена). По клику показывать попап с Именем, ценой и Описанием.
Сильно трудиться над красивым интерфейсом не стоит.

Время выполнения - до 1 часа


