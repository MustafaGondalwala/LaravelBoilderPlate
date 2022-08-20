<tr>
    <td>
        <input rows="10" type="text" id="link_name" class="form-control"
        name="component_item[link_name][]" value="{{ @$item->name }}"/>
    </td>
    <td>
        <select class="form-control" name="component_item[type][]">
            @foreach (custom('component_type') as $type)
                <option {{ @$item->type == $type ? 'selected="selected"' : '' }} value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="component_item[value][]" value="{{ @$item->value }}"/>
    </td>
    <td>
        <input type="file" class="form-control" name="component_item[value1][]" value="{{ @$item->value1 }}"/>
    </td>
    <td>
        <select class="form-control" id="status" name="component_item[status][]" >
            <option value="" disabled>Select</option>
            <option value="1" <?php if(@$item != null && $item->status=='1'){ echo
                'selected'; }?>>Active</option>
            <option value="0" <?php if(@$item != null && $item->status=='0'){ echo
                'selected'; }?>>InActive</option>
        </select>
    </td>
</tr>
@section('component_item')
/**
<script>
    $(document).on("change",'.component-type-select', function(){
        const value = $(this).val()
        const valueInput = $(this).closest('tr').find('.component-type-value');
        if(value == "image" || value == "video" || value == "file"){
            valueInput.get(0).type = 'file';
        }else{
            valueInput.get(0).type = 'text';
        }
     });
</script>
**/
@endsection
