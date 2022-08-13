<tr>
    <td>
        <input type="text" class="form-control" name="link_item[value][]" value="{{ @$item->value }}"/>
    </td>
    <td>
        <select class="form-control" name="link_item[page_id][]">
            <option selected disabled>Select</option>
            @foreach ($pages as $page)
                <option {{ @$item->page_id == $page->id ? 'selected="selected"' : '' }} value="{{ $page->id }}">{{ $page->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" id="status" name="link_item[status][]" >
            <option value="" disabled>Select</option>
            <option value="1" <?php if(@$item != null && $item->status=='1'){ echo
                'selected'; }?>>Active</option>
            <option value="0" <?php if(@$item != null && $item->status=='0'){ echo
                'selected'; }?>>InActive</option>
        </select>
    </td>
</tr>
