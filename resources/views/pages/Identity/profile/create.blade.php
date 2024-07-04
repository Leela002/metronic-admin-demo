<x-base-layout>
    <style>
        .nav-link.active.tab-completed {
            background-color: green !important;
            color: white !important;
        }
    </style>

    <!-- Main content -->
    <div class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row mb-5">
                                <!-- Tablist -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="personal-details-tab" data-bs-toggle="tab" href="#personal-details" role="tab" aria-controls="personal-details" aria-selected="true">Personal Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bank-details-tab" data-bs-toggle="tab" href="#bank-details" role="tab" aria-controls="bank-details" aria-selected="false">Bank Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="employment-details-tab" data-bs-toggle="tab" href="#employment-details" role="tab" aria-controls="employment-details" aria-selected="false">Employment Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="document-tab" data-bs-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false">Documents</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab content -->
                            <div class="tab-content" id="myTabContent">

                                <!-- Personal Details Tab -->
                                <div class="tab-pane fade show active" id="personal-details" role="tabpanel" aria-labelledby="personal-details-tab">
                                    <form class="form" action="" method="POST" id="kt_client_form">
                                        @csrf
                                        <div class="py-2">
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-7">
                                                <!--Employee Id-->
                                                <div class="col-md-4 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">Employee Id <span class="text-muted fs-6">(use this format e.g L12345 )</span> </label>
                                                    <input class="form-control form-control-solid" placeholder="" name="emp_id" value="{{ old('emp_id') }}" />
                                                    @error('emp_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 fv-row mb-3">
                                                    <!--First Name-->
                                                    <label class="required fs-6 fw-semibold mb-2"> First Name</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="first_name" value="{{ old('first_name') }}" />
                                                    @error('first_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 fv-row mb-3">
                                                    <!--Last Name-->
                                                    <label class="required fs-6 fw-semibold mb-2"> Last Name </label>
                                                    <input class="form-control form-control-solid" placeholder="" name="last_name" value="{{ old('last_name') }}" />
                                                    @error('last_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                             <!--begin::Input group-->
                            <div class="row g-9 mb-7">
                                  <div class="col-md-4 fv-row">
                                        <!--Father Name -->
                                        <label class="required fs-6 fw-semibold mb-2">Father Name </label>
                                       <input class="form-control form-control-solid" placeholder="" name="father_name" value="{{ old('father_name') }}" />
                                        @error('father_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                    <div class="col-md-4 fv-row mb-3">
                                        <!-- Mother Name-->
                                        <label class="required fs-6 fw-semibold mb-2"> Mother Name </label>
                                       <input class="form-control form-control-solid" placeholder="" name="mother_name" value="{{old('mother_name')}}" />
                                        @error('mother_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-4 fv-row mb-3">
                                    <!-- Contact -->
                                        <label class="required fs-6 fw-semibold mb-2"> Contact </label>
                                        <input class="form-control form-control-solid" placeholder="" name="contact" value="{{old('contact')}}" />
                                        @error('contact')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                       
                                    </div>
                                </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row g-9 mb-7">
                                 <!-- Email -->
                                   <div class="col-md-4 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Email </label>
                                         <input class="form-control form-control-solid" placeholder="" name="email" value="{{ old('email') }}" />
                                       @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                     <!-- Curruent Address -->
                                <div class="col-md-4 fv-row">
                                       <label class="required fs-6 fw-semibold mb-2">Curruent Address</label>
                                        <input class="form-control form-control-solid" placeholder="" name="cur_address" value="{{ old('cur_address') }}" />
                                       @error('cur_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                    <!-- Perment Address -->
                                    <div class="col-md-4 fv-row mb-3">
                                      <label class="required fs-6 fw-semibold mb-2">Perment Address</label>
                                       <input class="form-control form-control-solid" placeholder="" name="per_address" value="{{old('per_address')}}" />
                                        @error('per_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                              <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row g-9 mb-7">
                                    <!--Gender-->
                                    <div class="col-md-4 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Gender</label>
                                        <input class="form-control form-control-solid" placeholder="" name="gender" value="{{ old('gender') }}" />
                                     @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!--Blood Group-->
                                          </div>
                                        <div class="col-md-4 fv-row mb-3">
                                             <label class="required fs-6 fw-semibold mb-2">Blood Group</label>
                                          <input class="form-control form-control-solid" placeholder="" name="blood_group" value="{{old('blood_group')}}" />
                                            @error('blood_group')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <!--Emergency Contact-->
                                    </div>
                                    <div class="col-md-4 fv-row mb-3">
                                           <label class="required fs-6 fw-semibold mb-2">Emergency Contact</label>
                                            <input class="form-control form-control-solid" placeholder="" name="em_contact" value="{{old('em_contact')}}" />
                                            @error('em_contact')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                   </div>
                                  </div>
                                  <!--end::Input group-->
                                   <!--begin::Input group-->
                               <div class="row g-9 mb-7">
                                     <!-- Date Of Birth -->
                                   <div class="col-md-4 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Date Of Birth</label>
                                        <input type="date" class="form-control form-control-solid" placeholder="" name="dob" value="{{ old('dob') }}" />
                                        @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    
                               </div>
                            <!--end::Item-->
                                        </div>
                                        <!--begin::Action buttons-->
                                        <div class="d-flex justify-content-end align-items-center mt-12">
                                            <!--begin::Button-->
                                            <a href="{{ route('profile.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                                <span class="indicator-label">Save profile Details</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--begin::Action buttons-->
                                    </form>
                                </div>

                                <!-- Bank Details Tab -->
                                <div class="tab-pane fade" id="bank-details" role="tabpanel" aria-labelledby="bank-details-tab">
                                    <!-- Bank details form fields here -->
                                    <form class="form" action="" method="POST" id="bank_form">
                                        @csrf
                                        <div class="py-2">
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-7">
                                                <!-- Bank Name -->
                                                <div class="col-md-4 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">Bank Name  </label>
                                                    <input class="form-control form-control-solid" placeholder="" name="Bank_name" value="{{ old('bank_name') }}" />
                                                    @error('bank_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- Account No -->
                                                <div class="col-md-4 fv-row mb-3">
                                                    <label class="required fs-6 fw-semibold mb-2">Account Number</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="account_num" value="{{ old('account_num') }}" />
                                                    @error('account_num')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- IFSC Code -->
                                                <div class="col-md-4 fv-row mb-3">
                                                    <label class="required fs-6 fw-semibold mb-2"> IFSC Code</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="ifsc_code" value="{{ old('ifsc_code') }}" />
                                                    @error('ifsc_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Action buttons-->
                                            <div class="d-flex justify-content-end align-items-center mt-12">
                                                <!--begin::Button-->
                                                <a href="{{ route('profile.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                                    <span class="indicator-label">Save Bank Details</span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                            <!--begin::Action buttons-->
                                        </div>
                                    </form>
                                </div>

                                <!-- Employment Details Tab -->
                                <div class="tab-pane fade" id="employment-details" role="tabpanel" aria-labelledby="employment-details-tab">
                                    <!-- Employment details form fields here -->
                                    <form class="form" action="" method="POST" id="employment_form">
                                        @csrf
                                        <div class="py-2">
                                            <!-- Input group -->
                                            <div class="row g-9 mb-7">
                                                <!-- Joining Date -->
                                                <div class="col-md-4 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">Joining Date</label>
                                                    <input type="date" class="form-control form-control-solid" placeholder="" name="join_date" value="{{ old('join_date') }}" />
                                                    @error('join_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- Employment Type -->
                                                <div class="col-md-4 fv-row mb-3">
                                                    <label class="required fs-6 fw-semibold mb-2">Employment Type</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="emp_type" value="{{ old('emp_type') }}" />
                                                    @error('emp_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- Designation -->
                                                <div class="col-md-4 fv-row mb-3">
                                                    <label class="required fs-6 fw-semibold mb-2">Designation</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="designation" value="{{ old('designation') }}" />
                                                    @error('designation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                 
                                                <!-- Casual Leave -->
                                                <div class="col-md-4 fv-row mb-3">
                                                    <label class="required fs-6 fw-semibold mb-2">Casual Leave</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="casual_leave" value="{{ old('casual_leave') }}" />
                                                    @error('casual_leave')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- Sick Leave -->
                                                <div class="col-md-4 fv-row mb-3">
                                                    <label class="required fs-6 fw-semibold mb-2">Sick Leave</label>
                                                    <input class="form-control form-control-solid" placeholder="" name="sick_leave" value="{{ old('sick_leave') }}" />
                                                    @error('sick_leave')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Action buttons -->
                                            <div class="d-flex justify-content-end align-items-center mt-12">
                                                <a href="{{ route('profile.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                                <button type="submit" class="btn btn-primary" id="kt_employment_submit">
                                                    <span class="indicator-label">Save Employment Details</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Document Tab -->
                                <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                                    <!-- Document related fields here -->
                                    <form class="form" action="" method="POST" id="doc_form">
    @csrf

    <!-- Aadhar Card -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="required fs-6 fw-semibold mb-2">Aadhar Card (Image)</label>
        </div>
        <div class="col-md-4">
            <input type="file" class="form-control form-control-solid" name="aadhar_card_image" accept="image/*" />
        </div>
    </div>

    <!-- PAN Card -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="required fs-6 fw-semibold mb-2">PAN Card (Image)</label>
        </div>
      <div class="col-md-4">
            <input type="file" class="form-control form-control-solid" name="pan_card_image" accept="image/*" />
        </div>
    </div>

    <!--  Resume -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="required fs-6 fw-semibold mb-2">Resume (Doc/PDF)</label>
        </div>
       <div class="col-md-4">
            <input type="file" class="form-control form-control-solid" name="resume_file" accept=".doc,.docx,.pdf" />
        </div>
    </div>
     <!--  Educatinal Certificate-1 -->
     <div class="row mb-3">
        <div class="col-md-4">
            <label class="required fs-6 fw-semibold mb-2">Educational Certificate 1</label>
        </div>
       <div class="col-md-4">
            <input type="file" class="form-control form-control-solid" name="resume_file" accept=".doc,.docx,.pdf" />
        </div>
    </div>
     <!-- Educational Certificate 2 -->
     <div class="row mb-3">
        <div class="col-md-4">
            <label class="required fs-6 fw-semibold mb-2">Educational Certificate 2</label>
        </div>
       <div class="col-md-4">
            <input type="file" class="form-control form-control-solid" name="resume_file" accept=".doc,.docx,.pdf" />
        </div>
    </div>
     <!-- Past Experience -->
     <div class="row mb-3">
        <div class="col-md-4">
            <label class="required fs-6 fw-semibold mb-2">Experience Certificate</label>
        </div>
       <div class="col-md-4">
            <input type="file" class="form-control form-control-solid" name="resume_file" accept=".doc,.docx,.pdf" />
        </div>
    </div>

     <!-- Action buttons -->
     <div class="d-flex justify-content-end align-items-center mt-12">
         <a href="{{ route('profile.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                                <button type="submit" class="btn btn-primary" id="kt_employment_submit">
                                                    <span class="indicator-label">Save Documents</span>
                                                </button>
                                            </div>
</form>
</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.nav-link');
            const tabContents = document.querySelectorAll('.tab-pane');

            tabLinks.forEach(function(tabLink) {
                tabLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    tabContents.forEach(function(tabContent) {
                        tabContent.classList.remove('show', 'active');
                    });
                    tabLinks.forEach(function(link) {
                        link.classList.remove('active');
                    });
                    target.classList.add('show', 'active');
                    this.classList.add('active');
                });
            });

            // Add event listener for form submissions
            const forms = document.querySelectorAll('form');
            forms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the form from submitting normally
                    const activeTab = document.querySelector('.tab-pane.active');
                    const tabLink = document.querySelector('a.nav-link[href="#' + activeTab.id + '"]');
                    const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="number"],input[type="file"]');

                    let allFieldsFilled = true;
                    inputs.forEach(function(input) {
                        if (input.value.trim() === '') {
                            allFieldsFilled = false;
                        }
                    });

                    if (allFieldsFilled) {
                        tabLink.classList.add('tab-completed');
                    } else {
                        tabLink.classList.remove('tab-completed');
                    }

                });
            });
        });
    </script>
</x-base-layout>
