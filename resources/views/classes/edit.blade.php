@extends('backend.master')

@section('title')
    {{ @$data['title'] ?? 'Edit Class' }}
@endsection

@section('content')
@if (hasPermission('class_update'))
    <div class="page-content">

        {{-- Breadcrumb Area Start --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] ?? 'Edit Class' }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('classes.index') }}">Classes</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- Breadcrumb Area End --}}

        <div class="card ot-card">
            <div class="card-header">
                <h4>{{ ___('common.edit') }} Class</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('classes.update', $class->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <!-- Trainer Selection -->
                            <label for="trainer_id" class="form-label">{{ ___('common.trainer') }} <span class="fillable">*</span></label>
                            <select class="form-select ot-input @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" required>
                                <option value="">{{ ___('common.select_trainer') }}</option>
                                @foreach ($trainers as $trainer)
                                    <option value="{{ $trainer->id }}" {{ $trainer->id == $class->trainer_id ? 'selected' : '' }}>
                                        {{ $trainer->user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('trainer_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <!-- Class Time -->
                            <label for="class_time" class="form-label">{{ ___('common.class_time') }} <span class="fillable">*</span></label>
                            <input type="datetime-local" name="class_time" class="form-control ot-input @error('class_time') is-invalid @enderror"
                                   value="{{ \Carbon\Carbon::parse($class->class_time)->format('Y-m-d\TH:i') }}" required>
                            @error('class_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- Capacity -->
                            <label for="capacity" class="form-label">{{ ___('common.capacity') }} <span class="fillable">*</span></label>
                            <input type="number" name="capacity" class="form-control ot-input @error('capacity') is-invalid @enderror" 
                                   value="{{ $class->capacity }}" min="1" required>
                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @ if (hasPermission('class_update'))
                    <div class="col-md-12 mt-24 text-end">
                        <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i></span> {{ ___('common.update') }}</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endif
@endsection
