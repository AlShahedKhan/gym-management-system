@extends('backend.master')

@section('title')
    {{ @$data['title'] ?? 'Create Trainer' }}
@endsection

@section('content')
@if (hasPermission('trainer_create'))
    <div class="page-content">
        <div class="card ot-card border-0 ph-14 pv-14 mb-24">
            <div class="card-body pt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ot-breadcrumb-secondary mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('common.home') }}</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('trainers.index') }}">{{ ___('common.trainers') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ___('common.add_new') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('trainers.store') }}" method="POST" enctype="multipart/form-data" id="trainerForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="row">

                                <!-- User ID Dropdown -->
                                <div class="col-md-12 mb-3">
                                    <label for="user_id" class="form-label">{{ ___('common.user') }} <span class="fillable">*</span></label>
                                    <select class="form-select ot-input @error('user_id') is-invalid @enderror" name="user_id" id="user_id" required>
                                        <option value="">{{ ___('common.select_user') }}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                           id="expertise" placeholder="{{ ___('common.enter_expertise') }}" required>
                                    @error('expertise')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Availability Input -->
                                <div class="col-md-12 mb-3">
                                    <label for="availability" class="form-label">{{ ___('common.availability') }}</label>
                                    <textarea name="availability" id="availability" class="form-control ot-input @error('availability') is-invalid @enderror" 
                                              placeholder="{{ ___('common.enter_availability') }}"></textarea>
                                    @error('availability')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-24 text-end">
                        <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i></span> {{ ___('common.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
@endsection
