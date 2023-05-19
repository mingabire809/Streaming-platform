<?php $__env->startSection('content'); ?>

<div class="container">

    
        <div class="col-12">
            <div class="embed-responsive embed-responsive-16by9 col-9">
                
                <iframe class="embed-responsive-item w-50 h-75" src="/storage/<?php echo e($video->video); ?>" allowfullscreen></iframe>
              </div>
    
              <h6><?php echo e($video->title); ?></h6>
        </div>
    

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/michel/Documents/PHP/Laravel/StreamingPlatform/streaming/resources/views/video/show.blade.php ENDPATH**/ ?>