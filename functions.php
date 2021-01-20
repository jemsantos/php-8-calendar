<?php

function get($x) {
  if (isset($_GET[$x])) {
    return stripslashes(htmlentities(trim($_GET[$x])));
  } else return null;
}

function prevMonth($time) {
  return date('Y-m-d', strtotime("-1 month", $time));
}

function nextMonth($time) {
  return date('Y-m-d', strtotime("+1 month", $time));
}

function getMonthTime() {
  $monthTime = strtotime(date("Y-m-1"));

  $pMonth = get("month");

  if ($pMonth) {
    extract(date_parse_from_format("Y-m-d", $pMonth));

    $monthTime = strtotime("{$year}-{$month}-1");
  }

  return $monthTime;
}
