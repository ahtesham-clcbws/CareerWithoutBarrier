@extends('administrator.layouts.master')
@section('content')
<div class="row py-2 pl-3 pr-3">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Home Counters</h3>
                    <span class="text-muted small">Update numbers and titles for the 4 homepage counter widgets</span>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @php
            $slotConfigs = [
                'scholarship_counter' => [
                    'label' => 'Card 1: Scholarship Counter',
                    'icon' => asset('website/assets/images/icons/student-icon.png'),
                    'default_top' => '100% Scholarship for',
                    'default_value' => 1500,
                    'default_bottom' => 'Applicants',
                    'default_plus' => true,
                ],
                'institutes_counter' => [
                    'label' => 'Card 2: Institutes Counter',
                    'icon' => asset('website/assets/images/icons/certificate-icon.png'),
                    'default_top' => 'Offered Institutes',
                    'default_value' => 250,
                    'default_bottom' => 'Institutes (Approx)',
                    'default_plus' => true,
                ],
                'form_fee_counter' => [
                    'label' => 'Card 3: Form Fee Counter',
                    'icon' => asset('website/assets/images/icons/class-icon.png'),
                    'default_top' => 'Zero Form Fee For',
                    'default_value' => 20000,
                    'default_bottom' => 'Applicants',
                    'default_plus' => false,
                ],
                'free_education_counter' => [
                    'label' => 'Card 4: Free Education Counter',
                    'icon' => asset('website/assets/images/icons/forign-icon.png'),
                    'default_top' => 'Free online education for',
                    'default_value' => 100000,
                    'default_bottom' => 'Students',
                    'default_plus' => true,
                ],
            ];
            $countersKeyed = $counters->keyBy('slot_key');
        @endphp

        <form action="{{ route('admin.home.counters.update') }}" method="POST">
            @csrf

            <div class="row">
                @foreach ($slotConfigs as $slotKey => $config)
                    @php
                        $item = $countersKeyed->get($slotKey);
                        $topTitle = old("counters.{$slotKey}.top_title", $item ? $item->top_title : $config['default_top']);
                        $counterVal = old("counters.{$slotKey}.counter_value", $item ? $item->counter_value : $config['default_value']);
                        $bottomTitle = old("counters.{$slotKey}.bottom_title", $item ? $item->bottom_title : $config['default_bottom']);
                        $hasPlus = old("counters.{$slotKey}.has_plus_icon", $item ? $item->has_plus_icon : $config['default_plus']);
                        $calcStart = max(0, ((int) $counterVal) - 10);
                    @endphp

                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card h-100 shadow-sm border">
                            <div class="card-header bg-light d-flex align-items-center justify-content-between py-2">
                                <strong class="text-dark">{{ $config['label'] }}</strong>
                                <div class="badge bg-secondary">Fixed Icon</div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto text-center">
                                        <div style="width: 60px; height: 60px; background: #fff3e6; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                            <img src="{{ $config['icon'] }}" alt="icon" style="max-height: 36px; max-width: 36px;">
                                        </div>
                                        <small class="text-muted d-block mt-1">Predefined</small>
                                    </div>
                                    <div class="col">
                                        <div class="p-2 border rounded bg-light small">
                                            <div class="text-muted">Live Preview Rule:</div>
                                            <div><strong>Start Count:</strong> <span class="badge bg-info text-dark" id="calc-start-{{ $slotKey }}">{{ $calcStart }}</span> (Ends - 10)</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label text-muted f-s-12 mb-1">Prefix Title / Top Subtitle</label>
                                    <input type="text"
                                           class="form-control"
                                           name="counters[{{ $slotKey }}][top_title]"
                                           value="{{ $topTitle }}"
                                           placeholder="e.g. {{ $config['default_top'] }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-7 mb-3">
                                        <label class="form-label text-muted f-s-12 mb-1">Counter Value (End Number)*</label>
                                        <input type="number"
                                               required
                                               min="0"
                                               class="form-control counter-end-input"
                                               data-target="calc-start-{{ $slotKey }}"
                                               name="counters[{{ $slotKey }}][counter_value]"
                                               value="{{ $counterVal }}">
                                        <small class="text-muted">The counter will start animating from (End - 10).</small>
                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label class="form-label text-muted f-s-12 mb-1">Plus Sign (+)</label>
                                        <div class="mt-2">
                                            <input type="hidden" name="counters[{{ $slotKey }}][has_plus_icon]" value="0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                       type="checkbox"
                                                       role="switch"
                                                       id="plusSwitch-{{ $slotKey }}"
                                                       name="counters[{{ $slotKey }}][has_plus_icon]"
                                                       value="1"
                                                       {{ $hasPlus ? 'checked' : '' }}>
                                                <label class="form-check-label" for="plusSwitch-{{ $slotKey }}">
                                                    Show '+' suffix
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label text-muted f-s-12 mb-1">Suffix Title / Bottom Subtitle</label>
                                    <input type="text"
                                           class="form-control"
                                           name="counters[{{ $slotKey }}][bottom_title]"
                                           value="{{ $bottomTitle }}"
                                           placeholder="e.g. {{ $config['default_bottom'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-2 mb-4">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-warning px-4 py-2 text-dark font-weight-bold">
                        <i class="fa fa-save me-1"></i> Save Home Counters
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.counter-end-input');
        inputs.forEach(function (input) {
            input.addEventListener('input', function () {
                const targetId = this.getAttribute('data-target');
                const targetEl = document.getElementById(targetId);
                if (targetEl) {
                    const val = parseInt(this.value, 10);
                    if (!isNaN(val)) {
                        targetEl.textContent = Math.max(0, val - 10);
                    } else {
                        targetEl.textContent = 0;
                    }
                }
            });
        });
    });
</script>
@endsection
