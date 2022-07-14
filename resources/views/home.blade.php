@extends('layouts.app')

@section('content')
<div class="container" style="background-image: url('img/2.jpg');">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You are logged in') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                  

                <h1>Add task </h1><hr>
                <form method="POST" action="{{ route('item') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Task name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" value=""  autofocus required>
                            </div>
                        </div>

                        <input type="hidden" name="ownerid" value="{{ Auth::user()->id }}">

                        <input type="hidden" name="done" value="Active">

                        <div class="row mb-3">
                            <label for="datedebut" class="col-md-4 col-form-label text-md-end">{{ __('date debut') }}</label>

                            <div class="col-md-6">
                                <input id="datedebut" type="date"  name="datedebut" required min="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    Create Task
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>


                    <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TASK NAME</th>
                                    <th> DATE </th>
                                    <th>STATUS </th>
                                    <th> DELETE TASK </th>
                                    <th> END TASK </th>
                                </tr>
                            </thead>
                            <tbody id="tabcontents">
                                @foreach($myitem as $item)
                                    <?php if(Auth::user()->id == $item->ownerid){
                                        ?>
                                        <tr class="row1" data-id="{{ $item->id}}">   
                                            <td>{{$item -> id}} </td>
                                            <td>{{$item -> name}} </td>
                                            <td>{{$item -> end}}</td>
                                            <td id="end">{{$item -> done}} </td>
                                            <td>
                                                <form method="POST" action="{{ route('deletet',[$item ->id]) }}">
                                                @csrf
                                                    <input type="submit" class="btn btn-danger" value="Delete" name="btdeletetask" id="submit" onclick="">
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('endtaskR',[$item ->id]) }}" > 
                                                @csrf  
                                                    <input type="submit" class="btn btn-success" value="End"  name="btendtask" id="done" onclick="add()" >
                                                </form>   
                                            </td> 
                                        </td>
                                    <?php }?> 
                                @endforeach  
                                    </tr>
                            </tbody>
                        </table>                          
                        
                                                                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



