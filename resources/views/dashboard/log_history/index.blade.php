@extends('dashboard.layout.app')

{{-- custom stylesheet --}}
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dashboard/log_history.css') }}">
@endsection

{{-- BEGIN:: Log History Content --}}
@section('content')
    <!-- heading content wrapper -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Log History</h1>
    </div>
    <!-- filter content -->
    <div class="input-group w-50 mb-2">
        <input type="text" id="log-history-search" name="log-history-search" class="breadcrumb-search-box form-control bg-primary-light border-0 small" placeholder="Search for...">
        <div class="input-group-append">
            <button type="button" class="btn btn-sm btn-primary">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
    <!-- log histories table -->
    <div class="log-history-content-wrapper mb-5">
        <table class="table log-history-table-listing-wrapper">
            <thead>
                <tr>
                    <th>Action Time</th>
                    <th>User</th>
                    <th>Change Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($logHistories as $logHistory)
                    <tr>
                        <td>{{ $logHistory->created_at }}</td>
                        <td>{{ ucwords($logHistory->username) }}</td>
                        <td style="width: 60%;">{{ $logHistory->description }}</td>
                        <td>{{ $logHistory->log_header }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- pagination links -->
        <div class="row mt-2">
            <div class="col-md-12">
                {{ $logHistories->links() }}
            </div>
        </div>
    </div>
@endsection
{{-- END:: Log History Content --}}

{{-- custom script --}}
@section('script')
    <script>
        $(document).ready(function(){
            activatedFilterLogHistoriesOnKeyUp();
        });

        /**
         * Filter log histories records from current listing 
         * table on key up of the current log-history-search input.
         * @return void
         */
        function activatedFilterLogHistoriesOnKeyUp(){
            $("#log-history-search").on("keyup", function(){
                const State = $(this),
                      Value = State.val().toLowerCase();

                $("table tr").each(function(index){
                    if( index !== 0 ){
                        let row = $(this);

                        row.find("td").each(function( i, td ){
                            let id = $(td).text().toLowerCase();
                            if( id.indexOf(Value) !== -1 ){
                                row.show();
                                return false;
                            } else {
                                row.hide();
                            }
                        });
                    }
                });
            });
        }
    </script>
@endsection
