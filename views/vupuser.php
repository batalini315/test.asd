<h2>Правка данных пользователя</h2>
<div class="row align-items-start">
    <div class="col"></div>
    <div class="col">
<form action="upuser" method="get">
<input type="hidden"  name="id" value=<?=$user['id']?>>
    <div clas="form-group"> 
       <label for="email">Email</label>  
       <input type="email" class="form-control" name="email" value= <?=$user['email']?>>
    </div>
    <div class="form-group">
      <label for="name">Имя</label>  
      <input type="text" class="form-control" name="name" value= <?=$user['name']?>>
    </div>
    <div class="form-group">
      <label for="address">Адрес</label>  
      <input type="text" class="form-control" name="address" value= <?=$user['address']?>>
    </div>
    <div class="form-group">
      <label for="phone">Телефон</label>
      <input type="text" class="form-control" name="phone" value= <?=$user['phone']?>>
    </div>
    <div class="form-group">
        <label for="comment">Коментарий</label>      
        <input type="text" class="form-control" name="comment" value= <?=$user['comment']?>>
    </div>    
    <div class="form-group">    
        <select class="form-select" aria-label="Default select example" name="division">
            <?php foreach ($divisions as $value) {
                if($value['id']== $user['division']) {
                  echo('<option  selected  value="'.$value['id'].'">'.$value['name'].' </option>');  
                } else {
                    echo('<option value="'.$value['id'].'">'.$value['name'].'</option>');
                }
                
                
            } ?>    
        </select>
    </div>
    <br>
  <div class="form-group"><input type="submit"  class="btn btn-primary" value="Изменить"></div>
 </form>
 <br>
 <form action="/deluser/<?=$user['id']?>" method="get">

<div class="form-group"><input type="submit"  class="btn btn-primary" value="Удалить"></div>
</div>
    <div class="col"></div>
</div>