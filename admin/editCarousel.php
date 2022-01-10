<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Admin Portfolio</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://sortablejs.github.io/Sortable/Sortable.js"></script>
</head>

<body>
    <?php
    session_start();
    if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
        header("location: index.php");
        exit;
    }
    ?>

    <div id="gridDemo" class="col">
        <div class="grid-square">Item 1</div>
        <!--
			 -->
        <div class="grid-square">Item 2</div>
        <!--
			 -->
        <div class="grid-square">Item 3</div>
        <!--
			 -->
        <div class="grid-square">Item 4</div>
        <!--
			 -->
        <div class="grid-square">Item 5</div>
        <!--
			 -->
        <div class="grid-square">Item 6</div>
        <!--
			 -->
        <div class="grid-square">Item 7</div>
        <!--
			 -->
        <div class="grid-square">Item 8</div>
        <!--
			 -->
        <div class="grid-square">Item 9</div>
        <!--
			 -->
        <div class="grid-square">Item 10</div>
        <!--
			 -->
        <div class="grid-square">Item 11</div>
        <!--
			 -->
        <div class="grid-square">Item 12</div>
        <!--
			 -->
        <div class="grid-square">Item 13</div>
        <!--
			 -->
        <div class="grid-square">Item 14</div>
        <!--
			 -->
        <div class="grid-square">Item 15</div>
        <!--
			 -->
        <div class="grid-square">Item 16</div>
        <!--
			 -->
        <div class="grid-square">Item 17</div>
        <!--
			 -->
        <!--
			 -->
        <div class="grid-square" style="">Item 19</div>
        <!--
			 -->
        <div class="grid-square" style="">Item 20</div>
        <div class="grid-square" draggable="false" style="">Item 18</div>
    </div>

    <script>
        new Sortable($('#gridDemo'), {
            animation: 150,
            ghostClass: 'blue-background-class'
        });
    </script>
</body>

</html>