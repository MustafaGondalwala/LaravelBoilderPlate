<tr>
    <td width="20%">
        <input type="number" class="form-control" name="component[sr_no][]" value="{{ @$item->sr_no }}"/>
    </td>
    <td>
        <select class="form-control" name="component[component_id][]">
            <option disabled selected>Select</option>
            @foreach ($components as $component)
                <option {{ @$item->component_id == $component->id ? 'selected="selected"' : '' }} value="{{ $component->id }}">{{ $component->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" id="status" name="component[status][]" >
            <option value="" disabled>Select</option>
            <option value="1" <?php if(@$item != null && $item->status=='1'){ echo
                'selected'; }?>>Active</option>
            <option value="0" <?php if(@$item != null && $item->status=='0'){ echo
                'selected'; }?>>InActive</option>
        </select>
    </td>
</tr>
