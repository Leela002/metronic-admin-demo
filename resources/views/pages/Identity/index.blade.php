<x-base-layout>
    <style>
        .btn-light-primary {
            margin-left: 20px;
        }

        .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
            margin-right: 20px !important;
        }

        .dataTable tbody tr td {
            padding: 0;
            text-align: center !important;
        }

        .pb-3 {
            padding-top: 0.75rem !important;
        }

        .min-w-175px {
            min-width: 115px !important;
        }

        table.dataTable>thead>tr>th:not(.sorting_disabled) {
            padding-right: 0;
            padding-left: 0;
            color: #1d0557;
            /* Text color for th */
            padding: 1rem 2rem;
            /* Padding for th */
        }

        div.dataTables_wrapper div.dt-buttons {
            float: right;
        }

        .btn.btn-secondary {
            background-color: white !important;
        }

        .btn.btn-secondary:hover:not(.btn-active) {
            color: #ffffff;
            background-color: #1c0e40 !important;
        }

        ul.pagination {
            float: right;
        }

        .excel-btn {
            float: inline-end;
            margin: -28px !important;
        }

        table.dataTable th,
        table.dataTable td {
            border: 1px solid #EBEDF3;
        }

        .pagination .page-item .page-link {
            color: #007bff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
        }

        .heading-card {
            vertical-align: center;
            padding: 2.25rem 2.25rem 0rem 2.25rem;
        }
    </style>

    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            <script>
                setTimeout(function() {
                    document.querySelector('.alert').remove();
                }, 3000); // Remove the alert after 3 seconds
            </script>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="heading-card">
            <!--begin::Card title-->
            <div class="card-title m-0 d-flex justify-content-between">
                <div>
                    <h3 class="fw-bolder m-0">{{ __('Customer') }}</h3>
                </div>

                <div>
                    <a href="{{ route('profile.create') }}" class="btn btn-primary ms-auto"
                        style="padding: calc(0.775rem + 1px) calc(1.5rem + 1px) !important;">{{ __('Add Customer') }}</a>
                    <a href="{{ route('profile.trash') }}" class="btn btn-primary ms-auto"
                        style="padding: calc(0.775rem + 1px) calc(1.5rem + 1px) !important;">{{ __('Deleated Customers') }}</a>
                    <a href="javascript:void(0)" id="exportButton" class="btn btn-primary">
                        Export
                    </a>
                </div>
            </div>
            <div>
                <div class="row mb-xl-3">
                    <form id="filterForm" action="{{ route('profile.index') }}" method="GET">
                        <div class="col-md-2 form-group position-relative">
                            <label for="created_at_month">Created Month</label>
                            <input type="month" id="created_at_month" name="created_at_month"
                                class="date form-control cursor-pointer"
                                value="{{ request('created_at_month', date('Y-m')) }}"
                                onchange="document.getElementById('filterForm').submit();" max="{{ date('Y-m') }}">
                        </div>
                    </form>
                    <form id="filterForm" action="{{ route('profile.index') }}" method="GET">
                        <div class="col-md-2 form-group position-relative">
                            <label for="dob_month">DOB Month</label>
                            <input type="month" id="dob_month" name="dob_month"
                                class="date form-control cursor-pointer"
                                value="{{ request('dob_month', date('Y-m')) }}"
                                onchange="document.getElementById('filterForm').submit();" max="{{ date('Y-m') }}">
                        </div>
                    </form>
                    <form id="filterForm" action="{{ route('profile.index') }}" method="GET">
                        <div class="col-md-2 form-group position-relative">
                            <label for="blood_group">Blood Group</label>
                            <select id="blood_group" name="blood_group" class="form-select"
                                onchange="document.getElementById('filterForm').submit();">
                                <option value="">All</option>
                                <option value="A+" {{ request('blood_group') == 'A+' ? 'selected' : '' }}>A+
                                </option>
                                <option value="A-" {{ request('blood_group') == 'A-' ? 'selected' : '' }}>A-
                                </option>
                                <option value="B+" {{ request('blood_group') == 'B+' ? 'selected' : '' }}>B+
                                </option>
                                <option value="B-" {{ request('blood_group') == 'B-' ? 'selected' : '' }}>B-
                                </option>
                                <option value="AB+" {{ request('blood_group') == 'AB+' ? 'selected' : '' }}>AB+
                                </option>
                                <option value="AB-" {{ request('blood_group') == 'AB-' ? 'selected' : '' }}>AB-
                                </option>
                                <option value="O+" {{ request('blood_group') == 'O+' ? 'selected' : '' }}>O+
                                </option>
                                <option value="O-" {{ request('blood_group') == 'O-' ? 'selected' : '' }}>O-
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-6">
                            <button type="button" class="btn btn-primary"
                                id="resetButton">{{ __('Reset') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card title-->
        </div>

        <!--begin::Card-->
        <div class="card m-5 p-4">
            <div class="row mb-xl-3">
                <div class="d-flex align-items-center position-relative my-1 w-100">
                    <input type="text" class="form-control form-control-solid w-200px ps-13" placeholder="Search"
                        id="mySearchInput" />
                </div>
            </div>
            <div class="table-responsive signing_fees">
                <table class="table dataTable " id="data-table">
                    <!-- begin::Table head -->
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-400">
                            <th class="min-w-175px text-center">Id</th>
                            <th class="min-w-175px text-center">Name</th>
                            <th class="min-w-175px text-center">Email</th>
                            <th class="min-w-175px text-center">Mobile</th>
                            <th class="min-w-175px text-center">Gender</th>
                            <th class="min-w-175px text-center">Blood&nbsp;Group</th>
                            <th class="min-w-175px text-center">DOB</th>
                            <th class="min-w-175px text-center">Created at</th>
                            <th class="min-w-175px text-center">Updated at</th>
                            <th class="min-w-175px text-center">Created by</th>
                            <th class="min-w-175px text-center">Updated by</th>
                            <th class="min-w-175px text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- end::Table head -->
                    <!-- begin::Table body -->
                    <tbody>
                        @foreach ($identities as $identity)
                            <tr>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->id }}</td>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->first_name }}
                                    {{ $identity->last_name }}</td>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->email }}</td>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->contact }}</td>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->gender }}</td>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->blood_group }}</td>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->dob }}</td>
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->created_at }}</td>
                                @if ($identity->updated_at == $identity->created_at)
                                    <td class="p-0 pb-3 w-50px text-center">-</td>
                                @elseif($identity->updated_by == null)
                                    <td class="p-0 pb-3 w-50px text-center">-</td>
                                @else
                                    <td class="p-0 pb-3 w-50px text-center">{{ $identity->updated_at }}</td>
                                @endif
                                <td class="p-0 pb-3 w-50px text-center">{{ $identity->created_by }}</td>
                                @if ($identity->updated_by == null)
                                    <td class="p-0 pb-3 w-50px text-center">-</td>
                                @else
                                    <td class="p-0 pb-3 w-50px text-center">{{ $identity->updated_by }}</td>
                                @endif
                                <td class="p-0 pb-3 text-center">
                                    <div class="d-flex justify-content-evenly gap-5">
                                        <a href="{{ route('profile.edit', $identity->id) }}"
                                            class="btn btn-light-primary font-weight-bold">
                                            View
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{ $identity->id }}"
                                            class="btn btn-light-danger font-weight-bold delete-btn">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!-- end::Table body -->
                </table>
            </div>
        </div>
        <!-- end::Card body -->
    </div>
    <div class="row">
        <div class="col d-flex justify-content-start">
            <form id="rowsPerPageForm" action="{{ route('profile.index') }}" method="GET">
                <select name="per_page" id="per_page" class="form-select"
                    onchange="document.getElementById('rowsPerPageForm').submit()">
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
        </div>
        <div class="col d-flex justify-content-end">
            {{ $identities->appends(['per_page' => $perPage, 'created_at_month' => request('created_at_month')])->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <!-- end::Card -->
    </div>

</x-base-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var identityId = $(this).data('id');
            var $row = $(this).closest('tr');

            if (confirm('Are you sure to delete this record?')) {
                $.ajax({
                    url: "{{ route('profile.destroy', '') }}/" + identityId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            $row.remove();
                            alert('Record deleted successfully.');
                        } else {
                            alert('Failed to delete the record.');
                        }
                    },
                    error: function(response) {
                        alert('Failed to delete the record.');
                    }
                });
            }
        });
    });

    document.getElementById('mySearchInput').addEventListener('keyup', function() {
        var searchValue = this.value.toLowerCase();
        var table = document.getElementById('data-table');
        var rows = table.getElementsByTagName('tr');

        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var rowText = '';
            for (var j = 0; j < cells.length; j++) {
                rowText += cells[j].textContent.toLowerCase();
            }
            if (rowText.includes(searchValue)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#exportButton').click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Get current date and time
            var now = new Date();
            var year = now.getFullYear();
            var month = ('0' + (now.getMonth() + 1)).slice(-2);
            var day = ('0' + now.getDate()).slice(-2);
            var hours = ('0' + now.getHours()).slice(-2);
            var minutes = ('0' + now.getMinutes()).slice(-2);
            var fileName = 'customers_export_' + day + '_' + month + '_' + year + '.xlsx';

            // Make AJAX call to fetch data
            $.ajax({
                url: '{{ route('profile.export') }}',
                method: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response) {
                    // Create a new Blob object using the response data
                    var blob = new Blob([response], {
                        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    });

                    // Create a link element, set its download attribute, and trigger the download
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = fileName;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error occurred while fetching data.');
                }
            });
        });
        $('#resetButton').click(function() {
            $('#created_at_month').val('');
            $('#filterForm').submit();
        });

        $('#month, #year').change(function() {
            $('#filterForm').submit();
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('resetButton').addEventListener('click', function() {
            // Clear the input fields
            document.getElementById('created_at_month').value = '';
            document.getElementById('dob_month').value = '';
            // Submit the form
            document.getElementById('filterForm').submit();
        });
    });
</script>
