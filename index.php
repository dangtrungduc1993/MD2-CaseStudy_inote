<?php
require __DIR__ . "/vendor/autoload.php";
use App\Controller\NoteController;
$noteController = new NoteController();
$page = $_GET["page"] ??"";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php?page=note-list">Show list</a>
<?php
switch ($page) {

    case "note-list":

        $noteController->showAll();
        break;
    case "note-detail":

        $noteController->showById($_GET["id"]);

        break;
    case "note-delete":
        $noteController->deleteNote($_GET["id"]);
        break;
    case "note-create":
        $noteController->createNote();
        break;
    case "note-update":
        $noteController->updateNote();
        break;
}
?>

</body>
</html>
