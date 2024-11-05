<tr>
    <td class="text-start"><b>{{ $index.'' }}</b></td>
    <td>{{ $district->name }}</td>
    <td>{{ $district->state_name }}</td>
    <td class="{{ $studentCount == $formsCount ? 'text-danger' : 'text-black' }}">
        @if ($editFormsCount)
        <form class="input-group input-group-sm" style="min-width:150px;" wire:submit="save">
            <input type="text" class="form-control" wire:model="totalFormsCount">
            <button class="btn btn-success" type="submit"><i class="bi bi-save"></i></button>
            <button class="btn btn-danger" type="button" wire:click="closeEditForm()"><i class="bi bi-x-lg"></i></button>
        </form>
        @else
        {{ $studentCount }}/{{ $formsCount }} <i class="bi bi-pencil-square btn-link" wire:click="showEditForm()"></i>
        @endif
    </td>
    <td class="ps-4">
        <div class="ms-2 form-check form-switch">
            <input class="form-check-input" wire:model="$isActive" wire:click="changeStatus()" type="checkbox" role="switch" id="{{ 'district_status_'.$district->id }}" {{ $isActive ? 'checked' : '' }}>
            <label class="form-check-label" for="{{ 'district_status_'.$district->id }}">{{ $isActive ? 'Active' : 'In-Active' }}</label>
        </div>
    </td>
</tr>