<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>selet</title>
	 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</head>
<script type="text/javascript">
	$(document).ready(function() {
    $('select').material_select();
  });

</script>
<body>
<div class="container card-panel">
<div class="row">
	<div class="input-field col s12">
    <select>
      <option value="0" selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
  </div>
</div>

</div>


</div>
</body>
</html>
