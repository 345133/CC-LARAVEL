<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 20px;">GARAGISTE</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">

			<li class="ts-account">
				<a href="#"><img src="admin/img/WhatsApp Image 2024-05-12 à 12.03.41_8965d8ff.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
                    
				<li><a onclick="event.preventDefault();
             document.getElementById('logout-form').submit();" href="{{ route('logout') }}" data-toggle="modal"
                                        data-dismiss="modal">Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
				</ul>
			</li>
		</ul>
	</div>
