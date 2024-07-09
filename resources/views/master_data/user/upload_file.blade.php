<!--begin::Action--->
<td class="text-end">
    <div class="text-center">        
        <!-- <a href="#" class="btn btn-light-primary font-weight-bold">
            Update
        </a> -->
        <?php 

        $query = DB::table('daily_exchange_rate')->select('upload_id')
                    ->where('id', $model->id)->first();

                  
        if($query->upload_id != null)
        {
            $file = DB::table('upload_master')->select('path')
                    ->where('id', $query->upload_id)->first();
            $path = asset('/public/' . $file->path); 
        ?>

             <a href="{{$path}}" target="_blank" class="btn btn-light-primary font-weight-bold mr-2">
               <i class="fa fa-file  font-weight-bold" aria-hidden="true"></i>
            </a>
       <?php  }?>
        <!-- <button data-destroy="{{ url('currency/destroy', $model->id) }}" class="btn btn-light-danger font-weight-bold">
            Delete
        </button> -->
    </div>
</td>
<!--end::Action--->
