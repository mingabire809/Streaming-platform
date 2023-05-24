<?php $__env->startSection('content'); ?>

<div class="container">
  
  
  <div class="row">

    <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $videos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-3 mb-3 mt-5 text-align-center">
        <a href="/my-video/<?php echo e($videos->id); ?>">
          <img src="/<?php echo e($videos->thumb); ?>" class="w-100 h-100"  alt="">
          
        </a>
        <h6 style="text-align: center" class="mt-2"><?php echo e($videos->title); ?></h6>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   


    
    
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/michel/Documents/PHP/Laravel/StreamingPlatform/streaming/resources/views/video/myvideos.blade.php ENDPATH**/ ?>