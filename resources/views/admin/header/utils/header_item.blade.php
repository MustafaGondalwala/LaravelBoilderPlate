<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>Sr No</th>
            <th>Type</th>
            <th>Value</th>
            <th>Value1</th>
            <th>Status</th>
        </thead>

        @forelse ($items as $item)
            @include('admin.header.utils.header_item_add', ['item' => $item])
        @empty
            @include('admin.header.utils.header_item_add')
        @endforelse
        <tbody id="header_add_more">
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <button id="header_add" class="btn btn-primary btn-sm">Add</button>
                    <button id="header_remove" class="btn btn-warning btn-sm">Remove</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@section('header_item')
<script>
    $("#header_add").click(function(e){
        e.preventDefault()
        const add_html = `@include('admin.header.utils.header_item_add')`
        $("#header_add_more").append(add_html)
    })

    $("#header_remove").click(function(e){
        e.preventDefault()
        $("#header_add_more").children().last().remove();
    })
</script>
@endsection
