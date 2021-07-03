

<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.New Appointment')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col">
      <?php if($errors->any()): ?>
      <div class="alert alert-danger">
         <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
      </div>
      <?php endif; ?>
      <?php if(session('success')): ?>
      <div class="alert alert-success">
         <?php echo e(session('success')); ?>

      </div>
      <?php endif; ?>
   </div>
</div>
<form id="rdv-form" action="<?php echo e(route('admin.appointment.stor')); ?>" method="POST" >
<div class="row justify-content-center">
   <div class="col-md-10">
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.New Appointment')); ?></h6>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo e(__('sentence.Patient')); ?> :</label>
                  <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1" name="patient_id" aria-hidden="true">
                     <option><?php echo e(__('sentence.Select Patient')); ?></option>
                     <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Date')); ?></label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="date" name="date" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('Start')); ?></label>
                      <div class="col-sm-9">
                        <input type="time" class="form-control" id="time_start" name="time_start" min="09:00" max="18:00" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('End')); ?></label>
                      <div class="col-sm-9">
                        <input type="time" class="form-control" id="time_end" name="time_end" min="09:00" max="18:00" autocomplete="off">
                      </div>
                    </div>
                  <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('sentence.Save')); ?></button>
                      </div>
         </div>
               </div>
               
         </div>
      </div>
   </div>
</div>
<!-- Appointment Modal-->
<div class="modal fade" id="RDVModalSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('sentence.Are you sure of the date')); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <p><b><?php echo e(__('sentence.Patient')); ?> :</b> <span id="patient_name"></span></p>
            <p><b><?php echo e(__('sentence.Date')); ?> :</b> <span id="rdv_date"></span></p>
            <p><b><?php echo e(__('sentence.Time Slot')); ?> :</b> <span id="rdv_time"></span></p>
         </div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo e(__('sentence.Cancel')); ?></button>
            <a class="btn btn-primary text-white"
               onclick="event.preventDefault();
               document.getElementById('rdv-form').submit();"><?php echo e(__('sentence.Save')); ?></a>
            <form id="rdv-form" action="<?php echo e(route('admin.appointment.stor')); ?>" method="POST" class="d-none">
               <input type="hidden" name="patient" id="patient_input">
               <input type="hidden" name="rdv_time_date" id="rdv_date_input">
               <input type="hidden" name="rdv_time_start" id="rdv_time_start_input">
               <input type="hidden" name="rdv_time_end" id="rdv_time_end_input">
               <?php echo csrf_field(); ?>
            </form>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ELKADIMISAIDMarrakec\Downloads\IDOC\resources\views/appointment/creat.blade.php ENDPATH**/ ?>