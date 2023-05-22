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
          <div class="col-9" style="background-color: aquamarine">
            <div class="h-25">
              <div class="embed-responsive embed-responsive-16by9 col-12 h-100" style="background-color: blue">
                
                <iframe class="embed-responsive-item w-100 h-100" src="/storage/<?php echo e($video->video); ?>" allowfullscreen></iframe>
              </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <button class="btn btn-primary">Previous</button>
              <button class="btn btn-primary">Next</button>
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
                <p class="">Added on: <?php echo e($comment->created_at); ?></p>
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
                  <button type="submit" class="btn btn-secondary align-bottom mt-3 mb-3">Add Comment</button>
                
              </form>
              </div>
              
        </div>

        <div class="col-3">

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