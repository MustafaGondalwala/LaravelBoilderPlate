<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>Sr No</th>
            <th>Link Name</th>
            <th>Type</th>
            <th>Value</th>
            <th>Value1</th>
            <th>Status</th>
        </thead>

        @forelse ($items as $item)
            @include('admin.component.utils.component_item_add', ['item' => $item])
        @empty
            @include('admin.component.utils.component_item_add')
        @endforelse
        <tbody id="component_type_add_more">
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <button id="component_type_add" class="btn btn-primary btn-sm">Add</button>
                    <button id="component_type_remove" class="btn btn-warning btn-sm">Remove</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
