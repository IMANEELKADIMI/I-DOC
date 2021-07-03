<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.All Patients')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
<!-- DataTales  -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2"><?php echo e(__('sentence.All Appointments')); ?></h6>
         </div>
         <div class="col-4">
            <a href="<?php echo e(route('admin.appointment.creat')); ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> <?php echo e(__('sentence.New Appointment')); ?></a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th class="text-center">ID</th>
                  <th><?php echo e(__('sentence.Patient Name')); ?></th>
                  <th><?php echo e(__('sentence.Date')); ?></th>
                  <th><?php echo e(__('sentence.Time Slot')); ?></th>
                  <th class="text-center"><?php echo e(__('sentence.Status')); ?></th>
                  <th class="text-center"><?php echo e(__('sentence.Created at')); ?></th>
                  <th class="text-center"><?php echo e(__('sentence.Actions')); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td class="text-center"><?php echo e($appointment->id); ?></td>
                  <td><a href="<?php echo e(url('patient/view/'.$appointment->user_id)); ?>"> <?php echo e($appointment->User->name); ?> </a></td>
                  <td> <?php echo e($appointment->date->format('Y-M-d')); ?> </td>
                  <td> <?php echo e($appointment->time_start); ?> - <?php echo e($appointment->time_end); ?></td>
                  <td class="text-center">
                     <?php if($appointment->visited == 0): ?>
                     <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                     <span class="icon text-white-50">
                     <i class="fas fa-hourglass-start"></i>
                     </span>
                     <span class="text"><?php echo e(__('sentence.Not Yet Visited')); ?></span>
                     </a>
                     <?php elseif($appointment->visited == 1): ?>
                     <a href="#" class="btn btn-success btn-icon-split btn-sm">
                     <span class="icon text-white-50">
                     <i class="fas fa-check"></i>
                     </span>
                     <span class="text"><?php echo e(__('sentence.Visited')); ?></span>
                     </a>
                     <?php else: ?>
                     <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                     <span class="icon text-white-50">
                     <i class="fas fa-user-times"></i>
                     </span>
                     <span class="text"><?php echo e(__('sentence.Cancelled')); ?></span>
                     </a>
                     <?php endif; ?>
                  </td>
                  <td class="text-center"><?php echo e($appointment->created_at->format('Y-M-d H:i')); ?></td>
                  <td align="center">
                     <a data-rdv_id="<?php echo e($appointment->id); ?>" data-rdv_date="<?php echo e($appointment->date->format('Y-M-d')); ?>" data-rdv_time_start="<?php echo e($appointment->time_start); ?>" data-rdv_time_end="<?php echo e($appointment->time_end); ?>" data-patient_name="<?php echo e($appointment->User->name); ?>" class="btn btn-success btn-circle btn-sm text-white" data-toggle="modal" data-target="#EDITRDVModal"><i class="fas fa-check"></i></a>
                     <a href="<?php echo e(url('admin_dashboard/appointment/delet/'.$appointment->id)); ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!--EDIT Appointment Modal-->
<div class="modal fade" id="EDITRDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('sentence.You are about to modify an appointment')); ?></h5>
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
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo e(__('sentence.Close')); ?></button>
            <a class="btn btn-primary text-white" onclick="event.preventDefault(); document.getElementById('rdv-form-confirm').submit();"><?php echo e(__('sentence.Confirm Appointment')); ?></a>
            <form id="rdv-form-confirm" action="<?php echo e(route('appointment.store_edit')); ?>" method="POST" class="d-none">
               <input type="hidden" name="rdv_id" id="rdv_id">
               <input type="hidden" name="rdv_status" value="1">
               <?php echo csrf_field(); ?>
            </form>
            <a class="btn btn-primary text-white" onclick="event.preventDefault(); document.getElementById('rdv-form-cancel').submit();"><?php echo e(__('sentence.Cancel Appointment')); ?></a>
            <form id="rdv-form-cancel" action="<?php echo e(route('appointment.store_edit')); ?>" method="POST" class="d-none">
               <input type="hidden" name="rdv_id" id="rdv_id2">
               <input type="hidden" name="rdv_status" value="2">
               <?php echo csrf_field(); ?>
            </form>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ELKADIMISAIDMarrakec\Downloads\CABINET-master (1)\CABINET-master\resources\views/appointment/al.blade.php ENDPATH**/ ?>