@extends('layouts.admindashboard')
@section('content')
     @if (Session::has('message'))
     <p>{{ Session::get('message') }}</p>
     @endif
    <section class="first_sec" id="groups">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="pull-left">
                        <div class="page-heading">
                            <div class="ph-icon pull-left">
                                <i class="fa fa-group"></i>
                            </div>
                            <div class="ph-text pull-right">
                                <h4>New Sign Ups</h4>
                                <p class="text-muted">{{ count($users) }} total sign ups</p>
                            </div>
                        </div>
                    </div>
                   
                </div>               
            </div><!--/row-->
        </div>
    </section>

    <section id="records" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapper">
                    <table id="example" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Organization</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
       
        <tbody>
            <?php
            $i=1;
            foreach ($users as  $user):
            ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $user->con_person_name }}</td>
                <td>{{ $user->con_person_email }}</td>
                <td>{{ $user->con_person_mobile }}</td>
                <td>{{ $user->user_org }}</td>
                <td>{{ $user->type }} <i class="fa fa-check ticked"></i></td>
                <td><?php if($user->status==0)
                {
                ?><a href="javascript:;" urls="{{ url('admin/user-approve',$user->id) }}" class="btn-alpha btn-sml accept">Accept</a> <a href="javascript:;" urls="{{ url('admin/user-decline',$user->id) }}" class="btn-beta btn-sml decline">Decline</a>
                <?php
                }
                else if($user->status==1)
                {
                    echo "Accepted";
                }
                else
                {
                     echo "Decline";
                }
                 ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    $(document).ready(function(){
       $(document).on('click','.decline',function(){
        urls=$(this).attr('urls');
           if(confirm("You Want to decline?"))
           {
               window.location.href=urls;
           }

       });
        $(document).on('click','.accept',function(){
        urls=$(this).attr('urls');
           if(confirm("You Want to Accept?"))
           {
               window.location.href=urls;
           }

       });
    });
    </script>
 @endsection