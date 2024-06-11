<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Motorcycle Information</title>
</head>
<body>

<h2>Motorcycle Information</h2>

<form action="{{ route('store_motorcycle') }}" method="post" enctype="multipart/form-data">
@csrf
  <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">

  <label for="motorcycle_name">Motorcycle Name:</label><br>
  <input type="text" id="motorcycle_name" name="motorcycle_name"><br><br>
  
  <label for="motorcycle_type">Motorcycle Type:</label><br>
  <input type="text" id="motorcycle_type" name="motorcycle_type"><br><br>
  
  <label for="contract_pdf">Contract PDF File:</label><br>
  <input type="file" id="contract_pdf" name="contract_pdf"><br><br>
  
  <input type="submit" value="Submit">
</form>

</body>
</html>
