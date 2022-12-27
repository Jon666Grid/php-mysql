<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test php</title>
</head>
<body>
  <h1>PHP + MySQL</h1>
  <?php 
        function printResults($result) {
          if ($result->num_rows > 0) {
            // print_r($result->fetch_all()); * вывести весь массив
            while($row = $result->fetch_assoc()) {
              echo "ID: ".$row['id'].'. ';
              echo "Name: ".$row['name'].'. ';
              echo "Bio: ".$row['bio'].'<br><br>';
            }
          }

          echo "<hr>";
        }

        $mysql = new mysqli("localhost", "root", "", "php-mysql");
        $mysql->query("SET NAMES 'utf8'");

        // if($mysql->connect_error) {
        //   echo 'Error Number:' .$mysql->connect_errno.'<br>'; * вывод ошибки подключения базы
        //   echo 'Error:' .$mysql->connect_error;
        // } else {
        //   // echo 'Host info:' .$mysql->host_info; * информация об успешном подключении
        //   // $mysql->query("DROP TABLE `example`");  * удалить таблицу
        //   // $mysql->query("CREATE TABLE `users` (  * создать таблицу с полями
        //   //   id INT(11) NOT NULL,
        //   //   name VARCHAR(50) NOT NULL,
        //   //   bio TEXT NOT NULL,
        //   //   PRIMARY KEY(id)
        //   // )");
        // }

        // for($i = 1; $i <= 5; $i++) {
        //   $name = "Bob #" .$i;
        // $mysql->query("INSERT INTO `users` (`name`, `bio`) VALUES('$name', 'Full Text')"); * создания пользователя через цикл 5ШТ
        // }

        // $mysql->query("UPDATE `users` SET `bio`= 'New text' WHERE `id` <= 2"); * обновлять по условию 

        // $mysql->query("DELETE FROM `users` WHERE `id` = 5"); *удаляем по условию

        $result = $mysql->query("SELECT * FROM `users`"); //* выбираем весь список
        // echo "Nums: ".$result->num_rows; * вывести кол-во полей
        printResults($result);

        $result = $mysql->query("SELECT `id`, `name` FROM `users`"); //* выбираем по типу поля
        printResults($result);

        $result = $mysql->query("SELECT * FROM `users` WHERE `id` > 4"); //* выбираем по условию
        printResults($result);

        $result = $mysql->query("SELECT * FROM `users` WHERE `id` > 4 ORDER BY `id` DESC"); //* по условию и сортировке с большого в меньшие id
        printResults($result);

        
        $result = $mysql->query("SELECT * FROM `users` LIMIT 1"); //* выбираем лимит вывода из списка
        printResults($result);


        $mysql->close();
  ?>

  
</body>
</html>