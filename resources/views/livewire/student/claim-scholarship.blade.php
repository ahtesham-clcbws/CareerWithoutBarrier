<div>
    <style>
        .line-with-button {
            position: relative;
        }

        .round-button {
            position: absolute;
            right: 0;
            margin-top: -16px;
            margin-right: 26px;
            transform: translateY(-50%);
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            text-align: center;
            cursor: pointer;
        }

        .round-button:focus {
            outline: none;
        }

        .pagebody {
            background: white;
        }
    </style>
    <div class="pagecontentbody container">
        <div class="tab-content">
            <div class="row pt-3">
                <div class="col">
                    <h5>
                        Claim Form
                    </h5>
                </div>
            </div>
            <div class="pagebody row pt-2">
                <div class="col-md-11 container" style="border: 1px solid #c6cbd0;padding: 8px 25px;">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6 col">
                                <h5>
                                    Choice One
                                </h5>
                                @include('livewire.student.partials.choice-fields', ['index' => 1])
                            </div>

                            <div class="col-md-6 col">
                                <h5>
                                    Choice Two
                                </h5>
                                @include('livewire.student.partials.choice-fields', ['index' => 2])
                            </div>
                        </div>
                        <hr class="line-with-button">
                        <span class="round-button add-center-c"
                            wire:click="toggleMore">{{ $showMore ? '-' : '+' }}</span>

                        @if ($showMore)
                            <div class="row center-c-cl">
                                <div class="col-md-6 col">
                                    <h5>
                                        Choice Third
                                    </h5>
                                    @include('livewire.student.partials.choice-fields', ['index' => 3])
                                </div>

                                <div class="col-md-6 col">
                                    <h5>
                                        Choice Fourth
                                    </h5>
                                    @include('livewire.student.partials.choice-fields', ['index' => 4])
                                </div>
                            </div>
                        @endif

                        <div class="row justify-content-center mb-4 mt-3">
                            <div class="col-md-3 d-grid">
                                <button class="btn btn-theme btn-primary submitform" type="submit">
                                    <span wire:loading.remove>Submit</span>
                                    <span wire:loading>Processing...</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
