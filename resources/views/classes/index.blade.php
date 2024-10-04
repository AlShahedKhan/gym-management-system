@extends('backend.master')

@section('title')
    {{ @$data['title'] ?? 'Classes' }}
@endsection

@section('content')
    <div class="page-content">

        {{-- Breadcrumb Area Start --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] ?? 'Classes' }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">{{ $data['title'] ?? 'Classes' }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- Breadcrumb Area End --}}

        <!-- Table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $data['title'] ?? 'Classes' }}</h4>
                    @if (hasPermission('class_create'))
                    <a href="{{ route('classes.create') }}" class="btn btn-lg ot-btn-primary">
                        <span><i class="fa-solid fa-plus"></i> </span>
                        <span class="">Add Class</span>
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Trainer Name</th>
                                    <th>Class Time</th>
                                    <th>Capacity</th>
                                    @if (hasPermission('class_update') || hasPermission('class_delete'))
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($classes as $key => $class)
                                    <tr id="row_{{ $class->id }}">
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $class->trainer->user->name }}</td>
                                        <td>{{ $class->class_time }}</td>
                                        <td>{{ $class->capacity }}</td>
                                        @if (hasPermission('class_update') || hasPermission('class_delete'))
                                        <td>
                                            <div class="dropdown dropdown-action">
                                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (hasPermission('class_update'))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('classes.edit', $class->id) }}">
                                                            <span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @if (hasPermission('class_delete'))
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0);" 
                                                           onclick="delete_row('{{ route('classes.delete', $class->id) }}', {{ $class->id }})">
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
                                        <td colspan="5" class="text-center gray-color">
                                            <img src="{{ asset('images/no_data.svg') }}" alt="No Data" width="100">
                                            <p class="mb-0">No classes found.</p>
                                            <p class="text-secondary">Please add a new class.</p>
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
                                {!! $classes->links() !!}
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
@include('backend.partials.delete-ajax') {{-- This will handle the delete functionality --}}
@endpush
