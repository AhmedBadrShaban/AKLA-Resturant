<?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<ul>
    <li>
        <?php echo e($contacts->email); ?>

     </li>
    <li>
        <?php echo e($contacts->address); ?>

    </li>
    <li>
        <?php echo e($contacts->phone_number); ?>

    </li>
    <li>
        <?php echo e($contacts->facebook_url); ?>

    </li>
</ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\ahmed\Downloads\restaurant-Ahmed-branch\resources\views/admin/edit_contacts_info.blade.php ENDPATH**/ ?>