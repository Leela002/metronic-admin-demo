<x-base-layout>
   <style>
      .error {
         color: #f00 !important;
      }

      td,
      th {
         border: none !important;
         text-align: initial !important;
         font-weight: normal !important;
      }

      thead {
         background: transparent !important;
      }

      .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
         border: 0;
         padding: calc(0.775rem + 1px) calc(1.5rem + 1px);
      }
   </style>
  
    <!-- Main content -->
    <div class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <!-- <div class="alert alert-info">
                        Sample table page
                    </div> -->

                    <div class="card">
                        <div class="card-body p-5">
                        <div class="row mb-5">
                            <!-- Aligning to the right -->
                            <h3>Add Employee profile</h3>
                            <hr class="w-100">
                        </div>
                        <form class="form" action="{{ route('profile.update', $identity->id) }}" method="POST" id="kt_client_form">
                        @csrf
                            <!--begin::Item-->
                            <div class="py-2">
                                <!--begin::Input group-->
                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Employee Id <span class="text-muted fs-6">(use this format e.g L12345 )</span> </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="emp_id" value="{{ $identity->emp_id }}" readonly/>
                                        <!-- Small message indicating the format for the Employee Id -->
                                        @error('emp_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-6 fv-row mb-3">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2"> Full Name </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="name" value="{{$identity->name }}"readonly />

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                
                            <!--begin::Input group-->
                            <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Father Name </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="father_name" value="{{$identity->father_name}}" />
                                        <!-- Small message indicating the format for the Employee Id -->
                                        @error('father_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-6 fv-row mb-3">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2"> Mother Name </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="mother_name" value="{{$identity->mother_name}}" />
                                        @error('mother_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                
                                 <!--begin::Input group-->
                                 <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Curruent Address </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="cur_address" value="{{$identity->cur_address }}" />
                                        <!-- Small message indicating the format for the Employee Id -->
                                        @error('cur_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-6 fv-row mb-3">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Perment Address</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="per_address" value="{{$identity->per_address}}" />
                                        @error('per_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                
                                 <!--begin::Input group-->
                                 <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Gender</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="gender" value="{{$identity->gender}}" />
                                        <!-- Small message indicating the format for the Employee Id -->
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->



                                        
                                    </div>
                                        <div class="col-md-6 fv-row mb-3">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Blood Group</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="" name="blood_group" value="{{$identity->blood_group}}" />
                                            @error('blood_group')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                
                                 <!--begin::Input group-->
                                 <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Date Of Birth</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid" placeholder="" name="dob" value="{{$identity->dob}}" />

                                        <!-- Small message indicating the format for the Employee Id -->
                                        @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    
                                </div>
                                <!--end::Input group-->
                                
                                
                            </div>
                            <!--end::Item-->
                            <!--begin::Action buttons-->
                            <div class="d-flex justify-content-end align-items-center mt-12">
                                <!--begin::Button-->
                                <a href="{{ route('profile.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                    <span class="indicator-label">Update Profile</span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--begin::Action buttons-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
                  </x-base-layout>
