@extends('include.master')
@section('page','clients')

@section('content')
<div class="card-body p-lg-17">
    {{-- datatable start --}}
    <div class="table-responsive">

        {{-- Search --}}
            <form action="{{ route('clients.search') }}" method="GET" class="mb-5">
                <div class="d-flex gap-3 align-items-center">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control form-control-solid w-250px" placeholder="Search client" />
                    <button type="submit" class="btn btn-primary"> Search </button>
                </div>
            </form>

        <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
            <thead>
                <tr class="fw-semibold fs-6 text-muted">
                    <th>Reference</th>
                    <th>Raison_sociale</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->reference }}</td>
                    <td>{{ $client->raison_sociale }}</td>

                    <td>
                        @if(empty($client->email))
                            <span class="text-muted">null</span>
                        @else
                            {{ $client->email }}
                        @endif
                    </td>

                    <td>
                        @if(empty($client->tel))
                            <span class="text-muted">null</span>
                        @else
                            {{ $client->tel }}
                        @endif
                    </td>

                    <td>
                        @if(empty($client->adresse))
                            <span class="text-muted">null</span>
                        @else
                            {{ $client->adresse }}
                        @endif
                    </td>

                    <td>
                        @if(empty($client->ville))
                            <span class="text-muted">null</span>
                        @else
                            {{ $client->ville }}
                        @endif
                    </td>

                    <td class="text-center">

                        {{-- Update button --}}
                        <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#kt_modal_2_{{ $client->id }}">
                            Update
                        </button>

                        {{-- Delete --}}
                        <form action="{{ route('clients.destroy', $client->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this client?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- Update Modal --}}
                <div class="modal fade" tabindex="-1" id="kt_modal_2_{{ $client->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Update Client</h3>
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                     data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                </div>
                            </div>

                            <div class="modal-body">

                                <form id="form_update_{{ $client->id }}"
                                      class="form"
                                      action="{{ route('clients.update', $client->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Reference</span>
                                        </label>
                                        <input type="text"
                                           class="form-control form-control-solid"
                                           name="reference"
                                           value="{{ $client->reference }}"
                                           required />
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Raison Sociale</span>
                                        </label>
                                        <input type="text"
                                           class="form-control form-control-solid"
                                           name="raison_sociale"
                                           value="{{ $client->raison_sociale }}"
                                           required />
                                    </div>

                                    <div class="row-cols-md-1">
                                        <div class="col">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Email</span>
                                                </label>
                                                <input type="email"
                                                   class="form-control form-control-solid"
                                                   name="email"
                                                   value="{{ $client->email }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Téléphone</span>
                                                </label>
                                                <input type="text"
                                                   class="form-control form-control-solid"
                                                   name="tel"
                                                   value="{{ $client->tel }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Adresse</span>
                                        </label>
                                        <input type="text"
                                           class="form-control form-control-solid"
                                           name="adresse"
                                           value="{{ $client->adresse }}" />
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Ville</span>
                                        </label>
                                        <input type="text"
                                           class="form-control form-control-solid"
                                           name="ville"
                                           value="{{ $client->ville }}" />
                                    </div>
                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close</button>

                                <button type="button"
                                        class="btn btn-primary"
                                        onclick="document.getElementById('form_update_{{ $client->id }}').submit();">
                                    Save changes
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- End update modal --}}

                @endforeach
            </tbody>
        </table>
    </div>
    {{-- datatable end --}}
</div>
@endsection

@section('actions')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
    Add new client
</button>

{{-- Add modal --}}
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">New Client</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                     data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span><span class="path2"></span>
                    </i>
                </div>
            </div>

            <div class="modal-body">

                <form id="form_add_client"
                      class="form"
                      action="{{ route('clients.store') }}"
                      method="POST">
                    @csrf

                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Reference</span>
                        </label>
                        <input type="text" class="form-control form-control-solid"
                               name="reference" required />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Raison Sociale</span>
                        </label>
                        <input type="text"
                               class="form-control form-control-solid"
                               name="raison_sociale" required />
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">Email</label>
                                <input type="email"
                                       class="form-control form-control-solid"
                                       name="email" />
                            </div>
                        </div>

                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">Téléphone</label>
                                <input type="text"
                                       class="form-control form-control-solid"
                                       name="tel" />
                            </div>
                        </div>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">Adresse</label>
                        <input type="text"
                               class="form-control form-control-solid"
                               name="adresse" />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">Ville</label>
                        <input type="text"
                               class="form-control form-control-solid"
                               name="ville" />
                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('form_add_client').submit();">
                    Save changes
                </button>
            </div>

        </div>
    </div>
</div>
{{-- End add modal --}}
@endsection

@section('breadcrump')
<ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-3">
    <li class="breadcrumb-item text-gray-600 fw-bold lh-1">
        <a href="{{ route('home') }}" class="text-white text-hover-primary">
            <i class="ki-duotone ki-home text-gray-500 fs-2"></i>
        </a>
    </li>
    <li class="breadcrumb-item">
        <i class="ki-duotone ki-right fs-3 text-gray-500 mx-n1"></i>
    </li>
    <li class="breadcrumb-item text-gray-600 fw-bold lh-1">Client</li>
</ul>
@endsection
