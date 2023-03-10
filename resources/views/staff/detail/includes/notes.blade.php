<div class="row">
    <div class="col-xs-12">
        <h4 class="header large lighter blue"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Notes List</h4>
        <div class="clearfix">
            <span class="pull-right tableTools-container"></span>
        </div>
        <div class="table-header">
            Staff Notes Record list on table. Filter list using the search box as you wish.
        </div>
    <!-- div.table-responsive -->
        <div>
            <table id="" class="table table-striped table-bordered table-hover dynamic-table">
                <thead>
                <tr>
                    <th width="5%">S.N.</th>
                    <th> Date </th>
                    <th>Subject</th>
                    <th>Note Description</th>
                    <th>Status</th>

                </tr>
                </thead>
                <tbody>
                @if (isset($data['note']) && $data['note']->count() > 0)
                    @php($i=1)
                    @foreach($data['note'] as $note)
                        <tr>
                            <td>{{ $i }}</td>
                            <td> {{  \Carbon\Carbon::parse($note->created_at)->format('Y-m-d') }} </td>
                            <td>{{ $note->subject }}</td>
                            <td>{{ $note->note }}</td>
                            <td class="hidden-480 ">
                                <div class="btn-group">
                                    <button data-toggle="" class="btn btn-primary {{ $note->status == 'active'?"btn-success":"btn-warning" }}" >
                                        {{ $note->status == 'active'?"Approved":"Disaproved" }}
                                    </button>

                                    
                                </div>

                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="align-left">No notes data found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>