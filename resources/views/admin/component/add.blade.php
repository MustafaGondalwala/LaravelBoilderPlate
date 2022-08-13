@extends('admin.layout.app')
@section('content')
@include('admin.layout.content_header', ['header' => 'Component', 'currenct_page' => 'Add'])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="card card-primary">


                    <form method="post" action="{{ route('admin.component.store', ['component' => $component]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('admin.utils.show_error')
                            @include('admin.utils.show_success')
                            <input type="hidden" name="id" value="{{ $component->encrypted_id }}"/>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name',$component->name) }}" />
                            </div>
                            <div class="form-group">
                                <label for="html">Html</label>
                                <textarea rows="10" type="text" id="html" class="form-control"
                                    name="html">{{ old('html',$component->html) }}</textarea>
                            </div>

                            @include('admin.component.utils.component_items', ['items' => $component->items])

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="" disabled>Select</option>
                                    <option value="1" <?php if($component->exists() != null && $component->status=='1'){ echo
                                        'selected'; }?>>Active</option>
                                    <option value="0" <?php if($component->exists() != null && $component->status=='0'){ echo
                                        'selected'; }?>>InActive</option>
                                </select>
                            </div>




                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footer')
<script>
    $("#component_type_add").click(function(e){
        e.preventDefault()
        const add_html = `@include('admin.component.utils.component_item_add')`
        $("#component_type_add_more").append(add_html)
    })

    $("#component_type_remove").click(function(e){
        e.preventDefault()
        $("#component_type_add_more").children().last().remove();
    })
</script>
@endsection
