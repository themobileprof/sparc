<div class="table-responsive">
    <table class="table" id="contexts-table">
        <thead>
            <tr>
                <th>Slug</th>
        <th>English</th>
        <th>French</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contexts as $context)
            <tr>
                       <td>{{ $context->slug }}</td>
            <td>{{ $context->english }}</td>
            <td>{{ $context->french }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['contexts.destroy', $context->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('contexts.show', [$context->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('contexts.edit', [$context->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
