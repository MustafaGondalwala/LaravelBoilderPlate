<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>Link</th>
            <th>Page</th>
            <th>Status</th>
        </thead>

        @forelse ($items as $item)
            @include('admin.link.utils.add', ['item' => $item,'pages' => $pages])
        @empty
            @include('admin.link.utils.add', ['pages' => $pages])
        @endforelse
        <tbody id="link_add_more">
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <button id="link_add" class="btn btn-primary btn-sm">Add</button>
                    <button id="link_remove" class="btn btn-warning btn-sm">Remove</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@section('link_item')
<script>
    $("#link_add").click(function(e){
        e.preventDefault()
        const add_html = `@include('admin.link.utils.add')`
        $("#link_add_more").append(add_html)
    })

    $("#link_remove").click(function(e){
        e.preventDefault()
        $("#link_add_more").children().last().remove();
    })
</script>
@endsection
