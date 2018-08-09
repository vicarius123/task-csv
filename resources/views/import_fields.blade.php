<title>Task</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
    {{ csrf_field() }}



  <table>
    <thead>
      <th>Name</th>
      <th>QTY</th>
      <th>Thickness</th>
      <th>Material</th>
      <th>Order</th>
      <th>Threading</th>
    </thead>

    <? $fine = true; foreach($csv_data as $keys=>$row):

      if(empty($row['0']) || empty($row['1']) || empty($row['2']) || empty($row['3'])):
        $fine = false;
        echo '<tr>';
          foreach($row as $key => $value):
            $required = ($key==0||$key==1||$key==2||$key==3)?'required':'';

            echo '<td><input type="text" '.$required.' name="table['.$keys.']['.$key.']" value="'.$value.'" /></td>';
          endforeach;
        echo '</tr>';
      endif;
    endforeach; ?>
  </table>
  <?

  if($fine == true):

    echo 'All data is fine... submiting now';
  ?>
  <script>
    $('.form-horizontal').submit();
  </script>
<? else: ?>

  <Script>
  alert('Your file has some missing columns, please fill them up.');
  </Script>
<? endif; ?>

  <br />
  <button type="submit" class="btn btn-primary">
    Import Data
  </button>
</form>
