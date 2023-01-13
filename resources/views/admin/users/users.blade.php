@extends('admin.layouts.template-forms')
@section('title', 'Admin Users')
@section('content')


<div class="card" style="width:1200px; background:white"> 
                      
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    
                        
                            <div style="width:1200px">
                                <i class="fas fa-table me-1"></i>
                                Users {{$users->count() }}
                                <a href="{{ route('user.new') }}" class="btn btn-success" style="float:right">New User</a>
                            </div>
                            <div class="card-body" style="width:1200px">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address /Phone</th>
                                            <th>Picture</th>
                                            <th>On site</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                       
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                 <td> <div>{{ $user->name }}</div></td>
                                 <td> <div>{{ $user->email}}</div></td>                             
                                 <td width="30"> <div>{{ $user->address }} /telefon:
                                    {{$user->phone}}</div></td>
                                 <td> <div><img  src="{{ asset('/images/avatars/' .$user->photo) }}"
 alt="User Image"  class="useravatar">
</div></td>
<td width="20"> <div>{{ $user->created_at }}</div></td>
<td> <div>{{ $user->role }}</div></td>

<td>
<a class="btn btn-xs btn-info"      href="{{ route('users.edit', $user->id) }}" title="Edit user data">
                                  <i class="fas fa-user-edit"></i>
                                    </a>

                                    <a class="btn btn-xs btn-primary"  title="show user data" href="{{ route('users.show', $user->id) }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                    </a>


                                    

                          



                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline-block;">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"  onclick="return confirm('Are you sure to delete {{$user->name}}?')" title='Delete'><i class="fa fa-trash"></i></button>
                        </form>


                                    </td>

                                        
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Name</th>
                                            <th>Email</th>
                                            <th>On site</th>
                                       
                                            <th>Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                
                                </table>
                            </div>




  @endsection