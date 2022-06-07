<?php

/*
1. Каким будет результат выполнения следующего куска кода:
*/
$a = "0";
if (isset($a)) {
    echo 0;
} else {
    echo 1;
}
if (empty($a)) {
    echo 0;
} else {
    echo 1;
}

if ($a) {
    echo 0;
} else {
    echo 1;
}
//  Ответ:
$answer = '010';

/*
 2. Задан ассоциативный массив на 10 элементов. Напишите код для получения ключа первого элемента 3-мя разными способами.
 */
$array = [
    'name' => 'John',
    'age' => 32,
    // .....
];
$firstKeyValueArray = [
    0 => array_key_first($array),
    1 => function () use ($array) {
        reset($array);
        return key($array);
    },
    2 => array_keys($array)[0],
];

/*
 3. Задан массив с числовыми ключами. Напишите код для получения значения последнего элемента массива 3-мя разными способами.
 */
$array = [
    'apple',
    'banana',
    'oranges'
];

$lastValueArray = [
    0 => $array[count($array) - 1],
    1 => end($array),
    2 => $array[array_key_last($array)],
    3 => array_pop($array) // This option is the least useful cause it mutates original array, just as a bonus.
];

/*
 4. Напишите функцию вычисления факториала числа.
 */
function factorial($number = 1)
{
    if ($number > 0) {
        while ($number !== 1) {
            $previousNumber = $number - 1;
            $number *= $previousNumber;
        }
    }
}

/*
 5. Напишите структуру базы данных для хранения информации о своей книжной Библиотеке:
    основная информация названия книг и имена авторов.
 */
$dbName = 'library_db';

$tableNames = [
    'authors',
    'books'
];

$authorTableFields = [
    'id' => 'int, autoincrement',
    'full_name' => 'string'
];

$booksTableFields = [
    'id' => 'int, autoincrement',
    'author_id' => 'int', //берем из таблицы авторов
    'book_name' => 'string',
];

/*
 6. Изобразите иерархию классов работающую с данной библиотекой.
(Возможность создание, выборка, удаление книги.
Получение всего списка книг, сортировка и поиск книг по атрибутам)
 */

abstract class Item
{
    private $name;

    abstract protected function add();

    abstract protected function update();

    abstract protected function delete();

    abstract protected function list();
}

interface Search
{
}

interface Sort
{
}

class Book extends Item implements Search, Sort
{
    protected function add()
    {
        // TODO: Implement add() method.
    }

    protected function update()
    {
        // TODO: Implement update() method.
    }

    protected function delete()
    {
        // TODO: Implement delete() method.
    }

    protected function list()
    {
        // TODO: Implement list() method.
    }
}

/*
 7. Из созданной вами базы данных, необходимо получить список книг, которые написаны 3-мя соавторами.
То есть, получить отчет «книга — количество соавторов» и отсеять те, у которых соавторов меньше 3х.
 */
$query = 'SELECT book_name, COUNT(author_id) FROM books
    GROUP BY book_name
    HAVING COUNT(author_id) = 3;';

/*
 8. Опишите как бы вы реализовали взаимодействие системы Библиотека с системой Учета,
в которой есть операции Купить книгу, Дать книгу в пользование,
Просмотреть каталог книг, но при этом информация о книгах хранится в системе Библиотека
 */

// В системе учета я бы использовал три новых таблицы и свою структуру API-классов, которые можно было бы
// построить с учетом возможного расширения ассортимента магазина для других товаров.
$dbName = 'accounting_db';

$tableNames = [
    'users',
    'sold',
    'rented',
];
?>
// построить интерфейс запроса ассортимента предлагаемых товаров (предметов). Далее путем связки пользователей и товаров
// добавлять item в необходимую таблицу операций. Таким образом, нам неважно какой предмет был куплен или взят в аренду.
// Отмечая в таблице тип предмета и его ID мы можем выводить любую информацию и проводить различные операции в дальнейшем.

/*
9. Написать структуру (HTML/CSS) и свою скриптовую реализацию (JS/JQuery) «классического» плагина «Аккордеон».
*/

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
      .accordion {
          background-color: #eee;
          color: #444;
          cursor: pointer;
          padding: 18px;
          width: 100%;
          border: none;
          text-align: left;
          outline: none;
          font-size: 15px;
          transition: 0.4s;
      }

      .active, .accordion:hover {
          background-color: #ccc;
      }

      .panel {
          padding: 0 18px;
          display: none;
          background-color: white;
          overflow: hidden;
      }
  </style>
</head>
<body>

<h2>Accordion</h2>

<button class="accordion">Section 1</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.</p>
</div>

<button class="accordion">Section 2</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.</p>
</div>

<button class="accordion">Section 3</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.</p>
</div>

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
</script>

</body>
</html>

// P.S. к задаче про "аккордеон": здесь я не стал изобретать велосипед. Структура и функционал подобных реализаций
// отличается лишь визуальной составляющей и отчасти - функционально (закрытие всех кроме одного, возможность свернуть все
// сразу, или развернуть их по нажатию кнопки). При необходимости я могу объяснить принцип работы кода.
// Суть грамотного программирования - периспользование эффективных наработок, а также создание того, что также можно
// переиспользовать. Поэтому написание частной реализации классических элементов - это адаптация уже существующих решений
// под нужды клиентов.