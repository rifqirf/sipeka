<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  

<select name="no_induk" id="no_induk">
  <?php if(!empty($siswa)): ?>
  <option value="<?= $siswa["no_induk"] ?>">
    <?php $siswa["no_induk"]; ?>
  </option>
  <?php endif; ?>
</select>


</body>
</html>