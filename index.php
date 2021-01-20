<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">

  <title>Calendário PHP 8</title>
</head>
<body>
<?php
  require_once('./functions.php');

  $monthTime = getMonthTime();
?>
  <header>
    <a href="?month=<?=prevMonth($monthTime)?>">Anterior</a>
    <h1><?= date('F Y', $monthTime) ?></h1>
    <a href="?month=<?=nextMonth($monthTime)?>">Próximo</a>
  </header>
  <table border='0'>
    <thead>
      <tr>
        <th>DOM</th> https://github.com/hcodebr/php-8-calendar
        <th>SEG</th>
        <th>TER</th>
        <th>QUA</th>
        <th>QUI</th>
        <th>SEX</th>
        <th>SAB</th>
      <tr>
    </thead>
    <?php
      //echo date('d/M/Y', $monthTime), ', ', date('w', $monthTime);
      if (date('w', $monthTime) != 0) {
        $startDate = strtotime("last sunday", $monthTime);
      } else {
        $startDate = $monthTime;
      }
    ?>
    <tbody>
    <?php
      for($row = 0; $row < 6; $row++) {
        echo "<tr>";

        for($column = 0; $column < 7; $column++) {
          if (date('Y-m', $startDate) !== date('Y-m', $monthTime)) {
            $classe = 'class="other-month"';
          } else {
            $classe = '';
          }

          echo "<td {$classe}>";
            echo date('j', $startDate);
          echo "</td>\n";

          // somando o calendário
          $startDate = strtotime("+1 day", $startDate);
        }

        echo "</tr>";
      }
    ?>
    </tbody>
  </table>
</body>
</html>
