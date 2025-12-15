<div id="right">


            <div class="well well-small">
                <ul class="list-unstyled">
                    <li>Users &nbsp; : <span><?php $Users = DB::table('users')->get(); $Count = count($Users); echo $Count ?></span></li>
                </ul>
            </div>
            <div class="well well-small">
                <button type="button" class="btn btn-block"> Help </button>
                <button type="button" onclick="window.open('{{url('/admin/slider')}}','_self')" class="btn btn-primary btn-block"> Sliders</button>
                <button type="button" onclick="window.open('{{url('/admin/blog')}}','_self')" class="btn btn-success btn-block"> Blog Posts</button>
                <button type="button" onclick="window.open('{{url('/admin/banner')}}','_self')" class="btn btn-primary btn-block"> Banners</button>
                <button type="button" onclick="window.open('{{url('/admin/files')}}','_self')" class="btn btn-primary btn-block"> Busines Profile</button>
                <button type="button" onclick="window.open('{{url('/admin/categories')}}','_self')" class="btn btn-warning btn-block"> Categories</button>
                <button type="button" onclick="window.open('{{url('/admin/testimonials')}}','_self')" class="btn btn-success btn-block"> Testimonials </button>
                <button type="button" onclick="window.open('{{url('/admin/subscribers')}}','_self')" class="btn btn-success btn-block"> Subscribers </button>
                <button type="button" onclick="window.open('{{url('/admin/notifications')}}','_self')" class="btn btn-danger btn-block"> Notifications </button>
                <button type="button" onclick="window.open('{{url('/admin/updates')}}','_self')" class="btn btn-inverse btn-block"> Updates </button>


            </div>




        </div>
