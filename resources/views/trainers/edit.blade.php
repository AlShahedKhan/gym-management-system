@extends('backend.master')
@section('title')
{{ @$data['title'] ?? 'Edit Trainer' }}
@endsection

@section('content')
@if (hasPermission('trainer_update'))
<div class="page-content">

    {{-- Breadcrumb Area Start --}}
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1">{{ $data['title'] ?? 'Edit Trainer' }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('trainers.index') }}">{{ $data['title'] ?? 'Trainers' }}</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
    {{-- Breadcrumb Area End --}}

    <div class="card ot-card">
        <div class="card-header">
            <h4>{{ ___('common.edit') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('trainers.update', $trainer->id) }}" method="POST" enctype="multipart/form-data" id="editTrainerForm">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="row">

                            <!-- User ID Dropdown -->
                            <div class="col-md-12 mb-3">
                                <label for="user_id" class="form-label">{{ ___('common.user') }} <span class="fillable">*</span></label>
                                <select class="form-select ot-input @error('user_id') is-invalid @enderror" name="user_id" id="user_id" required>
                                    <option value="">{{ ___('common.select_user') }}</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $trainer->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Expertise Input -->
                            <div class="col-md-12 mb-3">
                                <label for="expertise" class="form-label">{{ ___('common.expertise') }} <span class="fillable">*</span></label>
                                <input type="text" name="expertise" class="form-control ot-input @error('expertise') is-invalid @enderror"
                                    id="expertise" value="{{ $trainer->expertise }}" placeholder="{{ ___('common.enter_expertise') }}" required>
                                @error('expertise')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Availability Textarea -->
                            <div class="col-md-12 mb-3">
                                <label for="availability" class="form-label">{{ ___('common.availability') }}</label>
                                <textarea name="availability" id="availability" class="form-control ot-input @error('availability') is-invalid @enderror"
                                    placeholder="{{ ___('common.enter_availability') }}">{{ $trainer->availability }}</textarea>
                                @error('availability')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                @if (hasPermission('trainer_update'))
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