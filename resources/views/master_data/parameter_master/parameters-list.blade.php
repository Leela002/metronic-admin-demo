<x-default-layout>
    @section('title')
    Parameter Master
    @endsection
    @section('breadcrumbs')
    {{ Breadcrumbs::render('setting.parameters.index') }}
    @endsection
    <style>
        .table:not(.table-bordered) tr, .table:not(.table-bordered) th, .table:not(.table-bordered) td {
 border: 1px solid #99999954;

  text-transform: inherit;
  color: inherit;
  height: inherit;
  min-height: inherit;
}
table.dataTable {
  clear: both;
  margin-top: 6px !important;
  margin-bottom: 6px !important;
  max-width: none !important;
 border-spacing: 0; 
}
table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting_asc_disabled, table.dataTable thead > tr > th.sorting_desc_disabled,
table.dataTable thead > tr > td.sorting,
table.dataTable thead > tr > td.sorting_asc,
table.dataTable thead > tr > td.sorting_desc,
table.dataTable thead > tr > td.sorting_asc_disabled,
table.dataTable thead > tr > td.sorting_desc_disabled {
  cursor: pointer;
  position: relative;
  padding-right: 15px !important;
  padding-left: 15px !important;
  font-size: 14px !important; 
  font-weight: 600 !important;
  text-align: center !important;
  padding: 0.75rem 0.75rem !important;
}
</style>
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-fundcategories-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Type" id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-fundcategories-table-toolbar="base">
                    <!--begin::Add type-->
               
                    <a type="button" class="btn btn-primary" href="{{ route('setting.parameters.create') }}">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Parameter
                    </a>
                
                    <!--end::Add Type-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['parameter-table'].search(this.value).draw();
            });
            // document.addEventListener('livewire:load', function () {
            //     Livewire.on('success', function () {
            //         $('#kt_modal_add_fund_type').modal('hide');
            //         window.LaravelDataTables['clientMasters-table'].ajax.reload();
            //     });
            // });
        </script>
    @endpush
</x-default-layout>