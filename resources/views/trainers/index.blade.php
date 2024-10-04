@extends('backend.master')

@section('title')
{{ @$data['title'] ?? 'Trainers' }}
@endsection

@section('content')
<div class="page-content">

    {{-- Breadcrumb Area Start --}}
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1">{{ $data['title'] ?? 'Trainers' }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ $data['title'] ?? 'Trainers' }}</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                    <ul>
                        <li><a href="javascript:void(0)"><i class="feather icon-bookmark"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="feather icon-message-square"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="feather icon-command"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="feather icon-layers"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="feather icon-star"></i></a></li>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
    {{-- Breadcrumb Area End --}}

    <!-- Table content start -->
    <div class="table-content table-basic mt-20">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Trainers</h4>
                @if (hasPermission('trainer_create'))
                <a href="{{ route('trainers.create') }}" class="btn btn-lg ot-btn-primary">
                    <span><i class="fa-solid fa-plus"></i> </span>
                    <span>Add Trainer</span>
                </a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead">
                            <tr>
                                <th class="serial">#</th>
                                <th>Name</th>
                                <th>Expertise</th>
                                <th>Availability</th>
                                @if (hasPermission('trainer_update') || hasPermission('trainer_delete'))
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @forelse ($trainers as $key => $trainer)
                            <tr id="row_{{ $trainer->id }}">
                                <td class="serial">{{ $key + 1 }}</td>
                                <td>{{ $trainer->user->name }}</td>
                                <td>{{ $trainer->expertise }}</td>
                                <td>{{ $trainer->availability }}</td>
                                @if (hasPermission('trainer_update') || hasPermission('trainer_delete'))
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @if (hasPermission('trainer_update'))
                                            <li>
                                                <a class="dropdown-item" href="{{ route('trainers.edit', $trainer->id) }}">
                                                    <span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                                    <span>Edit</span>
                                                </a>
                                            </li>
                                            @endif
                                            @if (hasPermission('trainer_delete'))
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="delete_row('{{ route('trainers.delete', $trainer->id) }}', {{ $trainer->id }})">
                                                    <span class="icon mr-12"><i class="fa-solid fa-trash-can"></i></span>
                                                    <span>Delete</span>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center gray-color">
                                    <img src="{{ asset('images/no_data.svg') }}" alt="No Data" width="100">
                                    <p class="mb-0">No trainers found.</p>
                                    <p class="text-secondary">Please add a new trainer.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {!! $trainers->links() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Table content end -->

</div>
@endsection

@push('script')
@include('backend.partials.delete-ajax') {{-- This is the delete logic partial --}}
@endpush