<div class="table-responsive">
    <table class="table" id="countrySponsors-table">
        <thead>
            <tr>
                <th>Country Id</th>
        <th>Sponsor Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($countrySponsors as $countrySponsor)
            <tr>
                       <td>{{ $countrySponsor->country_id }}</td>
            <td>{{ $countrySponsor->sponsor_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['countrySponsors.destroy', $countrySponsor->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('countrySponsors.show', [$countrySponsor->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('countrySponsors.edit', [$countrySponsor->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
