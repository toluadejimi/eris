<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div>
            <table class="table table-striped table-bordered table-hover">
                <tr >
                    <td class="label-info white">Status</td>
                    <td>
                        @if( $data['answers']->approve_status == 1)
                            <button class="btn btn-success btn-minier dropdown-toggle" >
                                Approve
                            </button>
                        @elseif( $data['answers']->approve_status == 2)
                            <button class="btn btn-danger btn-minier dropdown-toggle" >
                                Rejected
                            </button>
                        @else
                            <button class="btn btn-info btn-minier dropdown-toggle" >
                                Pending
                            </button>
                        @endif

                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle" >
                                    Change Status : Approve/Reject &nbsp; <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                                </button>
                                <ul class="dropdown-menu " >
                                    <li>
                                        <a href="{{ route('assignment.answer.approve', ['id' => $data['answers']->id]) }}">
                                            Approve
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('assignment.answer.reject', ['id' => $data['answers']->id]) }}">
                                            Reject
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('assignment.answer.delete', ['id' => $data['answers']->id]) }}">
                                            Delete
                                        </a>
                                    </li>

                                </ul>

                            </div>
                    </td>
                    <td class="label-info white">File</td>
                    <td>
                        @if($data['answers']->file)
                            <a href="{{ asset('assignments'.DIRECTORY_SEPARATOR.'answers'.DIRECTORY_SEPARATOR.$data['answers']->file) }}" target="_blank" >
                                Attachment File
                                <i class="ace-icon fa fa-download bigger-120"></i>
                            </a>
                        @endif
                    </td>
                </tr>
                <tr >
                    <td class="label-info white">CreatedBy</td>
                    @if($data['answers']->created_by)
                    <td>{{ auth()->user()->where('id',$data['answers']->created_by)->first()->name }}</td>
                    @endif
                    <td class="label-info white">Assignment Score</td>
                    <td colspan="4">{!! $data['answers']->mark_obtained !!}  / {{$mark_allocated}} Marks </td>
                </tr>
                <tr >
                    <td class="label-info white">CreatedOn</td>
                    <td>{{ \Carbon\Carbon::parse($data['answers']->created_at)->format('M d, Y')}} </td>
                    <td class="label-info white">UpdateOn</td>
                    <td>{{ \Carbon\Carbon::parse($data['answers']->updated_at)->format('M d, Y')}} </td>
                </tr>
                <tr >
                    <td class="label-info white">Detail</td>
                    <td colspan="4">{!! $data['answers']->answer_text !!}</td>
                </tr>
              
            </table>
            <form action="/ass-score" method="POST">
                @csrf
                <div class="row">
        
                    <div class="col-md-3">
                        <label class="label-info white">Enter Obtained Mark....</label>
                        <input type="number" class="form-group"  name="mark_obtained" required>
                    </div>


                    <input hidden type="number" class="form-group"  value="{{ $data['answers']->id}}" name="id" required>


                   
        
                    <div class="col-md-3">
                        <button class="btn" type="submit">
                            <i class="fa fa-undo bigger-110"></i>
                            Update Mark Score
                        </button>
                    </div>

                </div>
            </form>
        </div>       
    </div>
    
</div><!-- /.row -->




