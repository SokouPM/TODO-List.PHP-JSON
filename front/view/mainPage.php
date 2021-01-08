<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Liste des tâches</title>
  <link rel="stylesheet" href="front/style/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <script src="https://kit.fontawesome.com/9611474495.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <h1>Liste des tâches</h1>
  </header>

  <main>
    <div id="main">
      <form action="index.php?addTask" id="newTaskForm" method="POST">
        <input type="text" name="newTask" pattern="[a-zA-ZÀ-ÿ0-9 ]{1,30}" required="required" placeholder="Ajouter une tâche">
        <button id="validButton"><i class="fa fa-plus-circle"></i></button>
      </form>

      <?php foreach ($todoArrayContent as $list) : ?>
        <?php foreach ($list as $task) : ?>
          <div class="list">
            <button class="checkButton buttonNotChecked"><i class="fas fa-check"></i></i></button>
            <form action="index.php?deleteTask" method="POST">
              <p class="taskName"><?= $task ?></p>
              <input type="hidden" name="taskNumber" value="<?= $elementNumber++ ?>">
              <button id="deleteButton"><i class="far fa-trash-alt"></i></button>
            </form>
          </div>
        <?php endforeach ?>
      <?php endforeach ?>

    </div>
  </main>

  <footer>
    <p>Pierre Marquet - 2021</p>
  </footer>

  <script src="front/script/script.js"></script>
</body>

</html>