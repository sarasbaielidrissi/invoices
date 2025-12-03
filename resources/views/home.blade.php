@extends('include.master')
@section('page','contact')

@section('content')
<div class="card-body p-lg-17">
	<div class="row mb-3">
		<div class="col-md-6 pe-lg-10">
			Test
		</div>
	</div>
</div>							
@endsection

@section('actions')
<div class="m-0">
	<a href="#" class="btn btn-flex btn-sm h-35px h-md-40px btn-light fw-bold px-6" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">History</a>
	<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b7817b1365d">
		<div class="px-7 py-5">
			<div class="fs-5 text-dark fw-bold">Filter Options</div>
		</div>
		<div class="separator border-gray-200"></div>
		<div class="px-7 py-5">
			<div class="mb-10">
				<label class="form-label fw-semibold">Status:</label>
				<div>
					<select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b7817b1365d" data-allow-clear="true">
						<option></option>
						<option value="1">Approved</option>
						<option value="2">Pending</option>
						<option value="2">In Process</option>
						<option value="2">Rejected</option>
					</select>
				</div>
			</div>
			<div class="mb-10">
				<label class="form-label fw-semibold">Member Type:</label>
				<div class="d-flex">
					<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
						<input class="form-check-input" type="checkbox" value="1" />
						<span class="form-check-label">Author</span>
					</label>
					<label class="form-check form-check-sm form-check-custom form-check-solid">
						<input class="form-check-input" type="checkbox" value="2" checked="checked" />
						<span class="form-check-label">Customer</span>
					</label>
				</div>
			</div>
			<div class="mb-10">
				<label class="form-label fw-semibold">Notifications:</label>
				<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
					<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
					<label class="form-check-label">Enabled</label>
				</div>
			</div>
			<div class="d-flex justify-content-end">
				<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
				<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
			</div>
		</div>
	</div>
</div>
<a href="#" class="btn btn-flex btn-center bg-gray-600 btn-color-white h-35px h-md-40px btn-active-dark btn-sm px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
	<i class="ki-duotone ki-plus-square fs-2 p-0 m-0">
		<span class="path1"></span>
		<span class="path2"></span>
		<span class="path3"></span>
	</i>
	<span class="ms-2">Invite</span>
</a>
@endsection

@section('breadcrump')
<ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-3">
	<li class="breadcrumb-item text-gray-600 fw-bold lh-1">
		<a href="../../demo46/dist/index.html" class="text-white text-hover-primary">
			<i class="ki-duotone ki-home text-gray-500 fs-2"></i>
		</a>
	</li>
	<li class="breadcrumb-item">
		<i class="ki-duotone ki-right fs-3 text-gray-500 mx-n1"></i>
	</li>
	<li class="breadcrumb-item text-gray-600 fw-bold lh-1">Corporate</li>
</ul>
@endsection