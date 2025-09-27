<tr>
    <td class="text-start"><b><?php echo e($index.''); ?></b></td>
    <td><?php echo e($district->name); ?></td>
    <td><?php echo e($district->state_name); ?></td>
    <td class="ps-4">
        <div class="ms-2 form-check form-switch">
            <input class="form-check-input" wire:model="$isActive" wire:click="changeStatus()" type="checkbox" role="switch" id="<?php echo e('district_status_'.$district->id); ?>" <?php echo e($isActive ? 'checked' : ''); ?>>
            <label class="form-check-label" for="<?php echo e('district_status_'.$district->id); ?>"><?php echo e($isActive ? 'Active' : 'In-Active'); ?></label>
        </div>
    </td>
</tr><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/admin/setting/district-row.blade.php ENDPATH**/ ?>