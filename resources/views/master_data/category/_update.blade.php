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
        <div class="card-header">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Update Category') }}</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body pt-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <div class="card-body p-9">
                                <form name="create_employee" action="{{ route('update_category', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="py-2">
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Category Name</label>
                                                <input class="form-control form-control-solid" name="category_name" value="{{ old('category_name', $category->category_name) }}" />
                                                @error('category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Status</label>
                                                <select class="form-select form-select-solid" name="status">
                                                    <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                    <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <div class="custom-file">
                                                    <label class="required fs-6 fw-semibold mb-2">Upload Icon</label>
                                                    <!-- Display the current uploaded image name -->
                                                    @if($category->upload_icon)
                                                        <input type="text" class="form-control form-control-solid mb-2" value="{{ $category->upload_icon }}" readonly />
                                                    @endif
                                                    <input type="file" accept="image/*" class="form-control form-control-solid custom-file-input" name="upload_icon" placeholder="" id="customFile" />
                                                    @error('upload_icon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end align-items-center mt-12">
                                            <!--begin::Button-->
                                            <a href="{{ route('category.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                                <span class="indicator-label">Update</span>
                                            </button>
                                            <!--end::Button-->
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
