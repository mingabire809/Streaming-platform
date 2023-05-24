<?php $__env->startSection('content'); ?>

<div class="container">
  <script>
    function scrollToTop() {
        window.scrollTo(0, 0);
    }
    window.addEventListener('load', scrollToTop);
</script>
    
        <div class="row">
          <div>
            
          </div>
          <div class="col-9">
            

              <video controls class="col-12" autoplay>
                <source src="/storage/<?php echo e($video->video); ?>" type="video/mp4">
              </video>
              
              <?php
                  $nextIndex = $index + 1;
                  $hasNextIndex = $nextIndex < count($array);
                  $nextElementId = $hasNextIndex ? $array[$nextIndex] : null;

                  $previousIndex = $index - 1;
                  $hasPreviousIndex = $previousIndex >= 0;
                  $previousElementId = $hasPreviousIndex ? $array[$previousIndex] : null;
              ?>

            <div class="d-flex col-sm-6 col-12 justify-content-between">
             

              <?php if($hasPreviousIndex): ?>
                <form action="/my-video/<?php echo e($previousElementId); ?>" method="GET">
                  
                <button class="btn btn-primary" type="submit">Previous</button>
                </form>
                  <?php else: ?>
                    <button class="btn btn-primary" disabled>Previous</button>
                  <?php endif; ?>
              
              
              <?php if($hasNextIndex): ?>
                <form action="/my-video/<?php echo e($nextElementId); ?>" method="GET">
                  
                <button class="btn btn-primary" type="submit">Next</button>
                </form>
                  <?php else: ?>
                    <button class="btn btn-primary" disabled>Next</button>
                  <?php endif; ?>


            </div>

                <div class="row align-items-center">
                    <form action="/my-video/edit/<?php echo e($video->id); ?>" class="col-6 mt-3" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="row">
                            <h4>Edit title</h4>
                        </div>
                        <div class="mb-5">
                            <label for="title" class="col-md-4 col-form-label">Title</label>
                            <input type="text"
                             class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  
                             name="title" id="title" 
                             value="<?php echo e(old('title') ?? $video->title); ?>"
                             autocomplete="title" autofocus>
                             <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
                            <button class="btn btn-secondary mt-2">Save changes</button>
                        </div>
                       
                        
                    </form>

                    <form action="/my-video/delete/<?php echo e($video->id); ?>" class="col-6 mt-3" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        
                        <div class="">
                            
        
                            <button class="btn btn-danger">Delete</button>
                        </div>
                       
                        
                    </form>
                </div>
                
              <h4 class="mt-3 text-left font-weight-bolder"><?php echo e($video->title); ?></h4>
              <h6 class="mt-2">Uploaded on: <?php echo e($video->created_at); ?></h6>
              <h6 class="mt-2">Updated on: <?php echo e($video->updated_at); ?></h6>
              <h6><?php echo e($difference); ?></h6>
              <h6>By <?php echo e($video->user->name); ?></h6>
            
            

              <h5 class="mt-4 text-left font-weight-bolder">Comment</h5>

              <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="mb-4">
                <h6 class="font-weight-bolder"><?php echo e($comment->user->name); ?></h6>
                <p><?php echo e($comment->comment); ?></p>
                <p class=""><?php echo e($comment->created_at -> diffForHumans($today)); ?></p>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
        </div>

        <div class="col-3">

          <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12 mb-3 text-align-center">
            <a href="/my-video/<?php echo e($video->id); ?>">
              <img src="/<?php echo e($video->thumb); ?>" class="w-100 h-100"  alt="">
              
            </a>
            <h6 style="text-align: center" class="mt-2"><?php echo e($video->title); ?></h6>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

          
        </div>
        </div>

        
    

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/michel/Documents/PHP/Laravel/StreamingPlatform/streaming/resources/views/video/singlevideo.blade.php ENDPATH**/ ?>