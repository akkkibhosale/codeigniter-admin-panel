<div class="row">
  <div class="col-6">
    <div class="card shadow">
      <div class="card-body">
           <?= form_open('change-password', ['class' => 'user']); ?>
                                   
            <div class="form-group row">
                <div class="col-sm-12 mb-3">
                    <input type="password" class="form-control form-control-user <?= (form_error('c_password') ? 'is-invalid' : ''); ?>" name="c_password" placeholder="Current password" value="<?= set_value('c_password'); ?>">
                    <?= form_error('c_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-12 mb-3">
                    <input type="password" class="form-control form-control-user <?= (form_error('n_password') ? 'is-invalid' : ''); ?>" name="n_password" placeholder="New Password" value="<?= set_value('n_password'); ?>">
                    <?= form_error('n_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-12 mb-3">
                    <input type="password" class="form-control form-control-user <?= (form_error('r_password') ? 'is-invalid' : ''); ?>" name="r_password" placeholder="Re Enter New Password" value="<?= set_value('r_password'); ?>">
                    <?= form_error('r_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              
            </div>
            
            <button type="submit" class="btn btn-primary btn-user btn-block">Change Password</button>
            <?= form_close(); ?>
      </div>
    </div>
 </div>
 
 <div class="col-md-6 alert alert-info m-0 text-left">
    <label>Guidelines for secure access</label>
    <ul class="mb-0"> 
         <li>Ensure that you are using strong password. Use at least 6 Characters with a combination of Upper case Letters, Lower case letters, Special Characters and Numbers. EG – Run123ab$</li>
        <li>Please do not distribute or share your credentials with anyone.</li> 
        <li>Please change your password periodically and enter a strong password.</li> 
        <li>No one will ever ask you for your password on calls or emails.</li>
       
    </ul>
    
    </div>

</div>