<x-base-layout>
    <style>
        .error {
            color: #f00 !important;
        }
    </style>
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
        <div class="card-header cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Update Parameter') }} - {{ $parameter_master->parameter_name }}</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body pt-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <div class="card-body p-9">
                                <form name="create_employee" action="{{ url('update_parameter', $parameter_master->id) }}" method="POST">
                                    @csrf
                                    <div class="py-2">
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Parameter Name</label>
                                                <input class="form-control form-control-solid" name="parameter_name" value="{{ old('parameter_name', $parameter_master->parameter_name) }}" />
                                                @error('parameter_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Help Text</label>
                                                <input class="form-control form-control-solid" name="help_text" value="{{ old('help_text', $parameter_master->help_text) }}" />
                                                @error('help_text')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Slug</label>
                                                <input class="form-control form-control-solid" name="slug" value="{{ old('slug', $parameter_master->slug) }}" />
                                                @error('slug')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Type</label>
                                                <select class="form-select form-select-solid" name="type">
                                                    <option value="0" {{ old('type', $parameter_master->type) == 0 ? 'selected' : '' }}>Text</option>
                                                    <option value="1" {{ old('type', $parameter_master->type) == 1 ? 'selected' : '' }}>Boolean</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Value</label>
                                                <small>(For Boolean type enter 0 or 1)(For Up = 0/ Down = 1)</small>
                                                <input class="form-control form-control-solid" name="value" value="{{ old('value', $parameter_master->value) }}" />
                                                @error('value')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="float-end mt-3">
                                                <button type="submit" class="btn btn-sm btn-primary me-3">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>