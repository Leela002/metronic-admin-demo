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
            min-width: 140px !important;
        }

        table.dataTable>thead>tr>th:not(.sorting_disabled) {
            padding-right: 0;
            padding-left: 0;
            color: gray;
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
            <div class="card-title m-0 d-flex justify-between">
                <h3 class="fw-bolder m-0 text-danger">{{ __('Deleted Customers') }}</h3>
                <a href="{{ route('profile.index') }}" class="btn btn-primary ms-auto"
                    style="padding: calc(0.775rem + 1px) calc(1.5rem + 1px) !important;">{{ __('Go to Customers') }}</a>
            </div>
            <!--end::Card title-->
        </div>

        <!--begin::Card-->
        <div class="card m-5 ">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex align-items-center position-relative my-1 w-100">
                        <input type="text" data-kt-fundcategories-table-filter="search"
                            class="form-control form-control-solid w-250px ps-13" placeholder="Search"
                            id="mySearchInput" />

                    </div>
                </div>
            </div>
            <div class="table-responsive signing_fees">
                <table class="table dataTable" id="data-table">
                    <!-- begin::Table head -->
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-400">
                            <th class="p-2 min-w-175px text-center">Id</th>
                            <th class="p-2 min-w-175px text-center">Name</th>
                            <th class="p-2 min-w-175px text-center">Email</th>
                            <th class="p-2 min-w-175px text-center">Mobile</th>
                            <th class="p-2 min-w-175px text-center">Gender</th>
                            <th class="p-2 min-w-175px text-center">Blood&nbsp;Group</th>
                            <th class="p-2 min-w-175px text-center">DOB</th>
                            <th class="p-2 min-w-175px text-center">Created at</th>
                            <th class="p-2 min-w-175px text-center">Updated at</th>
                            <th class="p-2 min-w-175px text-center">Created by</th>
                            <th class="p-2 min-w-175px text-center">Updated by</th>
                            <th class="p-2 min-w-175px text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- end::Table head -->
                    <!-- begin::Table body -->
                    <tbody>
                        @foreach ($identities as $identity)
                            <tr>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->id }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->first_name }}
                                    {{ $identity->last_name }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->email }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->contact }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->gender }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->blood_group }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->dob }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->created_at }}</td>
                                @if ($identity->updated_at == $identity->created_at)
                                    <td class="p-2 pb-3 w-50px text-center">-</td>
                                @else
                                    <td class="p-2 pb-3 w-50px text-center">{{ $identity->updated_at }}</td>
                                @endif
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->created_by }}</td>
                                @if ($identity->updated_by == null)
                                    <td class="p-2 pb-3 w-50px text-center">-</td>
                                @else
                                    <td class="p-2 pb-3 w-50px text-center">{{ $identity->updated_by }}</td>
                                @endif
                                <td class="p-2 pb-3 text-center">
                                    <div class="d-flex justify-content-evenly gap-5">
                                        <form method="POST" action="{{ route('profile.restore', $identity->id) }}" class="restore-form">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-light-primary font-weight-bold">
                                                Restore
                                            </button>
                                        </form>

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
            <form id="rowsPerPageForm" action="{{ route('profile.trash') }}" method="GET">
                <select name="per_page" id="per_page" class="form-select"
                    onchange="document.getElementById('rowsPerPageForm').submit()">
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
        </div>
        <div class="col d-flex justify-content-end">
            {{ $identities->appends(['per_page' => $perPage])->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <!-- end::Card -->
    </div>

</x-base-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.restore-form').submit(function(event) {
            event.preventDefault(); // Prevent form from submitting normally
            var $form = $(this);
            var $row = $form.closest('tr');

            $.ajax({
                url: $form.attr('action'),
                type: 'PATCH',
                data: $form.serialize(),
                success: function(response) {
                    if (response.success) {
                        $row.remove();
                        alert('Record restored successfully.');
                    } else {
                        alert('Failed to restore the record.');
                    }
                },
                error: function(response) {
                    alert('Failed to restore the record.');
                }
            });
        });
</script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var identityId = $(this).data('id');
            var $row = $(this).closest('tr');

            if (confirm('Are you sure to delete this record permanently?')) {
                $.ajax({
                    url: "{{ route('profile.forceDelete', '') }}/" + identityId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            $row.remove();
                            alert('Record deleted permanently.');
                        } else {
                            alert('Failed to delete the record permanently.');
                        }
                    },
                    error: function(response) {
                        alert('Failed to delete the record permanently.');
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
