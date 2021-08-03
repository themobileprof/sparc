<div class="table-responsive">
    <table class="table" id="componentEntries-table">
        <thead>
            <tr>
                <th>Country</th>
        <th>Component Id</th>
        <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($componentEntries as $componentEntry)
            <tr>
                       <td>{{ $componentEntry->country->name }}</td>
            <td>{{ $componentEntry->component->component }}</td>
            <td>{{ $componentEntry->content }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['componentEntries.destroy', $componentEntry->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('componentEntries.show', [$componentEntry->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('componentEntries.edit', [$componentEntry->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
