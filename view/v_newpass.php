<div class="container">
  <?php if(!isset($errNotFound) && !isset($errLink) && !isset($thongbao)){ ?>
      <div class="card-header">
            <h2 align="center" style="color: red; font-weight: bold;">Thay đổi mật khẩu</h2>
          </div>
      <form method="POST" class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
          <?php if (isset($passErr)):?>
                <span class='text-danger'><?=$passErr?></span>
          <?php endif ?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nhập lại Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass1">
          <?php if (isset($pass1Err)):?>
                <span class='text-danger'><?=$pass1Err?></span>
          <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  <?php }else if(isset($errNotFound)){?>
    <h1><?=$errNotFound?></h1>
  <?php }else if(isset($errLink)){?>
    <h1><?=$errLink?></h1>
  <?php } else if(isset($thongbao)){?>
    <h1><?=$thongbao?></h1>
  <?php } ?>

</div>