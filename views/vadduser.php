<h2>Добавить нового сотрудника</h2>
<div class="alert alert-warning"><?=$errorString?></div>
<div class="row align-items-start">
    <div class="col"></div>
    <div class="col">
<form action="adduser" method="get">
    <div clas="form-group"> 
       <label for="email">Email</label>  
       <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label for="name">Имя</label>  
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label for="address">Адрес</label>  
      <input type="text" class="form-control" name="address">
    </div>
    <div class="form-group">
      <label for="phone">Телефон</label>
      <input type="text" class="form-control" name="phone">
    </div>
    <div class="form-group">
        <label for="comment">Коментарий</label>      
        <input type="text" class="form-control" name="comment">
    </div>    
    <div class="form-group">    
        <select class="form-select" aria-label="Default select example" name="division">
            <?php foreach ($divisions as $value) {
                echo('<option value="'.$value['id'].'">'.$value['name'].'</option>');
            } ?>    
        </select>
    </div><br>
  <div class="form-group"><input type="submit"  class="btn btn-primary" value="Добавить"></div>
 </form>
</div>
    <div class="col"></div>
</div>

<!--  -->