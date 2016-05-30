@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
	             @include('admin.message.shared.panel-heading')	
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-12">
                			<div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Sender</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                         @foreach($messages as $message)
                         	
                            <tr>
 
                                <td>                                    
                                    <a href="{{ route('message.show', ['id' => $message->id ]) }}">{{ $message->id }}</a>
                                </td>
                                <td>
                                    {{ $message->name }}
                                </td>
                                <td>
                                	{{ $message->email }}
                                </td>
                                <td>
                                     {{ $message->phone_number }}
                                </td>
                                <td>{{ str_limit($message->body, 30) }}</td>
                                <td>
                                   <?php if($message->read) : ?>
                                    read
                                   <?php else : ?>
                                    unread                                   
                                   <?php endif; ?> 

                                </td>

                                <td>
          
                                    <a href="{{ route('message.show', ['id' => $message->id ]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                    
                                </td>
                            </tr>
                            
                         @endforeach
                        </tbody>
                    </table>
				    <div class="clearfix"></div>
				    <div class="pull-right">
				        {{ $messages->render() }}
				    </div>                    
                			</div>		                		
	                	</div>       	
	                
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection