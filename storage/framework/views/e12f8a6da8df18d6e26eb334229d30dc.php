<?php $__env->startSection('content'); ?>

<div class="container overflow-hidden">
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
              <div class="d-flex col-3 justify-content-between align-items-center mb-3">
                <form action="/like/<?php echo e($video->id); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <button type="submit" class="btn btn-outline-success justify-content-between" id="like">
                    
                    
                    <?php if($existingLike): ?>
                      <i class="fas fa-regular fa-thumbs-up"></i>
                    
                    
                      <i class="fas fa-thin fa-check" style="margin-left: 5px"></i>

                    <?php else: ?>
                      <i class="fas fa-regular fa-thumbs-up"></i>
                    <?php endif; ?>
                    
                    
                  </button>
                </form>
                <?php echo e($like); ?>

                
                <form action="/dislike/<?php echo e($video->id); ?>" method="POST" >
                  <?php echo csrf_field(); ?>
                  <button type="submit" class="btn btn-outline-danger" id="dislike">
                    
                    <?php if($existingDisLike): ?>
                    <i class="fas fa-light fa-thumbs-down"></i>
                    
                    <i class="fas fa-thin fa-check" style="margin-left: 5px"></i>

                    <?php else: ?>
                      <i class="fas fa-light fa-thumbs-down"></i>
                    <?php endif; ?>

                    
                  </button>
                </form>
                <?php echo e($dislike); ?>

                

                
              </div>

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
                <form action="/video/<?php echo e($previousElementId); ?>" method="GET">
                  
                <button class="btn btn-primary" type="submit">Previous</button>
                </form>
                  <?php else: ?>
                    <button class="btn btn-primary" disabled>Previous</button>
                  <?php endif; ?>
              
              
              <?php if($hasNextIndex): ?>
                <form action="/video/<?php echo e($nextElementId); ?>" method="GET">
                  
                <button class="btn btn-primary" type="submit">Next</button>
                </form>
                  <?php else: ?>
                    <button class="btn btn-primary" disabled>Next</button>
                  <?php endif; ?>


            </div>
    
              <h4 class="mt-3 text-left font-weight-bolder"><?php echo e($video->title); ?></h4>
              <h6 class="mt-2">Uploaded on: <?php echo e($video->created_at); ?></h6>
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
              

              

              <div class="col-9">
                <form action="/video/<?php echo e($video->id); ?>/comment" enctype="multipart/form-data" method="post" class="form-group">
                  <?php echo csrf_field(); ?>
                
                  <textarea name="comment" id="comment" class="form-control" rows="5" style="resize: none"
                  type="text" class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" title="comment" autocomplete="comment" autofocus required
                  ></textarea>
                  <?php $__errorArgs = ['comment'];
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
                  <button type="submit" class="btn btn-secondary align-bottom mt-3 mb-3">Add Comment</button>
                
              </form>
              </div>
              
        </div>

        <div class="col-3 overflow-hidden">

          <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12 mb-3 text-align-center">
            <a href="/video/<?php echo e($video->id); ?>">
              <img src="/<?php echo e($video->thumb); ?>" class="w-100 h-100"  alt="">
              
            </a>
            <h6 style="text-align: center" class="mt-2"><?php echo e($video->title); ?></h6>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          

         

          

          

          
        </div>
        </div>

        
    

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/michel/Documents/PHP/Laravel/StreamingPlatform/streaming/resources/views/video/show.blade.php ENDPATH**/ ?>