@extends('backend.master')

@section('title')
    {{ @$data['title'] ?? 'Edit Booking' }}
@endsection

@section('content')
@if (hasPermission('booking_update'))
    <div class="page-content">

        {{-- Breadcrumb Area Start --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] ?? 'Edit Booking' }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">Bookings</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- Breadcrumb Area End --}}

        <div class="card ot-card">
            <div class="card-header">
                <h4>{{ ___('common.edit') }} Booking</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <!-- Trainee Selection -->
                            <label for="trainee_id" class="form-label">{{ ___('common.trainee') }} <span class="fillable">*</span></label>
                            <select class="form-select ot-input @error('trainee_id') is-invalid @enderror" name="trainee_id" id="trainee_id" required>
                                <option value="">{{ ___('common.select_trainee') }}</option>
                                @foreach ($trainees as $trainee)
                                    <option value="{{ $trainee->id }}" {{ $trainee->id == $booking->trainee_id ? 'selected' : '' }}>
                                        {{ $trainee->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('trainee_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <!-- Class Selection -->
                            <label for="class_id" class="form-label">{{ ___('common.class') }} <span class="fillable">*</span></label>
                            <select class="form-select ot-input @error('class_id') is-invalid @enderror" name="class_id" id="class_id" required>
                                <option value="">{{ ___('common.select_class') }}</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ $class->id == $booking->class_id ? 'selected' : '' }}>
                                        {{ $class->class_time }} ({{ $class->trainer->user->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <!-- Booking Time -->
                            <label for="booking_time" class="form-label">{{ ___('common.booking_time') }} <span class="fillable">*</span></label>
                            <input type="datetime-local" name="booking_time" class="form-control ot-input @error('booking_time') is-invalid @enderror"
                                   value="{{ \Carbon\Carbon::parse($booking->booking_time)->format('Y-m-d\TH:i') }}" required>
                            @error('booking_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @if (hasPermission('booking_update'))
                    <div class="col-md-12 mt-24 text-end">
                        <button class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-save"></i></span> {{ ___('common.update') }}
                        </button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endif
@endsection
