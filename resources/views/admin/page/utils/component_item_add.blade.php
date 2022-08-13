<tr>
    <td>
        <input type="number" class="form-control" name="type[sr_no][]" value="{{ @$item->sr_no }}"/>
    </td>
    <td>
        <input rows="10" type="text" id="link_name" class="form-control"
        name="type[link_name][]" value="{{ @$item->name }}"/>
    </td>
    <td>
        <select class="form-control" name="type[type][]">
            @foreach (custom('component_type') as $type)
                <option {{ @$item->type == $type ? 'selected="selected"' : '' }} value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="type[value][]" value="{{ @$item->value }}"/>
    </td>
    <td>
        <input type="text" class="form-control" name="type[value1][]" value="{{ @$item->value1 }}"/>
    </td>
    <td>
        <select class="form-control" id="status" name="type[status][]" >
            <option value="" disabled>Select</option>
            <option value="1" <?php if(@$item != null && $item->status=='1'){ echo
                'selected'; }?>>Active</option>
            <option value="0" <?php if(@$item != null && $item->status=='0'){ echo
                'selected'; }?>>InActive</option>
        </select>
    </td>
</tr>
