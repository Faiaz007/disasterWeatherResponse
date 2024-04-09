<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aid Provider</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="container">
  <h2>Register Form</h2>

  <form action="" method="POST">

    <fieldset>

      <legend>Medecine information:</legend>

      <div class="form-group">
        <label for="id">Med Id:</label>
        <input type="number" class="form-control" name="id" id="id">
      </div>

      <div class="form-group">
        <label for="medName">Med Name:</label>
        <input type="text" class="form-control" name="shelterName" id="shelterName">
      </div>

      <div class="form-group">
        <label for="groupName">Med Group Name:</label>
        <input type="text" class="form-control" name="groupName" id="groupName">
      </div>

      <div class="form-group">
        <label for="date">MFG Date:</label>
        <input type="number" class="form-control" name="date" id="mfgDate">
      </div>

      <div class="form-group">
        <label for="date">EXP Date:</label>
        <input type="date" class="form-control" name="date" id="expDate">
      </div>

      <div class="form-group">
        <label for="batchno">Batch no:</label>
        <input type="text" class="form-control" name="batchno" id="batchno">
      </div>

      <div class="form-group">
        <label for="age">Age Range:</label>
        <input type="number" class="form-control" name="age" id="age">
      </div>

      <div class="form-group">
        <label for="effects">Side Effects:</label>
        <input type="text" class="form-control" name="effects" id="sideEffects">
      </div>

      <input type="submit" name="submit" value="Submit" class="btn btn-primary">

    </fieldset>

  </form>
</div>    
</body>
</html>