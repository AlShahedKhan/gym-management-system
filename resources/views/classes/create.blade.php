@extends('backend.master')

@section('title')
{{ @$data['title'] ?? 'Create Class' }}
@endsection

@section('content')
@ if (hasPermission('class_create'))
<div class="page-content">
    <div class="card ot-card">
        <div class="card-header">
            <h4>{{ ___('common.create') }} Class</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('classes.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <!-- Trainer Selection -->
                        <label for="trainer_id" class="form-label">{{ ___('common.trainer') }} <span class="fillable">*</span></label>
                        <select class="form-select ot-input @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" required>
                            <option value="">{{ ___('common.select_trainer') }}</option>
                            @foreach ($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->user->name }}</option>
                            @endforeach
                        </select>
                        @error('trainer_id')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- Class Time -->
                        <label for="class_time" class="form-label">{{ ___('common.class_time') }} <span class="fillable">*</span></label>
                        <input type="datetime-local" name="class_time" class="form-control ot-input @error('class_time') is-invalid @enderror" required>
                        @error('class_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Capacity -->
                        <label for="capacity" class="form-label">{{ ___('common.capacity') }} <span class="fillable">*</span></label>
                        <input type="number" name="capacity" class="form-control ot-input @error('capacity') is-invalid @enderror" min="1" required>
                        @error('capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if (hasPermission('class_create'))
                <div class="col-md-12 mt-24 text-end">
                    <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i></span> {{ ___('common.submit') }}</button>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endif
@endsection