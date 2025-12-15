    <!--client-section-->
    <div class="ttm-row client-section mt_115 res-991-mt-45 ttm-bgcolor-white clearfix">
        <div class="container">
            <!-- row -->
            <div class="row text-center">
                <div class="col-md-12" style="padding: 0;">
                    <!-- slick_slider -->
                    <?php $Client = DB::table('clients')->get(); ?>
                    @if($Client->count() > 0)
                    <div class="slick_slider client-slider" style="visibility: visible; opacity: 1; display: block; width: 100%;">
                        @foreach ($Client as $client)
                        <div>
                            <div class="client-box">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="{{url('/')}}/uploads/clients/{{$client->image}}" alt="{{$client->name ?? 'Client Logo'}}" style="visibility: visible; opacity: 1; display: block;">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- Duplicate items for seamless continuous scroll --}}
                        @foreach ($Client as $client)
                        <div>
                            <div class="client-box">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="{{url('/')}}/uploads/clients/{{$client->image}}" alt="{{$client->name ?? 'Client Logo'}}" style="visibility: visible; opacity: 1; display: block;">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- ttm-client end -->
                    @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">No client logos available</p>
                    </div>
                    @endif
                </div>
            </div><!-- row end -->
        </div>
    </div>
    <!--client-section-->

