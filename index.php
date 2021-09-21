<form method="post">
    <label for="title">Title: (must be entered)</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="from">From:</label><br>
    <input type="text" id="from" name="from" value="2021-09-21 19:00"><br><br>
    <label for="to">To:</label><br>
    <input type="text" id="to" name="to" value="2021-09-21 19:01"><br><br>
    <label for="descr">Description: (optional)</label><br>
    <input type="text" id="descr" name="descr"><br><br>
    <input type="submit" value="Submit">
</form>

<?php

require_once 'vendor/autoload.php';

use Spatie\CalendarLinks\Link;

$from = DateTime::createFromFormat('Y-m-d H:i',  $_POST['from']);
$to = DateTime::createFromFormat('Y-m-d H:i', $_POST['to']);

if ($_POST['title'] !== '') {
    $link = Link::create($_POST['title'], $from, $to)
        ->description($_POST['descr']);
        //->address('Kruikstraat 22, 2018 Antwerpen');

// Generate a link to create an event on Google calendar
    echo "<a href='" . $link->google() . "'target='_blank'>go to GOOGLE CALENDAR</a>";
}

?>

