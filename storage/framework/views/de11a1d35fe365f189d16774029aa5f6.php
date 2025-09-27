<tr>
    <td class="text-start"><b><?php echo e($index.''); ?></b></td>
    <td><?php echo e($state->name); ?></td>
    <td class="text-end"><?php echo e($state->districts_all_count); ?></td>
    <td class="ps-4">
        <div class="ms-2 form-check form-switch">
            <input class="form-check-input" wire:model="$isActive" wire:click="changeStatus()" type="checkbox" role="switch" id="<?php echo e('state_status_'.$state->id); ?>" <?php echo e($state->status == 'Active' ? 'checked' : ''); ?>>
            <label class="form-check-label" for="<?php echo e('state_status_'.$state->id); ?>"><?php echo e($state->status); ?></label>
        </div>
    </td>
</tr><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/admin/setting/state-row.blade.php ENDPATH**/ ?>