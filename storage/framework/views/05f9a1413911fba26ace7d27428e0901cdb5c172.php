<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="zXbiSv6MysbCo84DXZ4JSrdGP6dkFJbqvwo0wgSS">
      <title>I-DOC - <?php echo e(__('sentence.View Prescription')); ?> 
      </title>
      <!-- Custom styles for this template-->
      <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

   </head>
   <body id="page-top">
      <div id="app">
         <!-- Page Wrapper -->
         <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
               <!-- Main Content -->
               <div id="content">
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
                     <div class="row justify-content-center">
                        <div class="col">
                           <div class="card shadow mb-4">
                              <div class="card-body">
                                 <!-- ROW : Doctor informations -->
                                 <div class="row">
                                    <div class="col-md-9">
                                       <?php echo clean(App\Setting::get_option('header_left')); ?>

                                    </div>
                                    <div class="col-md-3">
                                       <p class="float-right">Maroc, <?php echo e(__('sentence.On')); ?> <?php echo e($prescription->created_at->format('d-m-Y')); ?></p>
                                    </div>
                                 </div>
                                 <!-- END ROW : Doctor informations -->
                                 <!-- ROW : Patient informations -->
                                 <div class="row">
                                    <div class="col">
                                       <hr>
                                       <p>
                                          <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($prescription->User->name); ?>

                                          <?php if(isset($prescription->User->Patient->birthday)): ?>
                                          - <b><?php echo e(__('sentence.Age')); ?> :</b> <?php echo e($prescription->User->Patient->birthday); ?> (<?php echo e(\Carbon\Carbon::parse($prescription->User->Patient->birthday)->age); ?> <?php echo e(__('sentence.Years')); ?>)
                                          <?php endif; ?>
                                          <?php if(isset($prescription->User->Patient->gender)): ?>
                                          - <b><?php echo e(__('sentence.Gender')); ?> :</b> <?php echo e(__('sentence.'.$prescription->User->Patient->gender)); ?>

                                          <?php endif; ?>
                                          <?php if(isset($prescription->User->Patient->weight)): ?>
                                          - <b><?php echo e(__('sentence.Patient Weight')); ?> :</b> <?php echo e($prescription->User->Patient->weight); ?> Kg
                                          <?php endif; ?>
                                          <?php if(isset($prescription->User->Patient->height)): ?>
                                          - <b><?php echo e(__('sentence.Patient Height')); ?> :</b> <?php echo e($prescription->User->Patient->height); ?>

                                          <?php endif; ?>
                                       </p>
                                       <hr>
                                       <h5 class="text-center"><b><?php echo e(__('sentence.Prescription')); ?></b></h5>
                                       <hr>
                                    </div>
                                 </div>
                                 <!-- END ROW : Patient informations -->
                                 <!-- ROW : Drugs List -->
                                 <div class="row justify-content-center">
                                    <div class="col">
                                       <?php $__empty_1 = true; $__currentLoopData = $prescription_drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                       <li><?php echo e($drug->type); ?> - <?php echo e($drug->Drug->trade_name); ?> <?php echo e($drug->strength); ?> - <?php echo e($drug->dose); ?> - <?php echo e($drug->duration); ?> <br> <?php echo e($drug->drug_advice); ?></li>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                       <p><?php echo e(__('sentence.No Drugs')); ?></p>
                                       <?php endif; ?>
                                    </div>
                                 </div>
                                 <!-- END ROW : Drugs List -->
                                 <!-- ROW : Footer informations -->
                                 <footer>
                                    <hr>
                                    <div class="row">
                                       <div class="col-6">
                                          <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                                       </div>
                                       <div class="col-6">
                                          <p class="float-right font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                                       </div>
                                    </div>
                                    <!-- END ROW : Footer informations -->
                                 </footer>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Page Heading -->
                  </div>
                  <!-- /.container-fluid -->
               </div>
               <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
         </div>
         <!-- End of Page Wrapper -->
      </div>
   </body>
</html><?php /**PATH C:\Users\ELKADIMISAIDMarrakec\Downloads\IDOC\resources\views/prescription/pdf_view.blade.php ENDPATH**/ ?>