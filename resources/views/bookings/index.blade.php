@extends('backend.master')

@section('title')
    {{ @$data['title'] ?? 'Bookings' }}
@endsection

@section('content')
    <div class="page-content">

        {{-- Breadcrumb Area Start --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] ?? 'Bookings' }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">{{ $data['title'] ?? 'Bookings' }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- Breadcrumb Area End --}}

        <!-- Table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $data['title'] ?? 'Bookings' }}</h4>
                    @if (hasPermission('booking_create'))
                    <a href="{{ route('bookings.create') }}" class="btn btn-lg ot-btn-primary">
                        <span><i class="fa-solid fa-plus"></i> </span>
                        <span class="">Add Booking</span>
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Trainee Name</th>
                                    <th>Class Time</th>
                                    <th>Booking Time</th>
                                    @if (hasPermission('booking_update') || hasPermission('booking_delete'))
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($bookings as $key => $booking)
                                    <tr id="row_{{ $booking->id }}">
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $booking->trainee->name }}</td>
                                        <td>{{ $booking->class->class_time }}</td>
                                        <td>{{ $booking->booking_time }}</td>
                                        @if (hasPermission('booking_update') || hasPermission('booking_delete'))
                                        <td>
                                            <div class="dropdown dropdown-action">
                                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (hasPermission('booking_update'))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('bookings.edit', $booking->id) }}">
                                                            <span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @if (hasPermission('booking_delete'))
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0);" 
                                                           onclick="delete_row('{{ route('bookings.delete', $booking->id) }}', {{ $booking->id }})">
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
                                            <p class="mb-0">No bookings found.</p>
                                            <p class="text-secondary">Please add a new booking.</p>
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
                                {!! $bookings->links() !!}
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
