<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('user_account') ? ' has-error' : ''); ?>">
                            <label for="user_account" class="col-md-4 control-label">Account</label>

                            <div class="col-md-6">
                                <input id="user_account" type="text" class="form-control" name="user_account" value="<?php echo e(old('user_account')); ?>" required autofocus>

                                <?php if($errors->has('user_account')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('user_account')); ?></strong>
                                    </span>
								<?php elseif($errors->has('errors')): ?>
									<span class="help-block">
                                        <strong><?php echo e($errors->first('errors')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                      

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>