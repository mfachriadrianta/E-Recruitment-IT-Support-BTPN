<div class="page-header">
    <h1>Change Password</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group content-sign-in">
                <label class="title-input-type-primary-seruput">Password</label>
                <div class="inputBox">
                <input name="pass1" type="password" class="form-control input-type-primary-seruput" id="password"  required autofocus>
                
            </div>
            </div>
            <div class="form-group content-sign-in">
                <label class="title-input-type-primary-seruput" for="exampleInputPassword1">Repeat Password</label>
                <div class="inputBox">
                <input name="pass2" type="password" class="form-control input-type-primary-seruput" id="password2" required autofocus>
              
            </div>
            </div>
            <div class="form-group content-sign-in">
                <label class="title-input-type-primary-seruput" for="exampleInputPassword1">Password</label>
                <div class="inputBox">
                <input name="pass3" type="password" class="form-control input-type-primary-seruput" id="password3" required autofocus>
            </div>
            </div>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
        </form>
    </div>
    <div class="col-sm-6" >
    <img src="images/ui_password.png" height="300" width="400" style="float:right">
    </div>
</div>
<div class="row">
    
</div>