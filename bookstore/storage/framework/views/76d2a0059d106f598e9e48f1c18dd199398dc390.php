<?php $__env->startSection('content'); ?>
	<div class="starter-template">
		<table class = "table table-hover">
		<tr>
			<td>書籍名稱</td>
			<td>書籍價格</td>
			<td>剩餘數量</td>
			<td>加入購物車</td>
		</tr>
		<?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr book_id="<?php echo e($var->book_id); ?>">
			
			<td><?php echo e($var->book_name); ?></td>
			<td><?php echo e($var->book_price); ?></td>
			<td><?php echo e($var->book_quantity); ?></td>
			<td><input type="text" name="buy_quantity" id="buy_quantity" value="1"></td>
			<td><a href="#" role="btn" class="btn btn-warning" id="insert-btn">加入購物車</a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
    </div>
<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script>

$(document).ready(function(){	
	$( ".table tbody" ).on("click",'tr td #insert-btn',function() {
			    
			    var id = $(this).parents('tr:first').attr('book_id');
				var buy_quantity = document.getElementById('buy_quantity').value;
				var data = id + "," + buy_quantity;
			    //alert(data);
				window.location.href = "<?php echo e(URL::to('books/1,11/create')); ?>"
				
	});	
});

</script>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>