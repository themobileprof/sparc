<div class="table-responsive">
    <table class="table" id="contextEntries-table">
        <thead>
            <tr>
                <th>Country</th>
        <th>Context</th>
        <th>Year</th>
        <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contextEntries as $contextEntry)
            <tr>
                       <td>{{ $contextEntry->country->name }}</td>
            <td>{{ $contextEntry->context->slug }}</td>
            <td>{{ $contextEntry->year }}</td>
            <td>{{ $contextEntry->content }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['contextEntries.destroy', $contextEntry->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('contextEntries.show', [$contextEntry->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('contextEntries.edit', [$contextEntry->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
