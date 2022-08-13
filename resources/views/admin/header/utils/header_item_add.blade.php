<tr>
    <td>
        <input type="number" class="form-control" name="header_item[sr_no][]" value="{{ @$item->sr_no }}"/>
    </td>
    <td>
        <select class="form-control" name="header_item[type][]">
            @foreach (custom('header_type') as $type)
                <option {{ @$item->type == $type ? 'selected="selected"' : '' }} value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="header_item[value][]" value="{{ @$item->value }}"/>
    </td>
    <td>
        <input type="text" class="form-control" name="header_item[value1][]" value="{{ @$item->value1 }}"/>
    </td>
    <td>
        <select class="form-control" id="status" name="header_item[status][]" >
            <option value="" disabled>Select</option>
            <option value="1" <?php if(@$item != null && $item->status=='1'){ echo
                'selected'; }?>>Active</option>
            <option value="0" <?php if(@$item != null && $item->status=='0'){ echo
                'selected'; }?>>InActive</option>
        </select>
    </td>
</tr>
