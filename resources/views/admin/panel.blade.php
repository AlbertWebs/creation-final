<?php
     $Updates = DB::table('updates')->where('status','0')->get();
 ?>
 @if($Updates->isEmpty())

 @else
 <center>
 @foreach($Updates as $update)
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <?php
                                $original_string = $update->content;
                                $num_words = 20;
                                $words = array();
                                $words = explode(" ", $original_string, $num_words);
                                $shown_string = "";


                                if(count($words) == 20){
                                  $words[19] = "...";
                                }

                                $shown_string = implode(" ", $words);

                ?>
                {!!html_entity_decode($shown_string)!!}

            <a href="{{url('/admin/update')}}/{{$update->id}}" class="alert-link">Read Update</a>.
        </div>
@endforeach


</center>
 @endif

 <center>
 @if(Session::has('message-comment'))
<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <div class="alert alert-success">{{ Session::get('message-comment') }}</div>
</div>

@endif
</center>

<div style="text-align: center;">



                            <a class="quick-btn" href="{{url('/admin/allMessages')}}">
                                <i class="icon-envelope icon-2x"></i>
                                <span>Messages</span>
                                <span class="label label-success"><?php $Messages = DB::table('messages')->get(); $Count = count($Messages); echo $Count ?></span>
                            </a>



                            <a class="quick-btn" href="{{url('/admin/services')}}">
                                <i class="icon-wrench icon-2x"></i>
                                <span>Services</span>
                                <span class="label label-warning"><?php $Services = DB::table('services')->get(); $Count = count($Services); echo $Count ?></span>
                            </a>

                            <a class="quick-btn" href="{{url('/admin/portfolio')}}">
                                <i class="icon-suitcase icon-2x"></i>
                                <span>Portfolio</span>
                                <span class="label btn-metis-2"><?php $Portfolio = DB::table('portfolios')->get(); $Count = count($Portfolio); echo $Count ?></span>
                            </a>

                            <a class="quick-btn" href="{{url('/admin/clients')}}">
                                <i class="icon-user icon-2x"></i>
                                <span>Clients</span>
                                <span class="label label-success"><?php $Admins = DB::table('clients')->get(); $Count = count($Admins); echo $Count ?></span>
                            </a>




                        </div>
