<h2>Список сотрудников</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Отдел</th>      
      <th scope="col">Обновить</th>
      <th scope="col">Удалить</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
      foreach ($divisions as  $value) {
          echo(
              '<tr>
                <td>'.$value['name_division'].'</td>                
                <td> <a class="navbar-brand" href="/updivision/'.$value['id'].'">Обновить</a></td>
                <td> <a class="navbar-brand" href="/deldivision/'.$value['id'].'">Удалить</a></td>
              </tr>');
              $i++;
      }
      ?>
    
  </tbody>
</table>