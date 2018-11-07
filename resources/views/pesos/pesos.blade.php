<style>
    td {
        border: 1px solid black !important;
        text-align: center;
        color: black;
    }

    .actividad {
        font-size: 10px;
    }

</style>


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <div class="card">
                    <div class="card-header">Pesos</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td></td>
                                @foreach($ras as $ra)
                                    <td colspan='{{count($ra->ces)}}'>RA {{$ra->pos}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td></td>
                                @foreach($ras as $ra)
                                    @foreach($ra->ces as $ce)
                                        <td>{{$ce->pos}}</td>
                                    @endforeach
                                @endforeach
                            </tr>
                            @foreach($p->aes as $ae)
                                <tr>
                                    <td class="actividad">{{$ae->actividad}}</td>
                                    @foreach($ras as $ra)
                                        @foreach($ra->ces as $ce)
                                            <td data-a_id='{{$ae->id}}' data-ce_id='{{$ce->id}}' class="peso"
                                                contenteditable></td>
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $(".peso").click(function(){
                $(this).text(10).css("background-color","orange");
            });

            $(".peso").blur(function(){
                var a_id=$(this).data("a_id");
                var ce_id=$(this).data("ce_id");
                console.log(a_id,ce_id)
                var peso=$(this).text();
                $.ajax({
                    url     : "{{url('/pesos/guardar')}}",
                    method  : "post",
                    data    : {
                        _token: '{{csrf_token()}}',
                        actividad_id  : a_id,
                        ce_id : ce_id,
                        peso  : peso,
                    },
                });
            });


        })

    </script>




@endsection