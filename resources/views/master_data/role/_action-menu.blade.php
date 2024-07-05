<!--begin::Action--->
<td class="text-end">
    <div class="text-center">        
        <a href="{{ url('edit_role', $model->id) }}" class="btn btn-light-primary font-weight-bold">
        <img alt="Logo"src="{{ asset(theme()->getMediaUrlPath() . 'logos/edit.png') }}" class="h-15px app-sidebar-logo-default mr-2" />
        </a>
        <button data-destroy="{{ url('role/destroy', $model->id) }}" class="btn btn-light-danger font-weight-bold">
        <img alt="Logo"src="{{ asset(theme()->getMediaUrlPath() . 'logos/delete.png') }}" class="h-15px app-sidebar-logo-default mr-2" />
        </button>
    </div>
</td>
<!--end::Action--->
