<tr>
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
</tr>
