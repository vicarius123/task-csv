<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?
$orders = json_decode($order[0]->order_info);
$oder_id = $order[0]->id;

echo '<h1>ORDER ID: '.$oder_id.'</h1>';

echo '<table class="table table-bordered table-hover">';
echo '<thead>
  <th>Name</th>
  <th>QTY</th>
  <th>Thickness</th>
  <th>Material</th>
  <th>Bending</th>
  <th>Threading</th>
</thead>';
  foreach($orders as $ordr):
    echo '<tr>';
      foreach($ordr as $or):
        echo '<td>'.$or.'</td>';
      endforeach;
    echo '</tr>';
  endforeach;
echo '<table>';
