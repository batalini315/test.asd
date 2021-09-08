<h2>Все пользователи</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Имя</th>
      <th scope="col">Отдел</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
      foreach ($users as  $value) {
          echo(
              '<tr>
                <td> <a class="navbar-brand" href="/upuser/'.$value['id'].'">'.$value['name'].'</a></td>                
                <td>'.$value['division'].'</td>                
              </tr>');
              $i++;
      }
      ?>
    
  </tbody>
</table>