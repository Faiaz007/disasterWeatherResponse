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

      <legend>Shelter information:</legend>

      <div class="form-group">
        <label for="id">Shelter Id:</label>
        <input type="number" class="form-control" name="id" id="id">
      </div>

      <div class="form-group">
        <label for="shelterName">Shelter Name:</label>
        <input type="text" class="form-control" name="shelterName" id="shelterName">
      </div>

      <div class="form-group">
        <label for="shelterCondition">Shelter Condition:</label>
        <input type="text" class="form-control" name="shelterCondition" id="shelterCondition">
      </div>

      <div class="form-group">
        <label for="capacity">Shelter Capacity:</label>
        <input type="number" class="form-control" name="capacity" id="capacity">
      </div>

      <div class="form-group">
        <label for="date">Built Date:</label>
        <input type="date" class="form-control" name="date" id="date">
      </div>

      <input type="submit" name="submit" value="Submit" class="btn btn-primary">

    </fieldset>

  </form>
</div>    
</body>
</html>