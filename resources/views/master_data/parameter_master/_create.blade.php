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
                             <h3>Add Parameter</h3>
                             <hr class="w-100">
                         </div>
                         <form name="create_employee" action="{{ route('add_parameter') }}" method="POST"> 
                         @csrf
                             <!--begin::Item-->
                             <div class="py-2">
                                 <!--begin::Input group-->
                                 <div class="row g-9 mb-7">
                                     <!--begin::Col-->
                                     <div class="col-md-6 fv-row">
                                         <!--begin::Label-->
                                 
                                                     <!--First Name-->
                                                     <label class="required fs-6 fw-semibold mb-2">Paramter Name</label>
                                                     <input class="form-control form-control-solid" placeholder="" name="parameter_name" value="{{ old('parameter_name') }}" />
                                                     @error('parameter_name')
                                                         <span class="text-danger">{{ $message }}</span>
                                                     @enderror
                                               
                                     </div>

                                     <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                
                                                    <!--First Name-->
                                                    <label class="required fs-6 fw-semibold mb-2">Help Text</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="help_text" value="{{ old('help_text') }}" />
                                                    @error('help_text')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                              
                                    </div>
                                  
                                 </div>

                                 <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                
                                                    <!--First Name-->
                                                    <label class="required fs-6 fw-semibold mb-2">Slug</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="slug" value="{{ old('slug') }}" />
                                                    @error('slug')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                              
                                    </div>

                                    <div class="col-md-6 fv-row">
                                       <!--begin::Label-->
                               
                                                   <!--First Name-->
                                                   <label class="required fs-6 fw-semibold mb-2">Type</label>
                                                   <select class="form-select form-select-solid" name="type">
                                                    <option value="0" {{ old('type') === 'false' ? 'selected' : '' }}>Text</option>
                                                    <option value="1" {{ old('type') === 'true' ? 'selected' : '' }}>Boolean</option> 
                                                    </select>
                                                @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror 
                                             
                                   </div>
                                 
                                </div>

                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                
                                                    <!--First Name-->
                                                    <label class="required fs-6 fw-semibold mb-2">Value</label>
                                                    <small>(For Boolean type enter 0 or 1)(For Up = 0/ Down = 1)</small>
                                                    <input class="form-control form-control-solid" placeholder="" name="value" value="{{ old('value') }}" />
                                                    @error('value')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                              
                                    </div>
                                 <!--end::Input group-->
                                      
                                 </div>
                                 <!--end::Input group-->
                                 
                             </div>
                             <!--end::Item-->
                             <!--begin::Action buttons-->
                             <div class="d-flex justify-content-end align-items-center mt-12">
                                 <!--begin::Button-->
                                 <a href="{{ route('parameter.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                 <!--end::Button-->
                                 <!--begin::Button-->
                                 <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                     <span class="indicator-label">submit</span>
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